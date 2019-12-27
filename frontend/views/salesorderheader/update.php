<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Salesorderheader */

$this->title = 'Update Daily Clean: ' . $model->sales_order_id;
$this->params['breadcrumbs'][] = ['label' => 'Daily Cleans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sales_order_id, 'url' => ['view', 'id' => $model->sales_order_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="salesorderheader-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
