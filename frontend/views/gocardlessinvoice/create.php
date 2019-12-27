<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Gocardlessinvoice */

$this->title = 'Create Gocardlessinvoice';
$this->params['breadcrumbs'][] = ['label' => 'Gocardlessinvoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gocardlessinvoice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
