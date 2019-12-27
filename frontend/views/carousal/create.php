<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Carousal */

$this->title = 'Create Carousal';
$this->params['breadcrumbs'][] = ['label' => 'Carousals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carousal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
