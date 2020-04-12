<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Maintenance';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-maintenance">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>This site is under maintenance. You may modify the following file to customize its content:</p>

    <code><?= __FILE__ ?></code>
</div>
