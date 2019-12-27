<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Subpayrec */
/* @var $form ActiveForm */
?>
<div class="subpayrec-view">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'user_id') ?>
        <?= $form->field($model, 'year') ?>
        <?= $form->field($model, 'jan') ?>
        <?= $form->field($model, 'feb') ?>
        <?= $form->field($model, 'mar') ?>
        <?= $form->field($model, 'apr') ?>
        <?= $form->field($model, 'may') ?>
        <?= $form->field($model, 'jun') ?>
        <?= $form->field($model, 'jul') ?>
        <?= $form->field($model, 'aug') ?>
        <?= $form->field($model, 'sep') ?>
        <?= $form->field($model, 'oct') ?>
        <?= $form->field($model, 'nov') ?>
        <?= $form->field($model, 'dec') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- subpayrec-view -->
