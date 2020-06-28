<?php
   use yii\helpers\Url;
   use yii\helpers\Html;
?>
<div class="krajeeproducttree-product">
    <br>
        <?php
          if ($node->product_id > 0){
            echo Html::a('<h4>View House Details: ' .$node->name. '</h4>',Url::toRoute(['/product/view','id'=>$node->product_id]));
          }         
          if ($node->productsubcategory_id > 0){
            echo Html::a('<h4>View Street Details: ' .$node->name. '</h4>',Url::toRoute(['/productsubcategory/view','id'=>$node->productsubcategory_id]));
          }         
          if ($node->productcategory_id > 0){
            echo Html::a('<h4>View Postcode Details: ' .$node->name. '</h4>',Url::toRoute(['/productcategory/view','id'=>$node->productcategory_id]));
          }
        ?>
    <br>
</div>