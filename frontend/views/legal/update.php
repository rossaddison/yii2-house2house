<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Legal */

$this->title = 'Update Legal: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Legals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="legal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
