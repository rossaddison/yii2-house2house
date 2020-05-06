<?php
  use Yii;  
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h5>
         <div class="alert alert-primary" role="alert">   
          <?php echo Yii::t('app','Paypal Agreement: <br><br>');
                echo Yii::t('app','Your subscription has to be suspended in order to reactivate it. Your subscription is currently cancelled. Create a new subscription.');
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
    </div>
</div>  