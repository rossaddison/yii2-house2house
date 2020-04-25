<?php
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = 'Gocardlessinvoices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gocardlessinvoice-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Gocardlessinvoice', ['create'], ['class' => 'btn btn-success']) ?>
    </p>   <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'product_id',
            'payment_id',
            'date',
            'amount',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
