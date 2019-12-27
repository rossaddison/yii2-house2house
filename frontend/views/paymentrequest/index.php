<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PaymentrequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paymentrequests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paymentrequest-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Paymentrequest', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'sales_order_detail_id',
            'gc_payment_request_id',
            'status',
            'modified_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
