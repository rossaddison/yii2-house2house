<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\jui\Datepicker;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nationalinsnumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_telno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'birthdate')->widget(\kartik\datecontrol\DateControl::classname(),['displayFormat' => 'php:Y-m-d',
                                'saveFormat' => 'php:Y-m-d',
                                'options' => [
                                    'pluginOptions' => ['autoclose' => true],
                                    'convertFormat'=>true 
                                ]]) ?> 
        
    <?= $form->field($model, 'maritalstatus')->dropDownList(['Single'=>'Single','Divorced'=>'Divorced','Married'=>'Married'],['prompt'=>'Marital Status']) ?>
    
    <?= $form->field($model, 'gender')->dropDownList(['Male'=>'Male','Female'=>'Female'],['prompt'=>'Gender']) ?>
   
    <?= $form->field($model, 'hiredate')->widget(\kartik\datecontrol\DateControl::classname(),['displayFormat' => 'php:Y-m-d',
                                'saveFormat' => 'php:Y-m-d',
                                'options' => [
                                    'pluginOptions' => ['autoclose' => true],
                                    'convertFormat'=>true 
                                ]]) ?> 
    
    <?= $form->field($model, 'salariedflag')->dropDownList(['Paid per hour - Not Salaried'=>'Paid per hour - Not Salaried','Not paid per hour - Salaried'=>'Not paid per hour - Salaried' ],['prompt'=>'Salaried Flag']) ?>

    <?= $form->field($model, 'vacationhours')->textInput() ?>

    <?= $form->field($model, 'sickleavehours')->textInput() ?>

    <?= $form->field($model, 'currentflag')->dropDownList(['Not current'=>'Not current','Current'=>'Current' ],['prompt'=>'Current Flag']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


