<?php
use yii\helpers\Html;
$this->title = Yii::t('Update Cost Codes ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('Cost Codes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('Update');
?>
<div class="costcategory-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
