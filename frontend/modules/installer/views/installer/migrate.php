<?php

use \kartik\icons\Icon;
use yii\helpers\Url;
use \kartik\form\ActiveForm;
use yii\helpers\Html;
/** @var \app\modules\installer\models\MigrateModel $model */
/** @var \yii\web\View $this */
/** @var \Symfony\Component\Process\Process $process */
/** @var boolean $check */
/** @var string $commandToRun */

$this->title = Yii::t('app', 'Installer - Database migration');
$this->params['breadcrumbs'][] = ['label' => 'Step Three', 'url' => ['migrate']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>
    <?= $this->title ?>
</h1>

<?= \frontend\modules\installer\widgets\Alert::widget() ?>
<?php
$form = ActiveForm::begin([
    'type' => ActiveForm::TYPE_HORIZONTAL,
    'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_LARGE]
]);
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>
            <?= Yii::t('app', 'Migration settings:') ?>
            <?php // $form->field($model, 'dbCode')->hiddenInput() ?>

<h4><?= Yii::t('app', 'Command:') ?></h4>
<pre>
<?=  
    $commandToRun;
?>
</pre>
<?php if ($process->getExitCode()!==null): ?>
<h4><?= Yii::t('app', 'Migration command output') ?></h4>
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


<div class="installer-controls">
    <a href="<?= Url::to(['language']) ?>" class="btn btn-info btn-lg pull-left ladda-button" data-style="expand-left">
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
  ////  var_dump(Yii::$app->db);
  ///  var_dump(Yii::$app->gmrr004);
 /////  echo Yii::getAlias('@webroot');
  ////  echo Yii::getAlias('@frontend');
  ////  var_dump($process);
?>
<?php
ActiveForm::end();
$js = <<<JS
Ladda.bind( 'input[type=submit]' );
Ladda.bind( '.btn' );
JS;
$this->registerJs($js);
?>