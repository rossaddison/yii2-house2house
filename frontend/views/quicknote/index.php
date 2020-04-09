<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\QuicknoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quicknotes';
$this->params['breadcrumbs'][] = ['label' => 'Quicknotes', 'url' => ['quicknote/index']];
$this->params['breadcrumbs'][] = $this->title;
$viewMsg = 'View';
$updateMsg = 'Update';
?>
<div class="quicknote-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Quicknote', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['style' => 'font-size:18px;'],
        'columns' => [
            'id',
            ['class' => 'kartik\grid\ActionColumn',
            'dropdown' => false,
            'header'=>'View',
            'vAlign'=>'middle',
            'viewOptions'=>['title'=>$viewMsg, 'data-toggle'=>'tooltip'],
            'template'=> '{view}',
           ],
           ['class' => 'kartik\grid\ActionColumn',
            'dropdown' => false,
            'header'=>'Update',
            'vAlign'=>'middle',
            'updateOptions'=>['title'=>$updateMsg, 'data-toggle'=>'tooltip'],
            'template'=> '{update}',
           ],
           [ 
                'class' => '\kartik\grid\EditableColumn',
                'attribute' =>'note',
                'hAlign' => 'left', 
                'vAlign' => 'middle',
                'width' => '95%',
                'refreshGrid'=>true,
                'format'=> 'raw',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => [
                              'class' => 'kv-sticky-column',
                              'style'=>'max-width: 200px; overflow: auto; word-wrap: break-word;'
                ],
                'readonly' => true,
            ], 
            'modified_at',
        ],
    ]); ?>


</div>
