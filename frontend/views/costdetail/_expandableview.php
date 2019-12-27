<?php
use yii\helpers\Html;
?>
<div class="costdetail-expandable-view">
    <table border="0" class="table transparent">
    <?php
    use frontend\models\Costsubcategory;
    use frontend\models\Costcategory;
        $costsubcodename = Costsubcategory::find()->where(['id'=>$costsubcode_id])->one();
        $costcodename = Costcategory::find()->where(['id'=>$costcode_id])->one();
        echo Html::tag('div',
             Html::tag('tr',
                 '<td >'."Category: ".
                 $costcodename['name']
                 ."</td><td>"."Subcategory: ". 
                 $costsubcodename['name']
                 ."</td>"
              )
            );
    ?>
    </table>
</div>
