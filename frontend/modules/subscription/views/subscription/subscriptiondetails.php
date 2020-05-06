<?php
  use Yii;
  use yii\helpers\HtmlPurifier;
  use yii\helpers\Html;
  $this->params['breadcrumbs'][] = ['label' => Yii::t('app','Your Paypal Subscription Details')];
  $this->params['breadcrumbs'][] = $this->title;   
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h5>
         <div class="alert alert-primary" role="alert">   
          <?php 
                echo Yii::t('app','Paypal Agreement Id: ') . HtmlPurifier::process($agreement_id) . "<br><br>";
                echo Yii::t('app','Last time you paid: ') .HtmlPurifier::process( substr($last_payment_date,0,10)) . "<br><br>";
                echo Yii::t('app','Next Billing Date: ') . HtmlPurifier::process(substr($next_billing_date,0,10)) . "<br><br>";
                echo Yii::t('app','"Cycles Remaining: ') . HtmlPurifier::process($cycles_remaining) . "<br><br>";
                echo Yii::t('app','Cycles Completed: ') . HtmlPurifier::process($cycles_completed). "<br><br>";
                echo Yii::t('app','Final Payment Date: ') . HtmlPurifier::process(substr($final_payment_date,0,10)) . "<br><br>";
                echo Yii::t('app','Last Payment Amount: ') . HtmlPurifier::process($currency_value) . "<br><br>";
                echo Yii::t('app','Outstanding Balance Amount: ') . HtmlPurifier::process($outstanding_balance_amount) . "<br><br>";
                echo "<br>";
          ?>
          
          <?php
            //var_dump($agreement->getPlan()->toArray());
          ?>
          <?php
            //var_dump($agreement->toArray());
          ?>   
          
         </div>     
     </h5>
     <?= Html::a(Yii::t('app','Cancel my subscription'), ['cancel'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app','Are you sure you want to cancel your subscription?'),
                'method' => 'post',
            ],
            'title'=> Yii::t('app','You will have to create a new subscription with Paypal if you decide to terminate your subscription.'),
            'data-toggle'=>'tooltip',
     ]) ?>
    </div>
</div>  