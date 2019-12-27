<?php

use yii\helpers\Html;

$this->title = 'Update Cost: ' . $model->cost_header_id;
$this->params['breadcrumbs'][] = ['label' => 'Cost', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cost_header_id, 'url' => ['view', 'id' => $model->cost_header_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="costheader-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
