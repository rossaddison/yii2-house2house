 <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model frontend\models\Quicknote */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quicknote-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'note')->widget(CKEditor::className(),['options' => ['rows' => 20],'preset' => 'full']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
