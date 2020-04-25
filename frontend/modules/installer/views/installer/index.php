<?php
//this installation module has been adapted from dotplant2's installation module.
use \kartik\icons\Icon;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Installer');
$permissions_ok = true;
$this->params['breadcrumbs'][] = ['label' => 'Step One', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>
    <?= Yii::t('app', 'Installation of Works Database tables to either db1 to db10.') ?>
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
            <code><?php echo realpath(Yii::getAlias('@app/web/')) ?></code>.
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
<?php if ($databasehandler === 'db'): ?>
    <div class="alert alert-danger">
        <strong><?= Yii::t('app', 'You are currently working from the admin database and will NOT be able to do a Works migration since these tables are already set up. The console migration command eg. migrate-db1 picks up the current database that you are working from which is db and not in the range of db1 to db10. As admin you will have to change your ...Access db...permission to ... Access db1 ... in order to perform this migration.', [PHP_VERSION]) ?></strong>
    </div>
<?php endif; ?>

<div class="installer-controls">
    <a href="<?= Url::toRoute(['language']) ?>" class="btn btn-primary btn-lg pull-right ladda-button" data-style="expand-left">
        <?= Yii::t('app', 'Next') ?>
        <?= Icon::show('arrow-right') ?>
    </a>
</div>

