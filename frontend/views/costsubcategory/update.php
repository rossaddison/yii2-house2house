<?php

use yii\helpers\Html;

$this->title = 'Update Cost Subcategory: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cost Subcategory', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="costsubcategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
