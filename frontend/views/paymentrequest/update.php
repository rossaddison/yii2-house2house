<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Paymentrequest */

$this->title = 'Update Paymentrequest: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Paymentrequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paymentrequest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
