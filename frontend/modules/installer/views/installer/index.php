<?php

use \kartik\icons\Icon;
use yii\helpers\Url;
use yii\bootstrap4\Breadcrumbs;
/** @var \yii\web\View $this */
/** @var array $file_permissions */
/** @var bool $minPhpVersion True if PHP version is ok */
/** @var bool $docRoot True if document root is ok */

$this->title = Yii::t('app', 'Installer');
$permissions_ok = true;
$this->params['breadcrumbs'][] = ['label' => 'Step One', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>
    <?= Yii::t('app', 'Installation') ?>
</h1>

<?php if ($minPhpVersion === false): ?>
    <div class="alert alert-danger">
        <strong><?= Yii::t('app', 'Your PHP version {0} is lower than the required 5.5+', [PHP_VERSION]) ?></strong>
    </div>
<?php endif; ?>

<?php if ($minPhpVersion === true): ?>
    <div class="alert alert-info">
        <strong><?= Yii::t('app', 'Your PHP version {0} is higher than the required 5.5+', [PHP_VERSION]) ?></strong>
    </div>
<?php endif; ?>

<?php if ($docRoot === false): ?>
    <div class="alert alert-danger">
        <strong><?= Yii::t('app', 'Your DocumentRoot is not set to application/web/'.Yii::$app->request->url) ?></strong>
        <p>
            <?= Yii::t('app', 'You MUST set your DocumentRoot setting in your web server config to') ?>
            <code><?= realpath(Yii::getAlias('@app/web/')) ?></code>.
        </p>
    </div>
<?php endif; ?>

<?php if ($docRoot === true): ?>
    <div class="alert alert-info">
        <p>
            <strong><?= Yii::t('app', 'You have set your document root therefore we can continue.') ?></strong>
        </p>
    </div>
<?php endif; ?>

<div class="installer-controls">
    <a href="<?= Url::toRoute(['language']) ?>" class="btn btn-primary btn-lg pull-right ladda-button" data-style="expand-left">
        <?= Yii::t('app', 'Next') ?>
        <?= Icon::show('arrow-right') ?>
    </a>
</div>

<?php
   //echo "Docroot is ".$docRoot;
   //echo "<br>";
   //echo "Yii request url ".Yii::$app->request->url;
   //echo "<br>";
   //echo "strpos " . strpos(Yii::$app->request->url, '/installer');
   //echo "alias @migrations" .Yii::getAlias('@migrations');
 ?>
