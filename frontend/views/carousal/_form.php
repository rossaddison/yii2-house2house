<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model frontend\models\Carousal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carousal-form">

    <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => false,
            'options' => ['enctype' => 'multipart/form-data'],
    ]);
    ?>
  
   <?= $form->field($model, 'image')->widget(FileInput::classname(), 
            [
                'options'=>['accept'=>'image/*'],
                'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],
                  'showUpload'=>false,
                  'showRemove'=>false,
                  'multiple'=>false,
                  'resizeimages'=>true,
                  'browseClass' => 'btn btn-success',
                  'uploadClass' => 'btn btn-info',
                  'removeClass' => 'btn btn-danger',
                  'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> '
                  ],
              
            ]); ?>
    <?= $form->field($model, 'content_alt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_caption')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'fontcolor')->dropDownList(['black'=>'black','white'=>'white','red'=>'red'],['prompt'=>'Colour']) ?>
   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
