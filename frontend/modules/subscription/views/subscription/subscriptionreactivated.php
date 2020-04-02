<?php
  use yii\helpers\ArrayHelper;
  use frontend\modules\subscription\components\Tools;
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h5>
         <div class="alert alert-primary" role="alert">   
          <?php echo "Paypal Agreement Id: " . $reactivated_agreement_id . "<br><br>";
                echo "Your annually renewable subscription of &pound; 5 per month has been reactivated with Paypal by yourself. ";
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
     <?= Html::a('View my subscription details', ['agreementdetails'], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to view your subscription?',
                'method' => 'post',
            ],
            'title'=>'View subscription details.'=>'tooltip',
     ]) ?>
    </div>
</div>  