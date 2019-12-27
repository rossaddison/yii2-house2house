<?php

use yii\jui\Datepicker;


use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use kartik\depdrop\DepDrop;
use kartik\widgets\DepDrop;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use frontend\models\Productcategory;
use frontend\models\Productsubcategory;
use frontend\models\Product;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\models\Salesorderdetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salesorderdetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sales_order_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'nextclean_date')->widget(\yii\jui\DatePicker::classname(),[ 'dateFormat' => 'yyyy-MM-dd','inline'=>'true',]) ?> 
    
    <?= $form->field($model, 'cleaned')->dropDownList([ 'Cleaned' => 'Cleaned', 'Missed' => 'Missed','Next Month Please' => 'Next Month Please','Fronts Done Only' => 'Fronts Done Only','Backs Done Only' => 'Backs Done Only' ], ['prompt' => '']) ?>

    <?php // $form->field($model, 'productcategory_id')->dropDownList(ArrayHelper::map(Productcategory::find()->all(),'id','name'),['id'=>'cat_id']) ?>
    
    <?= $form->field($model, 'productcategory_id')->hiddenInput()->label(false) ?>
     
    <?php // $form->field($model, 'productsubcategory_id')->widget(DepDrop::classname(), [
        //'options'=>['id'=>'subcat_id'],
        //'pluginOptions'=>[
        //'depends'=>['cat_id'],   
        //'loading'=>true,  
        //'placeholder'=>'Select...',
        //'url'=>Url::to(['/site/subcat'])        
    //]
    //]); 
    ?>
    
    <?= $form->field($model, 'productsubcategory_id')->hiddenInput()->label(false) ?>
    
    <?php // $form->field($model, 'product_id')->widget(DepDrop::classname(),[
        //'options'=>['id'=>'prod_id'],
        //'pluginOptions'=>[
        //'depends'=>['cat_id', 'subcat_id'],
        //'nameParam'=>'productnumber',
        //'loading'=>true,
        //'placeholder'=>'Select...',
        //'url'=>Url::to(['/site/produc']),
        //'initialize'=>true,

    //]
    //]); 
    ?>
    
    <?= $form->field($model, 'product_id')->hiddenInput()->label(false) ?>
    
    <?php // = $form->field($model, 'product_id')->textInput() ?>
    
    <?= $form->field($model, 'order_qty')->hiddenInput()->label(false) ?>
    
    <?= $form->field($model, 'unit_price')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'line_total')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'paid')->textInput() ?>
    
       <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
