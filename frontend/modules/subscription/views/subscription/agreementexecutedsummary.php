<?php 
use kartik\number\NumberControl;
use frontend\models\Company;
use Yii;
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h5>
         <div class="alert alert-primary" role="alert">   
          <?php echo Yii::t('app','Paypal Agreement Id: ') . $summary_agreement_id . "<br><br>";
                echo Yii::t('app','An annually renewable subscription of ').
                        NumberControl::widget([
                                    'name' => 'currency-num',
                                    'value' => 5.00,
                                    'maskedInputOptions' => ['prefix' => Company::findOne(1)->currency_prefix, 'suffix' => Company::findOne(1)->currency_suffix],
                         ]) . Yii::t('app',' per month has been setup with Paypal by yourself. ');
                echo "<br>";
          ?> 
         </div>     
     </h5>
    </div>
</div>   
        