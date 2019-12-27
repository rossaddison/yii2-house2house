<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Quicknote */

$this->title = 'Update Quicknote: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quicknotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quicknote-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
