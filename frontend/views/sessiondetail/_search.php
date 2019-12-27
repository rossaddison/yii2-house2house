<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SessiondetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sessiondetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'session_detail_id') ?>

    <?= $form->field($model, 'session_id') ?>

    <?= $form->field($model, 'redirect_flow_id') ?>

    <?= $form->field($model, 'db') ?>

    <?= $form->field($model, 'product_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
