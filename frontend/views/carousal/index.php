<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Slider/Carousal Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carousal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Carousal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'kartik\grid\ActionColumn'],
            ['class' => 'kartik\grid\SerialColumn'],
            'id',
            [
                     'attribute' => 'Image',
                     'format' => 'raw',
                     'value' => function ($model) {   
                          Yii::$app->params['uploadPath'] = Yii::$app->basePath .'\images';
                          $path = Yii::$app->params['uploadPath'] .'/'. $model->image_web_filename;
                          if ($model->image_web_filename!='')
                          return '<br /><p><img src="'.Url::to('@web/images/'.$model->image_web_filename.'" width=50px" height = "auto"></p>', true); else return 'no image';
                     },
             ],
            'image_source_filename',
            'image_web_filename',
            'content_alt',
            'content_title',
            'content_caption',
            'fontcolor',

            
        ],
    ]); ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</div>
