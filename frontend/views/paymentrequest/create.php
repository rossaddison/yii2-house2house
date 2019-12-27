<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Paymentrequest */

$this->title = 'Create Paymentrequest';
$this->params['breadcrumbs'][] = ['label' => 'Paymentrequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paymentrequest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
