<?php
  use Yii;
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
     <h5>
       <div class="alert alert-primary" role="alert">
          <?php echo Yii::t('app','Summary ApiContext'); var_dump($summary_apiContext); ?>
       </div>     
     </h5>
     <h5>
        <div class="alert alert-primary" role="alert">   
          <?php echo Yii::t('app','Summary Agreement Name'); var_dump($summary_name);  ?>
        </div>     
     </h5>
     <h5>
        <div class="alert alert-primary" role="alert">   
          <?php echo Yii::t('app','Summary Agreement'); var_dump($summary_agreement); ?>
            </div>     
     </h5>
     <h5>
         <div class="alert alert-primary" role="alert">   
          <?php echo Yii::t('app','Summary Agreement Id that will appear after approval. Null otherwise.');var_dump($summary_agreement_id); ?>
         </div>     
     </h5>
     <h5>
         <div class="alert alert-primary" role="alert">   
         <?php echo Yii::t('app','Summary Plan'); var_dump($summary_plan->toArray()); ?>
         </div>     
     </h5> 
     <h5>
         <div class="alert alert-primary" role="alert">   
         <?php //echo "Summary Plan Id"; var_dump($summary_plan_id); ?>
         </div>     
     </h5>
     <h5>
         <div class="alert alert-primary" role="alert">   
         <?php echo Yii::t('app','Summary Chargemodel'); var_dump($summary_chargemodel); ?>
         </div>     
     </h5>
     <h5>
         <div class="alert alert-primary" role="alert">    
         <?php echo Yii::t('app','Summary Payer Default: Paypal'); var_dump($summary_payer); ?>
         </div>     
     </h5>
     <h5>
         <div class="alert alert-primary" role="alert">   
         <?php echo Yii::t('app','Summary Shipping Address'); var_dump($summary_shipaddress); ?>
         </div>     
     </h5>
     <h5>
        <div class="alert alert-primary" role="alert">   
        <?php echo Yii::t('app','Summary Url to be sent to Customer to approve agreement ie. Approval Url');var_dump($summary_approvalUrl);?>
        </div>     
     </h5>
     <h5>
        <div class="alert alert-primary" role="alert">   
        <?php echo Yii::t('app','Summary startdate (must be later than current date otherwise error 400'); var_dump($summary_startdate);?>
        </div>     
     </h5>
     <h5>
        <div class="alert alert-primary" role="alert">   
        <?php echo Yii::t('app','Summary Chargemodel'); var_dump($summary_chargemodel); ?>
        </div>     
     </h5>
    </div>
</div>    
        