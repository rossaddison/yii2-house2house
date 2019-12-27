<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Sessiondetail */

$this->title = 'Create Sessiondetail';
$this->params['breadcrumbs'][] = ['label' => 'Sessiondetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sessiondetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
