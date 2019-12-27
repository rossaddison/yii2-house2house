<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Quicknote */

$this->title = 'Create Quicknote';
$this->params['breadcrumbs'][] = ['label' => 'Quicknotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quicknote-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
