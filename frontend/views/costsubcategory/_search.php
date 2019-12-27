<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Costcategory;
?>

<div class="costsubcategory-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php  ?>

    <?= $form->field($model, 'costcategory_id')->dropDownList(ArrayHelper::map(Costcategory::find()->all(),'id','name'),['prompt'=>'Costcodes']) ?>
    <?= $form->field($model, 'name') ?>

    <?php  ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
