<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Productsubcategory */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Street', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productsubcategory-view">

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
            ['attribute'=>'productcategory_id','header'=>'Postcode','value'=>$model->productcategory->name],
            'name',
            'lat_start',
            'lng_start',
            'lat_finish',
            'lng_finish',
            'directions_to_next_productsubcategory',
            'sort_order',
            'isactive',
            'modifieddate'            
        ],
    ]) ?>

</div>
