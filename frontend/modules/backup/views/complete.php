<?php

use yii\helpers\Html;

?>
<h1>
    <?= Yii::t('app', 'Backup complete') ?>
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