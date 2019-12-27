<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use frontend\models\Costcategory;
use frontend\models\Cost;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cost-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //= $form->field($model, 'id') ?>

    
    
    <?= $form->field($model, 'costcategory_id')->dropDownList(ArrayHelper::map(Costcategory::find()->all(),'id','name'),['id'=>'cat_id','prompt'=>'Select...']) ?>

    <?= $form->field($model, 'costsubcategory_id')->widget(DepDrop::classname(), [
        'options'=>['id'=>'subcat_id'],
        'pluginOptions'=>[
        //'depends'=>[Html::getInputId($model, 'costcategory_id')], 
        'depends'=>['cat_id'],   
        'loading'=>true,  
        'placeholder'=>'Select...',
        'url'=>Url::to(['/site/subcatcost'])]]); ?>
    
    <?= $form->field($model, 'id')->widget(DepDrop::classname(),[
        'options'=>['id'=>'id'],
        'pluginOptions'=>[
        //'depends'=>[Html::getInputId($model, 'costcategory_id'), Html::getInputId($model, 'costsubcategory_id')],
        'depends'=>['cat_id', 'subcat_id'],
        'loading'=>true,
        'placeholder'=>'Select...',
        'url'=>Url::to(['/site/cos']),
        'initialize'=>true,

    ]
    ]); ?>
    
    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'specialrequest') ?>

    <?php // echo $form->field($model, 'listprice') ?>

    <?php // echo $form->field($model, 'costsubcategory_id') ?>

    <?php // echo $form->field($model, 'coststartdate') ?>

    <?php // echo $form->field($model, 'costenddate') ?>

    <?php // echo $form->field($model, 'discontinueddate') ?>

    <?php // echo $form->field($model, 'modifieddate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset', ['index'], ['class' => 'btn btn-default']) ?>
          <?php // Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
