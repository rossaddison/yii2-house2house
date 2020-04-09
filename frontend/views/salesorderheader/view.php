<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Salesorderheader */

$this->title = $model->sales_order_id;
$this->params['breadcrumbs'][] = ['label' => 'Daily Cleans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salesorderheader-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->sales_order_id], ['class' => 'btn btn-primary btn-lg']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->sales_order_id], [
            'class' => 'btn btn-danger btn-lg',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

   <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        'sales_order_id',
        'status',
        'statusfile',
        ['attribute'=>'employee_id','header'=>'Employee','value'=>$model->employee->title],
        'clean_date',
        //'sub_total',
        //'tax_amt',
        //'total_due',
        'modified_date',
        ],
    ]) ?>
    
    
    
  


</div>
