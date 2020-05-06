<?php
  use Yii;
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h5>
         <div class="alert alert-primary" role="alert">   
          <?php 
                echo Yii::t('app','Paypal Agreement Id: ') . $agreement_id . "<br><br>";
                echo "<br>";
          ?>
          <?php
             //var_dump($agreement_transactionlist);
          ?>
          <?php
            //var_dump($agreement->toArray());
          ?>   
          </div>     
     </h5>
    </div>
</div>  