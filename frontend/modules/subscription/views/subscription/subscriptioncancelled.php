<?php 
use kartik\number\NumberControl;
use frontend\models\Company;
use Yii;
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h5>
         <div class="alert alert-primary" role="alert">   
          <?php echo Yii::t('app','Paypal Agreement Id: ') . $cancelled_agreement_id . '<br><br>'. 
                Yii::t('app','Your annually renewable subscription of '). NumberControl::widget([
                                    'name' => 'currency-num',
                                    'value' => 5.00,
                                    'maskedInputOptions' => ['prefix' => Company::findOne(1)->currency_prefix, 'suffix' => Company::findOne(1)->currency_suffix],
                         ]). Yii::t('app',' per month has been cancelled with Paypal by yourself. ') . Yii::t('app','You will need to Create and Activate your monthly subscription in order to create a new subscription. <br>');
                
          ?>
         </div>     
     </h5>
     <?= Html::a(Yii::t('app','Activate a new subscription.'), ['subscribe'], [
            'class' => 'btn btn-info',
            'data' => [
                'confirm' => Yii::t('app','Are you sure you want to Create and Activate a completely new subscription?'),
                'method' => 'post',
            ],
            'title'=>Yii::t('app','You will have access to your previous database if you use the same email address and password.'),
            'data-toggle'=>'tooltip',
     ]) ?>
    </div>
</div>  