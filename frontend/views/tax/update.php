<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tax */

$this->title = 'Update Tax: ' . $model->tax_id;
$this->params['breadcrumbs'][] = ['label' => 'Taxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tax_id, 'url' => ['view', 'id' => $model->tax_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tax-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
