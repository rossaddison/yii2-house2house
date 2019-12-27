<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\subscription\models\paypalagreement */

$this->title = 'Create Paypalagreement';
$this->params['breadcrumbs'][] = ['label' => 'Paypalagreements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paypalagreement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
