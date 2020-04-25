<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="gocardlessinvoice-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?> 
    <?= $form->field($model, 'id') ?>
    <?= $form->field($model, 'product_id') ?>
    <?= $form->field($model, 'payment_id') ?>
    <?= $form->field($model, 'date') ?>
    <?= $form->field($model, 'amount') ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app','Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app','Reset'), ['class' => 'btn btn-default']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
