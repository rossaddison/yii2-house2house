<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paypalagreements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paypalagreement-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Paypalagreement', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'name',
            'agreement_id',
            'agreementplan_id',
            //'quantity',
            //'end_at',
            //'created_at',
            //'executed_at',
            //'updated_at',
            //'terminated_at',
            //'reactivated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
