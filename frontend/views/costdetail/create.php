<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Salesorderdetail */

$this->title = 'Create House to Clean';
$this->params['breadcrumbs'][] = ['label' => 'Houses to clean today', 'url' => ['salesorderdetail/index','id'=>Yii::$app->session['sales_order_id']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salesorderdetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
