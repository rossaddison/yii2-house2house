<?php
  use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
<h1><?= Html::encode($this->title) ?></h1>
<table border="0" class="table transparent"> 
<?php
    
    echo Html::tag('div',
                Html::tag('tr',
                 '<td><b>'. $comment ."</td>")          
           );
?>
</table>    
<?php $this->endPage() ?>
