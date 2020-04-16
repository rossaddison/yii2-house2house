<?php

use \kartik\icons\Icon;
use yii\helpers\Url;

$this->title = Yii::t('app', 'mySql Backup');
?>
<h3>
    <?= Yii::t('app', 'mySql Backup') ?>
</h3>

<?php if ($minPhpVersion === false): ?>
    <div class="alert alert-danger">
        <strong><?= Yii::t('app', 'Your PHP version {0} is lower then required 5.5+', [PHP_VERSION]) ?></strong>
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

<div class="backuper-controls">
    <div class="alert alert-info">
        <strong><?= Yii::t('app', 'Your PHP version '.phpversion().' is suitable ie. > 5.5', [PHP_VERSION]) ?></strong>
    </div>
    <div class="alert alert-info">
    <p>
            <?= Yii::t('app', 'Your document root is correctly set to: ') ?>
            <code><?= realpath(Yii::getAlias('@webroot')) ?></code>.
    </p>
    </div>
    <a href="<?= Url::toRoute(['dump']) ?>" class="btn btn-primary btn-lg pull-right ladda-button" data-style="expand-left">
        <?= Yii::t('app', 'Next') ?>
        <?= Icon::show('arrow-right') ?>
    </a>
</div>
