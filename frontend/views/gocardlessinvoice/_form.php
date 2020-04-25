<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="gocardlessinvoice-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'product_id')->textInput() ?>
    <?= $form->field($model, 'date')->textInput() ?>
    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
