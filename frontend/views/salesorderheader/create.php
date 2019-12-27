<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Salesorderheader */

$this->title = 'Create Daily Clean';
$this->params['breadcrumbs'][] = ['label' => 'Daily Clean', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salesorderheader-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
