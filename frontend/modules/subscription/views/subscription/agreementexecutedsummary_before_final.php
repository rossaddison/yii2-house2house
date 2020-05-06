<?php
  use frontend\modules\subscription\components\Utilities;
  use Yii;
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h5>
         <div class="alert alert-primary" role="alert">   
          <?php echo Yii::t('app','Paypal Agreement Id: ') . $summary_agreement_id; ?>
          <?php //echo "Summary Agreement Details"; var_dump($agreement->toArray()); 
                $arr = [];
                $arr = $summary_agreement_plan->toArray();
                echo Yii::t('app','Type: ') .Utilities::displayRecursiveResults($arr,'type');
                echo Yii::t('app','Frequency: ') .Utilities::displayRecursiveResults($arr,'frequency');
                // echo "Frequency: " .Utilities::displayRecursiveResultsOriginal($arr);
                
          ?> 
          <?php //echo "Summary Agreement's Session Plan id:"; var_dump($summary_agreement_plan_id); ?>
          <?php echo Yii::t('app','Summary Agreement Plan that will appear after approval. '); var_dump($summary_agreement_plan->toArray()); 
          
          
          
          ?> 
          <?php  $date = new \DateTimeZone(\Yii::$app->timeZone);
                 echo $date->getName().'<br>';
                 //c is iso8601 date
                 echo "mydate " .$mydate = date('c', time() + 3600);
                 echo "<br>";
                 echo Yii::t('app','Default time zone ').Yii::$app->formatter->defaultTimeZone;
                 echo "<br>";
                 echo Yii::t('app','Datetime ') . Yii::$app->formatter->asDatetime($mydate);
                 echo "<br>";
                 echo Yii::t('app','Timestamp ') . Yii::$app->formatter->asTimestamp($mydate);
           ?>
           <?php

            echo '<time datetime="'.date('c').'">'.date('Y - m - d').'</time>';

           ?>
         </div>     
     </h5>
    </div>
</div>   
https://stackoverflow.com/questions/45645892/getting-status-from-paypal-array
        