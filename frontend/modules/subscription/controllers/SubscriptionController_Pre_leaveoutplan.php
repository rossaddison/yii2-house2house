<?php

namespace frontend\modules\subscription\controllers;
use Yii;
use yii\web\Controller;
use PayPal\Api\Agreement;
use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Api\Patch;
use PayPal\Api\Payer;
use PayPal\Api\ShippingAddress;
use PayPal\Api\PatchRequest;
use PayPal\Common\PayPalModel;
use PayPal\Common\PayPalResourceModel;
use frontend\modules\subscription\models\subscribe;
use frontned\modules\subscription\components\SessionHelper;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\AgreementDetails;
use yii\helpers\ArrayHelper;
use frontend\modules\subscription\components\Configpaypal;
use frontend\modules\subscription\models\paypalagreement;
use yii\db\Expression;
use yii\db\ActiveRecord;
use frontend\modules\subscription\components\Utilities;

class SubscriptionController extends Controller
{
    
    public function actionSuccess($token)
    {
        
        if ((!empty($token))) 
        {
                    $agreement = new \PayPal\Api\Agreement();
                    $payer = new \PayPal\Api\Payer();
                    try {
                        // Execute agreement
                        $newapicontext = new Configpaypal();
                        $apiContext = $newapicontext->paypalconfig(); 
                        $agreement->execute($token, $apiContext);
                    } catch (PayPal\Exception\PayPalConnectionException $ex) {
                        \Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;
                        \Yii::$app->response->data = $ex->getData();
                        die($ex);
                    } catch (\yii\db\Exception $ex) {
                        die($ex);
                    }
                    //retrieve agreement details
                    try {
                        $agreement = \PayPal\Api\Agreement::get($agreement->getId(), $apiContext);
                        //$get_plan = $agreement->getPlan();
                        //$get_plan_id = Utilities::displayRecursiveResults($get_plan,'id');
                        $agid = $agreement->getId();
                        $record_success = paypalagreement::find()
                              //->where(['agreementplan_id' => $get_plan_id])
                              ->where(['user_id' => Yii::$app->user->id])
                             //->Andwhere(['<>', 'created_at', NULL])
                              ->Andwhere(['executed_at' => NULL])
                              ->one();
                        if (!empty($record_success))
                        {
                            $record_success->agreement_id = $agid;
                            //$record_success->agreementplan_id = $get_plan_id;
                            $record_success->agreementplan_id = NULL;
                            $record_success->executed_at = new Expression('NOW()');
                            $record_success->save();
                        }
                        else 
                        {
                             Yii::$app->session->setFlash('warning', 'We could not record your Agreement Id.' . $agid . ' and your agreement plan id '. $get_plan_id);
                        }
                        
                    } catch (Exception $ex) {
                        \Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;
                        \Yii::$app->response->data = $ex->getData();
                        exit(1);
                    }
                    return $this->render('agreementexecutedsummary',            
                    [ 
                      'agreement' => $agreement,
                      'summary_agreement_plan_id' => $get_plan_id,                    
                      'summary_agreement_id'=>$agreement->getId(),
                      'summary_agreement_plan'=>$agreement->getPlan(),
                      'summary_agreement_payer'=>$agreement->getPayer(),
                    ]);
        } else //no token has been received
        {
                    Yii::$app->session->setFlash('warning', 'Your subscription has not been activated due to the user cancelling the approval. Please retry.');
                    return $this->render('subscriptionnotactivated');
        }
    }
    
    public function actionCancel($token)
    {
        if ((!empty($token))) 
        {
                    Yii::$app->session->setFlash('warning', 'Your subscription transaction has not been completed.');
                    return $this->render('subscriptioncancelled');
        }
    }
    
    public function actionSubscribe()
    {
         $apiContext = Configpaypal::paypalconfig();
         $whole_config = $apiContext->getConfig();
         $mode = $whole_config['mode'];
         Yii::$app->session['apicontext'] = $apiContext;
         $startDate = date('c', time() + 3600);
         $model = new subscribe();
         //render the subscribe.php first. Clicking on 'Next' will process the following
         if ($model->load(Yii::$app->request->post()) && $model->validate()) {
         $agreement = new Agreement();
         $agreement->setName($model->agreement_name)
                ->setDescription($model->agreement_description)
                ->setStartDate($startDate); 
         $plan = new Plan();
         $plan->setName($model->plan_name)
                 ->setDescription($model->plan_description)
                 ->setType($model->plan_type);
         $paymentDefinition = new PaymentDefinition();
         $paymentDefinition->setName($model->payment_definition_name)
                ->setType($model->payment_definition_type)
                ->setFrequency($model->payment_definition_frequency)
                ->setFrequencyInterval($model->payment_definition_frequency_interval)
                ->setCycles($model->payment_definition_cycle)
                ->setAmount(new Currency(array(
                'value' => $model->payment_definition_amount_value,
                'currency' => $model->payment_definition_amount_currency,
         )));
         $chargeModel = new ChargeModel();
         $chargeModel->setType($model->charge_model_type)->setAmount(new Currency(array(
            'value' => $model->charge_model_amount_value,
            'currency' => $model->charge_model_amount_currency
         )));
         $paymentDefinition->setChargeModels(array(
            $chargeModel
         ));  
         $merchantPreferences = new MerchantPreferences();
         $merchantPreferences->setReturnUrl($model->merchant_preference_returnurl)
                ->setCancelUrl($model->merchant_preference_cancelurl)
                ->setAutoBillAmount($model->autobillamount)
                ->setInitialFailAmountAction($model->initial_fail_amount_action)
                ->setMaxFailAttempts($model->max_fail_attempts)
                ->setSetupFee(new Currency(array(
                'value' => $model->setupfee_value,
                'currency' => $model->setupfee_currency,
         )));
         $plan->setPaymentDefinitions(array($paymentDefinition));
         $plan->setMerchantPreferences($merchantPreferences);
             try {
         $createdPlan =  $plan->create($apiContext);
            } catch (PayPal\Exception\PayPalConnectionException $ex) {
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;
                    \Yii::$app->response->data = $ex->getData();
                    die($ex);
            } catch (\yii\db\Exception $ex) {
                die($ex);
            }
            try {
                       $patch = new Patch();
                       $value = new PayPalModel($model->status);
                       $patch->setOp($model->patch_options)
                           ->setPath('/')
                           ->setValue($value);
                       $patchRequest = new PatchRequest();
                       $patchRequest->addPatch($patch);
                       $createdPlan->update($patchRequest, $apiContext);
                       // Save Plan Id to session
                       //Yii::$app->session['plan_id'] to be passed in actionSuccees to view agreementexecutedsummary
                       $patchedPlan = Plan::get($createdPlan->getId(), $apiContext);
                      
                } catch (PayPal\Exception\PayPalConnectionException $ex) {
                       \Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;
                       \Yii::$app->response->data = $ex->getData();
                       die($ex);
               } catch (\yii\db\Exception $ex) {
                   die($ex);
               }
              $save_to_database_plan_id = $createdPlan->getId();
              $plan = new Plan();
              $plan->setId($save_to_database_plan_id);
              $agreement->setPlan($plan);
              
              $payer = new Payer();
              $payer->setPaymentMethod('paypal');
              $agreement->setPayer($payer);
              
              $shippingAddress = new ShippingAddress();
              $shippingAddress->setLine1($model->shipping_address_line1)
                ->setCity($model->shipping_address_city)
                ->setState($model->shipping_address_state)
                ->setPostalCode($model->shipping_address_postcode)
                ->setCountryCode($model->shipping_address_countrycode);
                $agreement->setShippingAddress($shippingAddress);
              
              //$request = clone $agreement;
              try {
               //ISO 3166-1 : Check that your country shipping address country code is correct otherwise error 400
               // eg. United Kingdom's is GB not UK
               // Start date must be later than current date otherwise error 400
                $agreement = $agreement->create($apiContext);
                Yii::$app->session['agreement'] = $agreement;
                $approvalUrl = $agreement->getApprovalLink();
                //redirect to Paypal site and return through actionSuccess or actionCancel after Approval
                //if $approvalUrl is empty => some errors in config data eg. wrong country code for merchant shipping address
                //or start date is less than current date as in the test samples from paypal sdk
                if (empty($approvalUrl)) 
                        //$sessionHelper->set('agreement', $agreement);
                       {
                           return $this->render('sandboxsummary',            
                            [ 
                              'summary_apiContext'=>$apiContext,
                              'summary_apiConfig' =>$apiContext->getConfig(),
                              'summary_name'=>$agreement->getName(),
                              'summary_agreement'=>$agreement,
                              'summary_plan'=>$agreement->getPlan(),
                              'summary_chargemodel'=> $chargeModel->getId(),
                              'summary_payer' => $agreement->getPayer(),
                              'summary_shipaddress'=>$agreement->getShippingAddress(),
                              //likely to be null since no approval url
                              'summary_agreement_id'=>$agreement->getId(),
                               //likely to be null since no approval url
                              'summary_approvalUrl' => $approvalUrl,
                              //likely to be null since no approval url
                              'summary_startdate' => $startDate,
                            ]);
                       }
                       else //the approvalUrl will be fill therefore exit to Paypal url
                       {
                            
                            $paypal_agreement = new paypalagreement();
                            $paypal_agreement->user_id = Yii::$app->user->id;
                            $paypal_agreement->agreementplan_id = $save_to_database_plan_id;
                            $paypal_agreement->name = $model->agreement_name;
                            //agreement id will appear after approval so keep blank
                            $paypal_agreement->quantity = 1;
                            $paypal_agreement->created_at = new Expression('NOW()');
                            $paypal_agreement->save();
                            return $this->redirect($approvalUrl, 301)->send();
                            //equivalent to exit command
                            Yii::$app->end();

                       } //end else
              } catch (PayPal\Exception\PayPalConnectionException $ex) {
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;
                    \Yii::$app->response->data = $ex->getData();
                    die($ex);
            } catch (\yii\db\Exception $ex) {
                die($ex);
            }
           
         }  //if ($model->load(Yii::$app->request->post()) && $model->validate()) {
         // pass these details to subscribe.php view  /modules/subscription/views/subscription/subscribe.php        
         return $this->render('subscribe',['model' => $model,'config' => $apiContext->getConfig(), 'mode' => $mode]);
    }
}  
?>   
    
    