<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Productsubcategory */

$this->title = 'Create Street';
$this->params['breadcrumbs'][] = ['label' => 'Street', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productsubcategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
