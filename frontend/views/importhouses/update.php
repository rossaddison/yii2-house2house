<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ImportHouses */

$this->title = 'Update Import file: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Import Houses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="importhouses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
