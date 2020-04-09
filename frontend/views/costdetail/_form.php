<?php

use yii\jui\Datepicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use kartik\depdrop\DepDrop;
use kartik\widgets\DepDrop;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use frontend\models\Costcategory;
use frontend\models\Costsubcategory;
use frontend\models\Cost;
use frontend\models\Carousal;
use yii\helpers\Url;
?>

<div class="costdetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cost_header_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'nextcost_date')->widget(\yii\jui\DatePicker::classname(),[ 'dateFormat' => 'yyyy-MM-dd','inline'=>'true',]) ?> 

    <?php //= $form->field($model, 'costcategory_id')->dropDownList(ArrayHelper::map(Costcategory::find()->all(),'id','name'),['id'=>'cat_id']) ?>
     
    <?php //= $form->field($model, 'costsubcategory_id')->widget(DepDrop::classname(), [
        //'options'=>['id'=>'subcat_id'],
        //'pluginOptions'=>[
        //'depends'=>['cat_id'],   
        //'loading'=>true,  
        //'placeholder'=>'Select...',
        // 'url'=>Url::to(['/cost/subcatcost'])        
     // ]
     // ]); 
    ?>
    
    <?php //= $form->field($model, 'costsubcategory_id')->hiddenInput()->label(false) ?>
    
    <?php //= $form->field($model, 'cost_id')->widget(DepDrop::classname(),[
        //'options'=>['id'=>'cost_id'],
        //'pluginOptions'=>[
        //'depends'=>['cat_id', 'subcat_id'],
        //'nameParam'=>'costnumber',
        ///'loading'=>true,
        //'placeholder'=>'Select...',
        //'url'=>Url::to(['/cost/cos']),
        //'initialize'=>true,

    //]
    //]); 
    ?>
    
    <?= $form->field($model, 'cost_id')->hiddenInput()->label(false) ?>
    
    <?= $form->field($model, 'carousal_id')->dropDownList(ArrayHelper::map(Carousal::find()->all(),'id','image_source_filename'),['prompt' => '']) ?>
    
    <?= $form->field($model, 'order_qty')->hiddenInput()->label(false) ?>
    
    <?= $form->field($model, 'unit_price')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'line_total')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'paid')->textInput() ?>
    
       <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
