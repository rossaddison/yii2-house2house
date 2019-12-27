<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Sessiondetail */

$this->title = 'Update Sessiondetail: ' . $model->session_detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Sessiondetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->session_detail_id, 'url' => ['view', 'id' => $model->session_detail_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sessiondetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
