<?php
  use Yii;
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h5>
         <div class="alert alert-primary" role="alert">   
          <?php echo Yii::t('app','Web Types:<br><br>'). Yii::t('app','Webhook Event Types:  ') . $webhook_types_output                  
                .Yii::t('app','You will need to create a new subscription in order to access your data <br>');
          ?>
         </div>     
     </h5>
    </div>
</div>  