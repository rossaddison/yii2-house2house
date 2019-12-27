<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Legal */

$this->title = 'Create Legal';
$this->params['breadcrumbs'][] = ['label' => 'Legals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="legal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
