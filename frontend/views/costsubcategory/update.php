<?php
use yii\helpers\Html;
$this->title = Yii::t('app','Update Cost Subcategory ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Cost Subcategory'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app','Update');
?>
<div class="costsubcategory-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
