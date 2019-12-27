<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SessiondetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sessiondetails';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="sessiondetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn',
              'template'=> '{view}',
            ],
            ['class' => 'yii\grid\SerialColumn'],
            'session_id',
            'session_detail_id',
            'redirect_flow_id',
            'db',
            'product_id',
            'user_id',
            
        ],
    ]); ?>


</div>
