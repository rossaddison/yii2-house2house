<?php

use yii\helpers\Html;

$this->title = 'Create Cost Subcategory';
$this->params['breadcrumbs'][] = ['label' => 'Cost Subcategory', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="costsubcategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
