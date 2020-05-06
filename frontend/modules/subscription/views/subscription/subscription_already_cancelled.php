<?php 
use kartik\number\NumberControl;
use frontend\models\Company;
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h5>
         <div class="alert alert-primary" role="alert">   
          <?php echo Yii::t('app','Paypal Agreement:<br><br> Your annually renewable subscription of ').
                        NumberControl::widget([
                                    'name' => 'currency-num',
                                    'value' => 5.00,
                                    'maskedInputOptions' => ['prefix' => Company::findOne(1)->currency_prefix, 'suffix' => Company::findOne(1)->currency_suffix],
                         ]) . Yii::t('app',' per month has already been cancelled with Paypal by yourself. You will need to create a new subscription in order to access your data. <br>');
          ?>
         </div>     
     </h5>
    </div>
</div>  