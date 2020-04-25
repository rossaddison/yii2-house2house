<?php
use yii\helpers\Html;
$this->title = Yii::t('app','Create Gocardlessinvoice');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Gocardlessinvoices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gocardlessinvoice-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
