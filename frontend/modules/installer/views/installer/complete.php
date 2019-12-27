<?php

use yii\helpers\Html;
$this->params['breadcrumbs'][] = ['label' => 'Step Four', 'url' => ['complete']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>
    <?= Yii::t('app', 'Installation complete') ?>
</h1>

<div class="text-center">
    <?= Yii::t('app', 'Home') ?>
</div>

<div class="text-center">
    <?= Html::a(
        Yii::t('app', 'Open site frontend'),
        '/',
        [
            'class' => 'btn btn-success',
        ]
    )?>
    
</div>