<?php 
use kartik\number\NumberControl;
use frontend\models\Company;
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h5>
         <div class="alert alert-primary" role="alert">   
          <?php echo Yii::t('app','Paypal Agreement Id: ') . $reactivated_agreement_id . "<br><br>";
                echo Yii::t('app','Your annually renewable subscription of ') . NumberControl::widget([
                                    'name' => 'currency-num',
                                    'value' => 5.00,
                                    'maskedInputOptions' => ['prefix' => Company::findOne(1)->currency_prefix, 'suffix' => Company::findOne(1)->currency_suffix],
                         ]). Yii::t('app',' per month has been reactivated with Paypal by yourself.');
                echo "<br>";
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
     <?= Html::a(Yii::t('app','View my subscription details'), ['agreementdetails'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app','Are you sure you want to view your subscription?'),
                'method' => 'post',
            ],
            'title'=>Yii::t('app','View subscription details.'),'data-toggle'=>'tooltip',
     ]) ?>
    </div>
</div>  