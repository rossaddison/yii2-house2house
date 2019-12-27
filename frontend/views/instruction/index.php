<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instructions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instruction-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Instruction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            'code',
            'code_meaning',
            [
              'class' => 'kartik\grid\DataColumn',
              'attribute'=> 'include',
              'format'=>'boolean',
            ],
            'modified_date',
            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
</div>
