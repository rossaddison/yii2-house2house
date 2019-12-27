<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model frontend\models\Legal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="legal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'privacy_policy')->widget(CKEditor::className(),['options' => ['rows' => 40],'preset' => 'full']) ?>
    
    <?= $form->field($model, 'terms_conditions')->widget(CKEditor::className(),['options' => ['rows' => 40],'preset' => 'full']) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
