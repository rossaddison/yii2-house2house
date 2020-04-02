<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Messagelog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Messagelog', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messagelog-view">

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
            'message',
            'date',
            'phoneto',
            'salesorderdetail_id',
            'product_id',
        ],
    ]) ?>

</div>