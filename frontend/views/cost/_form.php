<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\Costcategory;
use frontend\models\Costsubcategory;
use yii\jui\Datepicker;
use kartik\depdrop\DepDrop;
?>

<div class="cost-form">

    <?php $form = ActiveForm::begin(); ?>
        
    <?= $form->field($model, 'costcategory_id')->dropDownList(ArrayHelper::map(Costcategory::find()->all(),'id','name'),['prompt'=>'Select...','id'=>'cat_id']) ?>

    <?= $form->field($model, 'costsubcategory_id')->widget(DepDrop::classname(), [
        'options'=>['id'=>'subcat_id'],
        'pluginOptions'=>[
        'depends'=>['cat_id'],  
        //'depends'=>[Html::getInputId($model, 'costcategory_id')], 
        //'placeholder'=>'Select...',
        //'placeholder'=>$model,
        'url'=>Url::to(['/site/subcatcost'])        
    ]
    ]); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'costnumber')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'costcodefirsthalf')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'costcodesecondhalf')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'frequency')->dropDownList(['Daily' =>'Daily','Weekly' =>'Weekly','Fortnightly'=>'Fortnightly','Monthly'=>'Monthly','Every two months'=>'Every two months','Other'=>'Other'], ['prompt' => 'Select']) ?>

    <?= $form->field($model, 'listprice')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'coststartdate')->widget(\yii\jui\DatePicker::classname(),[ 'dateFormat' => 'yyyy-MM-dd','inline'=>'true']) ?>
    
    <?php // $form->field($model, 'sellenddate')->widget(\yii\jui\DatePicker::classname(),[ 'dateFormat' => 'yyyy-MM-dd','inline'=>'false','value'=> date('2099-12-31')]) ?>
    
    <?= $form->field($model, 'discontinueddate')->widget(\yii\jui\DatePicker::classname(),[ 'dateFormat' => 'yyyy-MM-dd','inline'=>'true',]) ?>
        
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

