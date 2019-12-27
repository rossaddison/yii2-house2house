<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Productcategory;
/* @var $this yii\web\View */
/* @var $model frontend\models\ProductsubcategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productsubcategory-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php //= $form->field($model, 'id') ?>

    <?= $form->field($model, 'productcategory_id')->dropDownList(ArrayHelper::map(Productcategory::find()->all(),'id','name'),['prompt'=>'Postcodes']) ?>
    <?= $form->field($model, 'name') ?>

    <?php //= $form->field($model, 'modifieddate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
