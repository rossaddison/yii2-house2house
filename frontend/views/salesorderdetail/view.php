 <?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;
use yii\helpers\Url;
use frontend\models\Salesorderheader;


/* @var $this yii\web\View */
/* @var $model frontend\models\Salesorderdetail */

///$this->title = $model->sales_order_detail_id;
//$this->params['breadcrumbs'][] = ['label' => 'Houses to clean', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;

$this->title = 'View House to Clean: ID: ' . $model->sales_order_detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Daily Cleans:', 'url' => ['salesorderheader/index']];
$this->params['breadcrumbs'][] = ['label' => $model->salesOrder->clean_date];
$this->params['breadcrumbs'][] = ['label' => 'Houses to Clean: ID: '.$model->sales_order_id, 'url' => ['index','id'=>$model->sales_order_id]];
$this->params['breadcrumbs'][] = ['label' => $model->productcategory->name,'url' => ['productcategory/view','id'=>$model->productcategory->id]];
$this->params['breadcrumbs'][] = ['label' => $model->productsubcategory->name,'url' => ['productsubcategory/view','id'=>$model->productsubcategory->id]];
$this->params['breadcrumbs'][] = ['label' => $model->product->productnumber,'url' => ['product/view','id'=>$model->product->id]];
//$this->params['breadcrumbs'][] = ['label' => $model->sales_order_detail_id, 'url' => ['view', 'id' => $model->sales_order_detail_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="salesorderdetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->sales_order_detail_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->sales_order_detail_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete id? '. $model->sales_order_detail_id,
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Paid in Full', ['pay','id' => $model->sales_order_detail_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Unpaid in Full', ['unpay','id' => $model->sales_order_detail_id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Back', Url::previous(), ['class' => 'btn btn-success']) ?>
        <?php // Html::a('Back', ['index', 'id' => $model->sales_order_id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nextclean_date',
            'cleaned',
            ['attribute'=>'instruction_id.code','header'=>'Instruction','value'=>$model->instructioncode->code],
            ['attribute'=>'product_id.homeowner','header'=>'Homeowner','value'=>$model->product->name],
            ['attribute'=>'product_id.productnumber','header'=>'Housenumber','value'=>$model->product->productnumber],
            ['attribute'=>'productcategory_id','header'=>'Postal Code','value'=>$model->productcategory->name],
            ['attribute'=>'productsubcategory_id','header'=>'Street','value'=>$model->productsubcategory->name],
            'unit_price',
            'paid',
            'advance_payment',
            'tip',
            'modified_date',
        ],
    ]) ?>
    
</div>
