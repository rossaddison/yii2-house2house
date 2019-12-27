<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Messagelog */

$this->title = 'Create Messagelog';
$this->params['breadcrumbs'][] = ['label' => 'Messagelogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messagelog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
