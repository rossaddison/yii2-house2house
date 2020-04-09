<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Carousal */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Carousals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carousal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-lg']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-lg',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'image_web_filename',
            'image_source_filename',
            'content_alt',
            'content_title',
            'content_caption',
            'fontcolor',
        ],
    ]) ?>
    
    <?php
            //echo "basepath ".  Yii::$app->params['uploadPath'] = Yii::$app->basePath .'\web\images';
            //echo "savepath - path and filename  ".$path = Yii::$app->params['uploadPath'] ."/". $model->image_web_filename;
            if ($model->image_web_filename!='') {
               if (Yii::$app->user->identity->attributes['name'] === 'demo')
               {    
                    echo '<br /><p><img src="'.Url::to('@web/images/demo/'.Yii::$app->session['demo_image_timestamp_directory']."/".$model->image_web_filename.'" width=250px" height = "auto"></p>', true);
               } else
               {
                    echo '<br /><p><img src="'.Url::to('@web/images/'.$model->image_web_filename.'" width=250px" height = "auto"></p>', true);
               }
            }  
    ?>
</div>
