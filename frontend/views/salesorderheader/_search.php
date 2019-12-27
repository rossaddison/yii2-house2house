<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SalesorderheaderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salesorderheader-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?php // $form->field($model, 'sales_order_id')->hiddenInput(['maxlength' => true])->label(false) ?>

    <?php // $form->field($model, 'status')->hiddenInput(['maxlength' => true])->label(false) ?>

     <?php // $form->field($model, 'statusfile')->hiddenInput(['maxlength' => true])->label(false) ?>

     <?php // $form->field($model, 'employee_id')->hiddenInput(['maxlength' => true])->label(false) ?>

     <?php // $form->field($model, 'clean_date')->hiddenInput(['maxlength' => true])->label(false) ?>

     <?php // $form->field($model, 'total_due') ?>
    
     <?php // $form->field($model, 'sub_total') ?>
    
    <?php // echo $form->field($model, 'sub_total') ?>

    <?php // echo $form->field($model, 'tax_amt') ?>

    <?php // echo $form->field($model, 'total_due') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
