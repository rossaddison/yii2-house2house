<?php 
use kartik\number\NumberControl;
use frontend\models\Company;
use Yii;
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h5>
         <div class="alert alert-primary" role="alert">   
          <?php echo Yii::t('app','Paypal Agreement: <br><br>') .
                     Yii::t('app','Your annually renewable subscription of ').
                        NumberControl::widget([
                                    'name' => 'currency-num',
                                    'value' => 5.00,
                                    'maskedInputOptions' => ['prefix' => Company::findOne(1)->currency_prefix, 'suffix' => Company::findOne(1)->currency_suffix],
                         ]) .Yii::t('app',' per month has already been suspended with Paypal by yourself. ').
                Yii::t('app','To reactivate your account return to the main menu and click on the re-activate button. ') .
                Yii::t('As long as your agreement is suspended you will not have access to your data.<br> ');
          ?>
          <?php
           // var_dump($summary_agreement_plan->toArray());
          ?>
          <?php
            //var_dump($agreement->getPlan()->toArray());
          ?>
          <?php
            //var_dump($agreement->toArray());
          ?>   
         </div>     
     </h5>
    </div>
</div>  