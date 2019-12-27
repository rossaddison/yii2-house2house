<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Import Houses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="importhouses-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
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
            'importfile_web_filename',
            'importfile_source_filename',
        ],
    ]) ?>
    
    <?php
            //echo "basepath ".  Yii::$app->params['uploadPath'] = Yii::$app->basePath .'\web\images';
            //echo "savepath - path and filename  ".$path = Yii::$app->params['uploadPath'] ."/". $model->image_web_filename;
            if ($model->importfile_web_filename!='') {
              echo '<br /><p><img src="'.Url::to('@web/importfile/'.$model->importfile_web_filename.'" width=250px" height = "auto"></p>', true);
            }  
    ?>
</div>
