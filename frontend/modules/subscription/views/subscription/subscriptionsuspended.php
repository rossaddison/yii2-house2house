<?php
  use yii\helpers\ArrayHelper;
  use frontend\modules\subscription\components\Tools;
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h5>
         <div class="alert alert-primary" role="alert">   
          <?php echo "Paypal Agreement Id: " . $suspended_agreement_id . "<br><br>";
                echo "Your annually renewable subscription of &pound; 5 per month has been suspended with Paypal by yourself. ";
                echo "As long as your agreement is suspended you will not have access to your data. ";
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
                'confirm' => 'Are you sure you want to reactivate your subscription?',
                'method' => 'post',
            ],
            'title'=>'Reactivating your subscription will give you access to your previous database.',
            'data-toggle'=>'tooltip',
     ]) ?>
    </div>
</div>  