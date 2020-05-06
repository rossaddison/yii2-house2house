<?php
  use Yii;  
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h5>
         <div class="alert alert-primary" role="alert">   
          <?php echo Yii::t('app','Paypal Agreement: <br><br>'). Yii::t('app','Your subscription has to be active in order to be cancelled. Your subscription is currently suspended so reactivate and then cancel.').
                  "<br>";
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