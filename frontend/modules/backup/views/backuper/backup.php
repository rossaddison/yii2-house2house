<?php

use \kartik\icons\Icon;
use yii\helpers\Url;
use \kartik\form\ActiveForm;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Backuper - Backing up databases');

?>
<h1>
    <?= $this->title ?>
</h1>

<?= \frontend\modules\backup\widgets\Alert::widget() ?>
<?php
$form = ActiveForm::begin([
    'type' => ActiveForm::TYPE_HORIZONTAL,
    'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_LARGE]
]);
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>
            <?= Yii::t('app', 'Backup settings:') ?>
        </h2>
        <?= $form->field($model, 'ignore_time_limit_warning')->checkbox() ?>
        <?= $form->field($model, 'manual_backup_run')->checkbox() ?>

<h4><?= Yii::t('app', 'Command for manual run: Compiled with BackupHelper and Yii2-backup/src/Module/dumpDatabase path for windows (adjust for Linux)') ?></h4>
     
<pre>
<?= 
    $commandToRun;
?>
</pre>

<?php if ($process->getExitCode()!==null): ?>
<h4><?= Yii::t('app', 'Backup command output') ?></h4>
<div>
    <strong><?= Yii::t('app', 'Exit code:') ?></strong> <?= $process->getExitCode() ?>
</div>
<div>
    <strong><?= Yii::t('app', 'STD err:') ?></strong>
    <?= '<pre>'.$process->getErrorOutput().'</pre>' ?>
</div>
<div>
    <strong><?= Yii::t('app', 'STD out:') ?></strong>
    <?= '<pre>'.$process->getOutput().'</pre>' ?>
</div>
<?php endif; ?>

    </div>
</div>


<div class="backuper-controls">
    <a href="<?= Url::to(['index']) ?>" class="btn btn-info btn-lg pull-left ladda-button" data-style="expand-left">
        <?= Icon::show('arrow-left') ?>
        <?= Yii::t('app', 'Back') ?>
    </a>

    <?=
    Html::submitButton(
        Yii::t('app', 'Next') .' ' . Icon::show('arrow-right'),
        [
            'class' => 'btn btn-primary btn-lg pull-right ladda-button',
            'data-style' => 'expand-left',
        ]
    )
    ?>

</div>

<?php
ActiveForm::end();
$js = <<<JS
Ladda.bind( 'input[type=submit]' );
Ladda.bind( '.btn' );
JS;
$this->registerJs($js);
?>
