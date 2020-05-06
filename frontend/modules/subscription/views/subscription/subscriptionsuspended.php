<?php 
use kartik\number\NumberControl;
use frontend\models\Company;
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h5>
         <div class="alert alert-primary" role="alert">   
          <?php echo Yii::t('app','Paypal Agreement Id: ') . $suspended_agreement_id . "<br><br>" .
                Yii::t('app','Your annually renewable subscription of '). NumberControl::widget([
                                    'name' => 'currency-num',
                                    'value' => 5.00,
                                    'maskedInputOptions' => ['prefix' => Company::findOne(1)->currency_prefix, 'suffix' => Company::findOne(1)->currency_suffix],
                         ]) . Yii::t('app', ' per month has been suspended with Paypal by yourself. ').
                Yii::t('app','As long as your agreement is suspended you will not have access to your data. ');
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
     <?= Html::a('Reactivate my subscription', ['reactivate'], [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to reactivate your subscription?'),
                'method' => 'post',
            ],
            'title'=>Yii::t('app', 'Reactivating your subscription will give you access to your previous database.'),
            'data-toggle'=>'tooltip',
     ]) ?>
    </div>
</div>  