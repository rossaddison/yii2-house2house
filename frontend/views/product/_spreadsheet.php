<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\DepDrop;
use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use frontend\models\Productcategory;
use frontend\models\Productsubcategory;
use frontend\models\Product;
use frontend\models\Importhouses;

$this->title = 'Houses Import';
$this->params['breadcrumbs'][] = ['label' => 'Houses', 'url' => ['product/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-import">

    <?php $form = ActiveForm::begin([
        'action' => ['spreadsheet'],
        'method' => 'get',
    ]); ?>
    
    <?= $form->field($model, 'productcategory_id')->dropDownList(ArrayHelper::map(Productcategory::find()->orderBy('name')->all(),'id','name'),['id'=>'cat_id','prompt'=>'Select...']) ?>

    <?= $form->field($model, 'productsubcategory_id')->widget(DepDrop::classname(), [
        'options'=>['id'=>'subcat_id'],
        'pluginOptions'=>[
        'depends'=>['cat_id'],   
        'loading'=>true,  
        'placeholder'=>'Select...',
        'url'=>Url::to(['/site/subcat'])        
    ]
    ]); ?>
    
    <?= Html::tag('label','Select your filename that you uploaded under import houses:  ') ?>
    <br>
    <?php //$form->field($model, 'importfile')->dropDownList('imp','',ArrayHelper::map(Importhouses::find()->orderBy('importfile_source_filename')->all(),'id','importfile_source_filename','importfile_web_filename') ,['prompt' => 'Select...','class'=>'btn btn-success','id'=>'w989'])
        ?> 
    <br>
    <?= $form->field($model, 'importfile')->widget(FileInput::classname(), [
    'options' => ['accept' => 'file/*'],
]);
?>
    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'value'=>'spreadsheet_value']) ?>
    </div>


</div>
