<?php
  use yii\helpers\ArrayHelper;
  use frontend\modules\subscription\components\Tools;
  use yii\helpers\HtmlPurifier;
  use yii\helpers\Html;
  
  $this->params['breadcrumbs'][] = ['label' => 'Your Paypal Subscription Details'];
  $this->params['breadcrumbs'][] = $this->title;   
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h5>
         <div class="alert alert-primary" role="alert">   
          <?php 
                echo "Paypal Agreement Id: " . HtmlPurifier::process($agreement_id) . "<br><br>";
                echo "Last time you paid: " .HtmlPurifier::process( substr($last_payment_date,0,10)) . "<br><br>";
                echo "Next Billing Date: " . HtmlPurifier::process(substr($next_billing_date,0,10)) . "<br><br>";
                echo "Cycles Remaining: " . HtmlPurifier::process($cycles_remaining) . "<br><br>";
                echo "Cycles Completed: " . HtmlPurifier::process($cycles_completed). "<br><br>";
                echo "Final Payment Date: " . HtmlPurifier::process(substr($final_payment_date,0,10)) . "<br><br>";
                echo "Last Payment Amount: " . HtmlPurifier::process($currency_value) . "<br><br>";
                echo "Outstanding Balance Amount: " . HtmlPurifier::process($outstanding_balance_amount) . "<br><br>";
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
     <?= Html::a('Cancel my subscription', ['cancel'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to cancel your subscription?',
                'method' => 'post',
            ],
            'title'=>'You will have to create a new subscription with Paypal if you decide to terminate your subscription.',
            'data-toggle'=>'tooltip',
     ]) ?>
    </div>
</div>  