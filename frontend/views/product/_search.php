<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\ArrayHelper;
use frontend\models\Productcategory;
use frontend\models\Productsubcategory;
use frontend\models\Product;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //= $form->field($model, 'id') ?>

    
    
    <?= $form->field($model, 'productcategory_id')->dropDownList(ArrayHelper::map(Productcategory::find()->orderBy('name')->all(),'id','name'),['id'=>'cat_id','prompt'=>'Select...']) ?>

    <?= $form->field($model, 'productsubcategory_id')->widget(DepDrop::classname(), [
        'options'=>['id'=>'subcat_id'],
        'pluginOptions'=>[
        //'depends'=>[Html::getInputId($model, 'productcategory_id')], 
        'depends'=>['cat_id'],   
        'loading'=>true,  
        'placeholder'=>'Select...',
        'url'=>Url::to(['/product/subcat'])        
    ]
    ]); ?>
    
    <?= $form->field($model, 'id')->widget(DepDrop::classname(),[
        'options'=>['id'=>'id'],
        'pluginOptions'=>[
        //'depends'=>[Html::getInputId($model, 'productcategory_id'), Html::getInputId($model, 'productsubcategory_id')],
        'depends'=>['cat_id', 'subcat_id'],
        'loading'=>true,
        'placeholder'=>'Select...',
        'url'=>Url::to(['/site/produc']),
        'initialize'=>true,

    ]
    ]); ?>
    
    <?= $form->field($model, 'name') ?>
    
     <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'contactmobile') ?>

    <?php // echo $form->field($model, 'specialrequest') ?>

    <?php // echo $form->field($model, 'listprice') ?>

    <?php // echo $form->field($model, 'productsubcategory_id') ?>

    <?php // echo $form->field($model, 'sellstartdate') ?>

    <?php // echo $form->field($model, 'sellenddate') ?>

    <?php // echo $form->field($model, 'discontinueddate') ?>

    <?php // echo $form->field($model, 'modifieddate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset', ['index'], ['class' => 'btn btn-default']) ?>
          <?php // Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
