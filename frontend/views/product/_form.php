<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\Productcategory;
use frontend\models\Productsubcategory;
use frontend\models\Salesorderheader;
use yii\jui\Datepicker;
use kartik\depdrop\DepDrop;
/* @var $this yii\web\View */
/* @var $model frontend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
        
    <?= $form->field($model, 'productcategory_id')->dropDownList(ArrayHelper::map(Productcategory::find()->orderBy('name')->all(),'id','name'),['prompt'=>'Select...','id'=>'cat_id']) ?>

    <?= $form->field($model, 'productsubcategory_id')->widget(DepDrop::classname(), [
        'options'=>['id'=>'subcat_id'],
        'pluginOptions'=>[
        'depends'=>['cat_id'],  
        //'depends'=>[Html::getInputId($model, 'productcategory_id')], 
        //'placeholder'=>'Select...',
        //'placeholder'=>$model,
        'url'=>Url::to(['/site/subcat'])        
    ]
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'productnumber')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'postcodefirsthalf')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'postcodesecondhalf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contactmobile')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'specialrequest')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'frequency')->dropDownList(['Weekly' =>'Weekly','Fortnightly'=>'Fortnightly','Monthly'=>'Monthly','Every two months'=>'Every two months','Not Applicable'=>'Not Applicable'], ['prompt' => 'Select']) ?>

    <?= $form->field($model, 'listprice')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'sellstartdate')->widget(\yii\jui\DatePicker::classname(),[ 'dateFormat' => 'yyyy-MM-dd','inline'=>'true']) ?>
     
    <?php  ///$form->field($model, 'discontinueddate')->widget(\yii\jui\DatePicker::classname(),[ 'dateFormat' => 'yyyy-MM-dd','inline'=>'true',]) ?>
    
    <?= $form->field($model, 'isactive')->checkbox() ?>
    
    <?= $form->field($model, 'jobcode')->dropDownList(ArrayHelper::map(Salesorderheader::find()->orderBy('status')->asArray()->all(),'status','status'), ['prompt' => 'Select']) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

