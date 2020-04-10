<?php

use \kartik\icons\Icon;
use yii\helpers\Url;
use yii\helpers\Html;
use \kartik\form\ActiveForm;
use yii\helpers\Arrayhelper;
use frontend\modules\subscription\components\SessionHelper;
if ($mode === 'sandbox') {$this->title = Yii::t('app', 'Subscription - Part 1 - subscribe.php');}
if ($mode === 'live') {$this->title = Yii::t('app', 'Subscription');}
$this->params['breadcrumbs'][] = ['label' => 'Subscribe', 'url' => ['subscription/subscription/subscribe.php']];
$this->params['breadcrumbs'][] = $this->title;

?>

<h1>
    <?= $this->title ?>
</h1>

<?= \frontend\modules\subscription\widgets\Alert::widget() ?>
<?php
$form = ActiveForm::begin([
    'type' => ActiveForm::TYPE_HORIZONTAL,
]);
?>
<?php if ($mode === 'sandbox') { ?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h5>
          <div class="alert alert-warning" role="alert"><br>
              Mode (Sandbox / Live): <?php echo $mode; ?><?= Yii::t('app', ' .....Change to "live" in modules\subscription\components\Configpaypal.php') ?><br>
          </div>   
        </h5> 
        <h5>
            <div class="alert alert-success" role="alert"><br>
               <h3>Billing/Subscription Plan:  <br></h3>
               <h5>(values set here are available under modules\subscription\models\subscribe.php)</h5>
            </div>
            <div class="alert alert-primary" role="alert">
                <?= $form->field($model, 'plan_name') ?>
                <?= $form->field($model, 'plan_description') ?>
                <?= $form->field($model, 'plan_type')->dropDownList(['INFINITE'=>'INFINITE','FIXED'=>'FIXED']); ?>
                <?php echo Html::a('https://github.com/paypal/PayPal-PHP-SDK/issues/384','https://github.com/paypal/PayPal-PHP-SDK/issues/384'); ?>
                <br>
                <br>
                <?= $form->field($model, 'plan_state')->dropDownList(['CREATED'=>'CREATED','ACTIVE'=>'ACTIVE','INACTIVE'=>'INACTIVE','DELETED'=>'DELETED']); ?>
            </div>
        </h5>
        <h5>
           <div class="alert alert-success" role="alert">    
               <h3><?= Yii::t('app', 'Billing/Subscription Plan: Payment Definition Settings') ?></h3>
           </div> 
           <div class="alert alert-primary" role="alert">
                <?= $form->field($model, 'payment_definition_name') ?>
                <?= $form->field($model, 'payment_definition_type')->dropDownList(['TRIAL'=>'TRIAL','REGULAR'=>'REGULAR']); ?>
                <?php echo Html::a('https://github.com/paypal/PayPal-PHP-SDK/issues/384','https://github.com/paypal/PayPal-PHP-SDK/issues/384'); ?>
                <br>
                <br>
                <div class="alert alert-danger" role="alert">  
                   <h3><?= Yii::t('app', 'Note: If Billing Plan Type is FIXED, Payment Definition Type must be REGULAR'); ?></h3>
                </div> 
                <?= $form->field($model, 'payment_definition_frequency') ?>
                <?= $form->field($model, 'payment_definition_cycle') ?>
                <?= $form->field($model, 'payment_definition_amount_value') ?>
                <?= $form->field($model, 'payment_definition_amount_currency') ?>
           </div>
           <div class="alert alert-success" role="alert">    
               <h3><?= Yii::t('app', 'Billing/Subscription Plan Payment: Shipping Settings') ?></h3>
           </div>  
           <div class="alert alert-primary" role="alert">
                <?= $form->field($model, 'charge_model_type') ?>
                <?= $form->field($model, 'charge_model_amount_currency') ?>
                <?= $form->field($model, 'charge_model_amount_value') ?>
           </div> 
        </h5>
        <h5>
           <div class="alert alert-success" role="alert">  
               <h3><?= Yii::t('app', 'Merchant preferences using API MERCHANT PREFERENCES') ?></h3>
           </div> 
           <div class="alert alert-primary" role="alert">  
            <?= $form->field($model, 'merchant_preference_returnurl') ?>
            <?= $form->field($model, 'merchant_preference_cancelurl') ?>
            <?= $form->field($model, 'autobillamount')->dropDownList(['yes'=>'yes','no'=>'no']);  ?>
            <?= $form->field($model, 'initial_fail_amount_action') ?>
            <?= $form->field($model, 'max_fail_attempts') ?>
            <?= $form->field($model, 'setupfee_value') ?>
            <?= $form->field($model, 'setupfee_currency') ?>
           </div>     
        </h5>
        <h5>
           <div class="alert alert-success" role="alert">  
              <h3><?= Yii::t('app', 'Finalize and test billing plan') ?></h3>
           </div> 
           <div class="alert alert-primary" role="alert"> 
            <?= $form->field($model, 'patch_options')->dropDownList(['add'=>'add','remove'=>'remove','replace'=>'replace','move'=>'move','copy'=>'copy','test'=>'test']); ?>
            <?= $form->field($model, 'status')->dropDownList(['{"state":"ACTIVE"}'=>'{"state":"ACTIVE"}', '{"state":"INACTIVE"}'=>'{"state":"INACTIVE"}', '{"state":"DELETED"}'=>'{"state":"DELETED"}']); ?>
           </div> 
        </h5>
        <h5>
            <div class="alert alert-success" role="alert">    
               <h3><?= Yii::t('app', 'Agreement Name and Description') ?></h3>
            </div> 
            <div class="alert alert-primary" role="alert"> 
           
            <?= $form->field($model, 'agreement_name') ?>
            <?= $form->field($model, 'agreement_description') ?>
           </div> 
        </h5>   
        <h5>
          <div class="alert alert-success" role="alert">   
               <h3><?= Yii::t('app', 'Subscription Service Provider`s Shipping Address') ?></h3>    
          </div> 
        </h5>   
        <h5> 
           <div class="alert alert-primary" role="alert">  
            <?= $form->field($model, 'shipping_address_line1') ?>
            <?= $form->field($model, 'shipping_address_city') ?>
            <?= $form->field($model, 'shipping_address_state') ?>
            <?= $form->field($model, 'shipping_address_postcode') ?>
            <?= $form->field($model, 'shipping_address_countrycode') ?>
           </div>     
        </h5>
        <h5>
           <div class="alert alert-success" role="alert">     
              <h3><?= Yii::t('app', 'Start Date of Plan: ') ?></h3>
           </div> 
           <div class="alert alert-primary" role="alert">    
               <h3><?php  $yearOnly = date('c', time() + 3600); echo $yearOnly; ?></h3>
           </div>     
        </h5>
        <br>
         <h5>
          <div class="alert alert-primary" role="alert">
               <div class="alert alert-success" role="alert">     
                   <h3>ApiContext Settings: (Manually editable in modules\subscription\components\Configpaypal.php)</h3>
               </div> 
               <div class="alert alert-info" role="alert">     
                     <?= Yii::t('app', 'Access token will be null on first run.') ?> 
               </div> 
               <div class="alert alert-info" role="alert">   
                   <h3><?php var_dump(Yii::$app->session['apicontext']); ?></h3>
               </div>
          </div>    
        </h5>
        <h5>
          <div class="alert alert-primary" role="alert">
              <br><br><br><br>
               <b class="alert alert-danger">Complete Config from components/configpaypal.php </b>
               <br><br><br><br>
               <b class="alert alert-warning">log.LogLevel can be changed to INFO when going live.</b>
               <br><br><br><br>
               <p class="alert alert-success">When validation level is on strict it gives a more detailed breakdown in frontend/runtime/logs/paypal.log file.</p>
               <div><br><br><?php var_dump($config); ?></div>
          </div>    
        </h5>
        
        <h5>
          <div class="alert alert-primary" role="alert">
                  Payment Method used by the Payer/Subscriber: Paypal
          </div>    
        </h5>
    </div>
</div>
<?php } //if mode is sandbox ?>
<div class="row collapse" >
<?php if ($mode === 'live') { ?>
            <?= $form->field($model, 'plan_name')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'plan_description')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'plan_type')->dropDownList(['INFINITE'=>'INFINITE','FIXED'=>'FIXED'])->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'plan_state')->dropDownList(['CREATED'=>'CREATED','ACTIVE'=>'ACTIVE','INACTIVE'=>'INACTIVE','DELETED'=>'DELETED'])->hiddenInput()->label(false); ?>
            
            <?= $form->field($model, 'payment_definition_name')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'payment_definition_type')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'payment_definition_frequency')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'payment_definition_cycle')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'payment_definition_amount_value')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'payment_definition_amount_currency')->hiddenInput()->label(false); ?>
            
            <?= $form->field($model, 'charge_model_type')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'charge_model_amount_currency')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'charge_model_amount_value')->hiddenInput()->label(false); ?>
            
            <?= $form->field($model, 'merchant_preference_returnurl')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'merchant_preference_cancelurl')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'autobillamount')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'initial_fail_amount_action')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'max_fail_attempts')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'setupfee_value')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'setupfee_currency')->hiddenInput()->label(false); ?>
            
            <?= $form->field($model, 'patch_options')->dropDownList(['add'=>'add','remove'=>'remove','replace'=>'replace','move'=>'move','copy'=>'copy','test'=>'test'])->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'status')->dropDownList(['{"state":"ACTIVE"}'=>'{"state":"ACTIVE"}', '{"state":"INACTIVE"}'=>'{"state":"INACTIVE"}', '{"state":"DELETED"}'=>'{"state":"DELETED"}'])->hiddenInput()->label(false); ?>
            
            <?= $form->field($model, 'agreement_name')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'agreement_description')->hiddenInput()->label(false); ?>
            
            <?= $form->field($model, 'shipping_address_line1')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'shipping_address_city')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'shipping_address_state')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'shipping_address_postcode')->hiddenInput()->label(false); ?>
            <?= $form->field($model, 'shipping_address_countrycode')->hiddenInput()->label(false); ?>
            <?php  $yearOnly = date('c', time() + 3600); ?>
   </div>
   <div class="row">
       <div class="col-md-8 col-md-offset-2">
           <div class="alert alert-primary" role="alert">
               <h2>Paypal Monthly Subscription Plan of &pound; 5 per month commencing from <?php echo $yearOnly; ?> </h2>
               <br>
               <div class="alert alert-info" role="alert">  
               Click on the "I Agree" Button to agree to the terms and proceed to Paypal.
               </div>
               <br>
               <div class="alert alert-info" role="alert">  
               You may cancel your Monthly Subscription at any stage by accessing the Subscription submenu on this site.
               </div>
               <br>
               <div class="alert alert-info" role="alert">  
               You will be redirected back to this site after successful completion of the Agreement with Paypal.
               </div>
               <br>
               <div class="alert alert-info" role="alert">   
                   <br>Please agree to the following terms by clicking on the "I Agree" button.
               <br>
               </div>
               <br>
               <div class="alert alert-success" role="alert">   
               "I agree to pay &pound; 5 per month for the next 12 months for the software "as is". This includes improvements,
               bug fixes, delays, and inconveniance due to downtime.  I am also aware that as a result of Data Protection Policy
               Administrators of this site are entitled to keep data belonging to myself, active and undeleted for a period of 30 days after the termination date. 
               <br>
               <br> 
               I have read the Data Protection Policy and Terms and Conditions and am in agreement with the Policy and Terms.  I also agree not to post any material that is degrading and irrelevant to conduct regarded as normal and legal for this site."  
               </div>
           </div>   
       </div>
   </div>

<?php } //if mode is live ?>


<div class="subscription-controls">
    

    <?=
    Html::submitButton(
        Yii::t('app', 'I Agree') .' ' . Icon::show('arrow-right'),
        [
            'class' => 'btn btn-primary btn-lg pull-right',
        ]
    )
    ?>

</div>
<?php
ActiveForm::end();
$js = <<<JS

JS;
$this->registerJs($js);
?>
