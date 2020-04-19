 <?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

$this->title = 'View Costs to Include: ID: ' . $model->cost_detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Daily Costs:', 'url' => ['costheader/index']];
$this->params['breadcrumbs'][] = ['label' => $model->costHeader->cost_date];
$this->params['breadcrumbs'][] = ['label' => 'Costs to Include:', 'url' => ['index','id'=>$model->cost_header_id]];
$this->params['breadcrumbs'][] = ['label' => $model->costcategory->name];
$this->params['breadcrumbs'][] = ['label' => $model->costsubcategory->name];
$this->params['breadcrumbs'][] = ['label' => $model->cost->costnumber];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="costdetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cost_detail_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cost_detail_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete id? '. $model->cost_detail_id,
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Paid in Full', ['pay','id' => $model->cost_detail_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Unpaid in Full', ['unpay','id' => $model->cost_detail_id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Back', Url::previous(), ['class' => 'btn btn-success']) ?>
        <?php // Html::a('Back', ['index', 'id' => $model->sales_order_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nextcost_date',
            ['attribute'=>'cost_id.description','header'=>'Description','value'=>$model->cost->description],
            ['attribute'=>'cost_id.costnumber','header'=>'Costnumber','value'=>$model->cost->costnumber],
            ['attribute'=>'costcategory_id','header'=>'Cost Code','value'=>$model->costcategory->name],
            ['attribute'=>'costsubcategory_id','header'=>'Cost Subcode','value'=>$model->costsubcategory->name],
            ['attribute'=>'paymenttype','header'=>'Payment Type','value'=>$model->paymenttype],
            
            'unit_price',
            'paid',
            'modified_date',
        ],
    ]) ?>
    
</div>
