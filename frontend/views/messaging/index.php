<?php

use yii\helpers\Html;
use kartik\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Message';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messaging-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Message', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            //'id',
            [
              'header'=>'Message',
              'value'=>function($model, $key, $index,$widget)
              {
                 return strip_tags($model->message);
              }
            ],
            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
</div>
