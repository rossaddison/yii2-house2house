<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Salesorderdetail */

$this->title = 'Update Houses to Clean: ID: ' . $model->sales_order_detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Daily Cleans:', 'url' => ['salesorderheader/index','id'=>$model->sales_order_id]];
$this->params['breadcrumbs'][] = ['label' => $model->salesOrder->clean_date];
$this->params['breadcrumbs'][] = ['label' => 'Houses to Clean:', 'url' => ['index','id'=>$model->sales_order_id]];
$this->params['breadcrumbs'][] = ['label' => $model->productcategory->name. " in ".$model->productcategory->description];
$this->params['breadcrumbs'][] = ['label' => $model->productsubcategory->name];
$this->params['breadcrumbs'][] = ['label' => $model->product->productnumber];
//$this->params['breadcrumbs'][] = ['label' => $model->sales_order_detail_id, 'url' => ['view', 'id' => $model->sales_order_detail_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="salesorderdetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
