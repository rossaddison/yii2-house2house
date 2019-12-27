<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Salesorderheader;
use frontend\models\Salesorderdetail;
use frontend\models\Product;
use frontend\models\Company;
use frontend\models\Messaging;
use frontend\components\Utilities;
use frontend\models\Messagelog;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\db\IntegrityException;
use yii\db\ActiveRecord;
use frontend\models\SalesorderdetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;
use yii\db\Query;
use frontend\models\Gocardlessinvoice;
use kartik\grid\EditableColumnAction;



/**
 * SalesorderdetailController implements the CRUD actions for Salesorderdetail model.
 */
class SalesorderdetailController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
             'access' => 
                            [
                            'class' => \yii\filters\AccessControl::className(),
                            'only' => ['index','create', 'update','delete','view'],
                            'rules' => [
                            [
                              'allow' => true,
                              'roles' => ['user','admin','manager'],
                            ],
                            [
                              'allow' => true,
                              'verbs' => ['POST']
                            ],  
                            ],
            ], 
        ];
    }

    /**
     * Lists all Salesorderdetail models.
     * @return mixed
     */
    //this is the sales order id that is passed from the salesorderheader
    public function actionIndex($id)
    {
            Yii::$app->session['sales_order_id'] = $id;
            $searchModel = new SalesorderdetailSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->sort->sortParam = false;
            $dataProvider->setSort([
            'attributes' => [
                 'productsubcategory_id.name' => [
                    'asc' => ['works_productsubcategory.name' => SORT_ASC],
                    'desc' => ['works_productsubcategory.name' => SORT_DESC],
                    'default' => SORT_ASC,
                ],  
                'product_id.productnumber' => [
                    'asc' => ['works_product.productnumber' => SORT_ASC],
                    'desc' => ['works_product.productnumber' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
            ],
            'defaultOrder' => [
              'productsubcategory_id.name'=> SORT_ASC,  
              'product_id.productnumber' => SORT_ASC,
            ]
          ]);
            
     if (Yii::$app->request->post('hasEditable')) {
        $salesorderId = Yii::$app->request->post('editableKey');
        $model = Salesorderdetail::findOne($salesorderId);

        // store a default json response as desired by editable
        $out = Json::encode(['output'=>'', 'message'=>'']);

        // fetch the first entry in posted data (there should only be one entry 
        // anyway in this array for an editable submission)
        // - $posted is the posted data for Model without any indexes
        // - $post is the converted array for single model validation
        $posted = current($_POST['Salesorderdetail']);
        $post = ['Salesorderdetail' => $posted];

        // load model like any single model validation
        if ($model->load($post)) {
        // can save model or do something before saving model
        $model->save();
        }
        // custom output to return to be displayed as the editable grid cell
        // data. Normally this is empty - whereby whatever value is edited by
        // in the input by user is updated automatically.
        $output = '';


        if (isset($posted['unit_price'])) {
          $output = Yii::$app->formatter->asDecimal($model->unit_price, 2);
        }
        
        if (isset($posted['paid'])) {
          $output = Yii::$app->formatter->asDecimal($model->paid, 2);
        }
        
        if (isset($posted['advance_payment'])) {
          $output = Yii::$app->formatter->asDecimal($model->advance_payment, 2);
        }
        
        if (isset($posted['tip'])) {
          $output = Yii::$app->formatter->asDecimal($model->tip, 2);
        }
        // similarly you can check if the name attribute was posted as well
        // if (isset($posted['name'])) {
        // $output = ''; // process as you need
        // }
        $out = Json::encode(['output'=>$output, 'message'=>'']);
     
        // return ajax json encoded response and exit
        echo $out;
        return;
     }
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Salesorderdetail model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Salesorderdetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!\Yii::$app->user->can('Create Daily Job Sheet')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to create a daily jobsheet.');
        }        
        $model = new Salesorderdetail();
        $model->sales_order_id = Yii::$app->session['sales_order_id'];
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->sales_order_id]);
        } else {
            return $this->render('create', [
                'model' => $model,'sales_order_id'=> Yii::$app->session['sales_order_id']
            ]);
        }
    }

    /**
     * Updates an existing Salesorderdetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (!\Yii::$app->user->can('Update Daily Job Sheet')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to update a daily jobsheet.');
        }        
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sales_order_detail_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Salesorderdetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (!\Yii::$app->user->can('Delete Daily Job Sheet')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to delete a daily jobsheet.');
        }         
        try {
            $model = $this->findModel($id);
	    $this->findModel($id)->delete();            
            return $this->redirect(['index','id'=>$model->sales_order_id]);
	} catch(IntegrityException $e) {              
              throw new \yii\web\HttpException(404, 'Integrity Constraint exception.');
        }
    }
    
    public function actionPaidticked()
    {
      if (!\Yii::$app->user->can('Update Daily Job Sheet')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to update a daily jobsheet.');
      }    
      $keylist = Yii::$app->request->get('keylist');
      if (!empty($keylist)){
      foreach ($keylist as $key => $value)
      {
                    $model = $this->findModel($value);
                    if ($model !== null) {
                        $model->paid = $model->unit_price;
                        $model->cleaned = "Cleaned";
                        $model->save();
                    }
      }
      }
      else throw new NotFoundHttpException('No ticks selected.');
      
    }
    
    public function actionUnpaidticked()
   {
      if (!\Yii::$app->user->can('Update Daily Job Sheet')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to update a daily jobsheet.');
      }    
      $keylist = Yii::$app->request->get('keylist');
      if (!empty($keylist)){
      foreach ($keylist as $key => $value)
      {
                    $model = $this->findModel($value);
                    if ($model !== null) {
                        $model->paid = 0;
                        $model->save();
                    }
      }
      }
      else throw new NotFoundHttpException('No ticks selected.');
      
    }
    
    
        
    public function actionPay($id)
    {
        if (!\Yii::$app->user->can('Update Daily Job Sheet')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to update a daily jobsheet.');
        }    
        $model = $this->findModel($id);
        if ($model !== null) {
           $model->paid = $model->unit_price;
           $model->save();
        }
        return $this->redirect(['view', 'id' => $model->sales_order_detail_id]);
    }
    
    public function actionUnpay($id)
    {
        if (!\Yii::$app->user->can('Update Daily Job Sheet')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to update a daily jobsheet.');
        }    
        $model = $this->findModel($id);
        if ($model !== null) {
           $model->paid = 0;
           $model->save();
        }
        return $this->redirect(['view', 'id' => $model->sales_order_detail_id]);
    }
       
    public function actionDeleteticked()
   {
      if (!\Yii::$app->user->can('Delete Daily Job Sheet')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to delete a daily jobsheet.');
      } 
      $keylist = Yii::$app->request->get('keylist');
      if (!empty($keylist)){
      foreach ($keylist as $key => $value)
      {
                    $model = $this->findModel($value);
                    if ($model !== null) {$model->delete();}
      } 
      }
      else throw new NotFoundHttpException('No ticks selected.');
    }
    
    public function actionCleanedticked()
    {
      if (!\Yii::$app->user->can('Update Daily Job Sheet')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to update a daily jobsheet.');
      }    
      $keylist = Yii::$app->request->get('keylist');
      if (!empty($keylist)){
      foreach ($keylist as $key => $value)
      {
                    $model = $this->findModel($value);
                    if ($model !== null) {
                        $model->cleaned = "Cleaned";
                        $model->save();
                    }
      }
      }
      else throw new NotFoundHttpException('No ticks selected.');
    }
    
     public function actionNotcleanedticked()
    {
      if (!\Yii::$app->user->can('Update Daily Job Sheet')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to update a daily jobsheet.');
      }    
      $keylist = Yii::$app->request->get('keylist');
      if (!empty($keylist)){
      foreach ($keylist as $key => $value)
      {
                    $model = $this->findModel($value);
                    if ($model !== null) {
                        $model->cleaned = "Not Cleaned";
                        $model->save();
                    }
      }
      }
      else throw new NotFoundHttpException('No ticks selected.');
    }
    
     public function actionMissedticked()
    {
      if (!\Yii::$app->user->can('Update Daily Job Sheet')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to update a daily jobsheet.');
      }    
      $keylist = Yii::$app->request->get('keylist');
      if (!empty($keylist)){
      foreach ($keylist as $key => $value)
      {
                    $model = $this->findModel($value);
                    if ($model !== null) {
                        $model->cleaned = "Missed";
                        $model->save();
                    }
      }
      }
      else throw new NotFoundHttpException('No ticks selected.');
    }
    
    public function actionTransferticked()
    {
      if (!\Yii::$app->user->can('Update Daily Job Sheet')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to update a daily jobsheet.');
      }    
      $keylist = Yii::$app->request->get('keylist');
      //$transadv assigned dropdownbox sales order id value
      $transadv = Yii::$app->request->get('transadv');
      if (!empty($keylist))
      {
        foreach ($keylist as $key => $value)
        {
                    $model = $this->findModel($value); 
                    if ($model !== null) {
                        $prod = $model->product_id;
                        $amount = $model->advance_payment;
                        $model->advance_payment = 0;
                       //transfer current advance payment to future prepayment
                        Utilities::soi2soi($prod,$transadv,$amount);
                        $model->save();
                    }
        }
      }     
      
      else throw new NotFoundHttpException('No ticks selected.'); 
    }
   
    public function actionAddpretopaidticked()
    {
      if (!\Yii::$app->user->can('Update Daily Job Sheet')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to update a daily jobsheet.');
      }    
      $keylist = Yii::$app->request->get('keylist');
      if (!empty($keylist))
      {
        foreach ($keylist as $key => $value)
        {
                    $model = $this->findModel($value); 
                    if ($model !== null) {
                        $amount = $model->pre_payment;
                        $paid = $model->paid;
                        $model->paid = $paid + $amount;
                        $model->pre_payment = 0;
                        $model->save();
                    }
        }
      }     
      
      else throw new NotFoundHttpException('No ticks selected.'); 
    }
    
    public function actionOwingticked()
    {
      if (!\Yii::$app->user->can('Update Daily Job Sheet')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to update a daily jobsheet.');
      }    
      $keylist = Yii::$app->request->get('keylist');
      $message_text = Yii::$app->request->get('sdmessage');
      if (!empty($keylist)){
      foreach ($keylist as $key => $value)
      {
                    $model = $this->findModel($value);
                    if (($model !== null) & (!empty($model->product->contactmobile) & (strlen($model->product->contactmobile)===11))) 
                        {
                       $twilioService = Yii::$app->Yii2Twilio->initTwilio();
                        try {
                            $q = new Query;
                            $rows = $q->select('*')
                            ->from('works_salesorderdetail')
                            ->where(['and','product_id='.$model->product_id,'paid=0.00'])
                            ->andWhere('cleaned="Cleaned"')
                            ->andWhere('sales_order_detail_id<='.$model->sales_order_detail_id)
                            ->all();
                            $subtotal = 0.00;
                            $pay = "";
                            foreach ($rows as $key => $value)
                            {
                              $subtotal += $rows[$key]['unit_price'];
                              $val = $rows[$key]['sales_order_id'];
                              $cleandate = Salesorderheader::findOne($val);
                              $date = "Clean date: " . $cleandate->clean_date;
                              $owed = " Owing:£" . $rows[$key]['unit_price']; 
                              $pay = $pay ." ".$date. $owed;                                
                            }
                            $pay = $pay. ".$subtotal payment appreciated. Reference: ".$model->product->name." Please reply -- paid -- to this text once payment has been made.";
                            If ($subtotal > 0) {} else $pay = "";
                            date_default_timezone_set("Europe/London");
                            $date = date('d/m/Y h:i:s a', time());
                            $completemessage = $date. " Hi ".$model->product->name .", ". $message_text. " " .$pay;
                            $message = $twilioService->account->messages->create(
                           //affects frontend/config/main.php
                            Yii::$app->params['DialingCodeRestriction'] .substr($model->product->contactmobile,1), // To a number that you want to send sms
                            array(
                                "from" =>  Company::findOne(1)->twilio_telephone,   // eg. "+441315103755" From a number that you are sending
                                "body" => $completemessage, 
                            ));
                           } catch (\Twilio\Exceptions\RestException $e) {
                                echo $e->getMessage();
                                var_dump($e->getMessage());
                           }                            
                    }                  
      }
      }
      if (!empty($keylist)){
      foreach ($keylist as $key => $value)
          {                     
                       $model = $this->findModel($value); 
                       if (($model !== null) & (!empty($model->product->contactmobile) & (strlen($model->product->contactmobile)===11))) 
                        {
                            
                            $date = date('d/m/Y h:i:s a', time());
                            $completemessage = $date. " Hi ".$model->product->name .", ". $message_text. " ";
                            $model2 = new Messagelog();
                            $model2->message = $completemessage;
                            $model2->date = date('Y-m-d');
                            $model2->phoneto = $model->product->contactmobile;
                            $model2->salesorderdetail_id = $model->sales_order_detail_id;
                            $model2->product_id = $model->product_id; 
                            $model2->save();
                        }
         }
     } else throw new NotFoundHttpException('No ticks selected.');
     
    }
    
    /**
     * Finds the Salesorderdetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Salesorderdetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    
    public function actionTakeoneoffpayment()
    {
        if (!\Yii::$app->user->can('Update Daily Job Sheet')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to update a daily jobsheet.');
        }
	$comp = Company::findOne(1);    
        $keylist = Yii::$app->request->get('keylist');
        $message = "";
        $source = Url::to('@web/images/gocardless.png');
        if (!empty($keylist)){
            foreach ($keylist as $key => $value)
            {
                $model = $this->findModel($value);
                if (($model !== null) & (!empty($model->product->email)) & (!empty($model->product->mandate))) 
                {
                    $q = new Query;
                    $rows = $q->select('*')
                    ->from('works_salesorderdetail')
                    ->where(['and','product_id='.$model->product_id,'paid=0.00'])
                    ->andWhere('cleaned="Cleaned"')
                    ->andWhere('sales_order_detail_id<='.$model->sales_order_detail_id)
                    ->all();
                    $subtotal = 0.00;
                    foreach ($rows as $key => $value)
                    {
                      $subtotal += $rows[$key]['unit_price'];                                                      
                    }
                    //add the current clean to the subtotal of previous cleans to give the complete total
                    $totalcleanamount = $subtotal + $model->unit_price;
                    $client = new \GoCardlessPro\Client([
                   'access_token' => $comp->gc_accesstoken,
                   'environment' => $comp->gc_live_or_sandbox == 'SANDBOX' ? \GoCardlessPro\Environment::SANDBOX : \GoCardlessPro\Environment::LIVE ,
                   ]);
                    $payment = $client->payments()->create([
                    "params" => [
                        "amount" => $totalcleanamount*100, // 10 GBP in pence
                        "currency" => "GBP",
                        "links" => [
                            "mandate" => $model->product->mandate,
                        ],
                        // Almost all resources in the API let you store custom metadata,
                        // which you can retrieve later
                        //put in an invoice number
                        "metadata" => [
                            "invoice_number" => "INV".$model->sales_order_detail_id,
                        ]
                    ],
                    "headers" => [
                        "Idempotency-Key" => "random_payment_specific_string"
                    ]
                  ]);
                    $model2 = new Gocardlessinvoice();
                    $model2->invoicenumber = "INV".$model->sales_order_detail_id;
                    $model2->product_id = $model->product_id;
                    $model2->date = date('Y-m-d');
                    $model2->amount = $totalcleanamount;
                    $model2->payment_id = $payment->id;
                    $model2->save();
             } //if (($model !== null) & (!empty($model->product->email)) & (!empty($model->product->mandate))) 
          }//foreach ($keylist as $key => $value)                                
        } // if (!empty($keylist))
        else throw new NotFoundHttpException('Exception: Either No ticks selected, no email of householder, or no direct debit mandate from householder.'); //if (($model !== null) & (!empty($model->product->email))) 
        
    }
    
    public function actionCopyticked($id)
   {
      if (!\Yii::$app->user->can('Update Daily Clean')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to copy the ticked step.');
      }
       $model2 = Salesorderheader::findOne(Yii::$app->session['sales_order_id']);
       $salesorderdetails = $model2->salesorderdetails;
       $model = new Salesorderheader();
       $model->status = $model2->status;
       $model->statusfile = $model2->statusfile;
       $model->employee_id = $model2->employee_id;
        if ($id == 1) { $model->clean_date = date('Y-m-d');}
        if ($id == 2)
        { 
            $date = $model2->clean_date;
            $addeddate = date('Y-m-d', strtotime($date. ' + 31 days'));
            $model->clean_date = $addeddate;
        }
       $model->sub_total = 0;
       $model->tax_amt=0;
       $model->total_due=0;
       //save the record to generate a new sales order id
       $model->save();
       //find the last record's sales_order_id just saved
       //Yii::$app->session['salesoid'] = $model->sales_order_id; 
       foreach ($salesorderdetails as $key => $value)
       {
           $model3= new Salesorderdetail();
           $model3->sales_order_id = $model->sales_order_id;
           $model3->cleaned = "Not Cleaned";
           $product_id = $salesorderdetails[$key]['product_id'];
           $found = Product::find()->where(['id'=>$product_id])->one();
           if ($found->frequency == "Weekly")
            {
                    $date = strtotime("+7 day");
                    $addeddate = date("Y-m-d" , $date);
                    $model3->nextclean_date = $addeddate;
            };
            if ($found->frequency == "Monthly")
                {
                   $date = strtotime("+30 day");
                   $addeddate = date("Y-m-d" , $date);
                   $model3->nextclean_date = $addeddate;
                };
            if ($found->frequency == "Fortnightly")
                {
                   $date = strtotime("+15 day");
                   $addeddate = date("Y-m-d" , $date);
                   $model3->nextclean_date = $addeddate;
                };
            if ($found->frequency == "Every two months")
                {
                   $date = strtotime("+60 day");
                   $addeddate = date("Y-m-d" , $date);
                   $model3->nextclean_date = $addeddate;
                }; 
           if ($found->frequency == "Not applicable")
                {
                   $model3->nextclean_date = date("Y-m-d"); 
                };          
           $model3->productcategory_id = $salesorderdetails[$key]['productcategory_id'];
           $model3->productsubcategory_id =$salesorderdetails[$key]['productsubcategory_id'];
           $model3->product_id =$salesorderdetails[$key]['product_id'];
           $model3->unit_price =$salesorderdetails[$key]['unit_price'];
           $model3->paid =0;
           $model3->save();
       } 
     Yii::$app->session->setFlash('success',"This daily clean has been copied. Modify the date as necessary later.");
    }
    
    protected function findModel($id)
    {
        if (($model = Salesorderdetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('SalesorderdetailController: The requested model does not exist.');
        }
    }
    
    
    
}
