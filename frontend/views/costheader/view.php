<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->cost_header_id;
$this->params['breadcrumbs'][] = ['label' => 'Daily Costs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="costheader-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cost_header_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cost_header_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

   <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        'cost_header_id',
        'status',
        'statusfile',
        ['attribute'=>'employee_id','header'=>'Employee','value'=>$model->employee->title],
        'cost_date',
        //'sub_total',
        //'tax_amt',
        //'total_due',
        'modified_date',
        ],
    ]) ?>
    
    
    
  


</div>
