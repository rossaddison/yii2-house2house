<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Importfile */

$this->title = 'Upload Importfile';
$this->params['breadcrumbs'][] = ['label' => 'Import Houses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="importfile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
