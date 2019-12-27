<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Sessiondetail */

$this->title = $model->session_detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Session', 'url' => ['session/index']];
$this->params['breadcrumbs'][] = ['label' => 'Sessiondetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sessiondetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->session_detail_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->session_detail_id], [
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
            'session_detail_id',
            'session_id',
            'redirect_flow_id',
            'db',
            'product_id',
            'user_id'
        ],
    ]) ?>

</div>
