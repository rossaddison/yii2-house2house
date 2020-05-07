<?php
use yii\helpers\Html;
use \kartik\form\ActiveForm;
use \yii\grid\GridView;
use kartik\icons\FontAwesomeAsset;
use Yii;
FontAwesomeAsset::register($this);
$this->title = 'Translator';
$this->params['breadcrumbs'][] = $this->title;
$clean_date = DateTime::createFromFormat("Y-m-d", time());
?>
<?php
$form = ActiveForm::begin([
    'type' => ActiveForm::TYPE_HORIZONTAL,
    'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_LARGE]
]);   
?>
<?= \frontend\modules\backup\widgets\Alert::widget() ?>
<?php if ($curlcertificate === false): ?>
    <div class="alert alert-danger">
        <strong><?= Yii::t('app', 'Your SSL certificate for this version of PHP {0} does not exist under the php directory at ...bin/php/', [PHP_VERSION]) ?></strong>
        <strong><?= Html::a('Download here and insert into bin/php/'.[PHP_VERSION],['url'=>'http://curl.haxx.se/ca/cacert.pem']); ?></strong>
    </div>
<?php endif; ?>
<?php if ($curlcertificate === true): ?>
    <div class="alert alert-success">
        <strong><?= Yii::t('app', 'Your SSL certificate for this version of PHP {0} exists under the php directory  ...bin/php/{0}', [PHP_VERSION]) ?></strong>
   </div>
<?php endif; ?>   
<?php if ($minPhpVersion === false): ?>
    <div class="alert alert-danger">
        <strong><?= Yii::t('app', 'Your PHP version {0} is lower than the required 7.1', [PHP_VERSION]) ?></strong>
    </div>
<?php endif; ?>
<?php if ($minPhpVersion === true): ?>
    <div class="alert alert-success">
        <strong><?= Yii::t('app', 'Your PHP version {0} is higher than the minimum of 7.1', [PHP_VERSION]) ?></strong>
    </div>
<?php endif; ?>
<?php if (!empty($google_credential_file) && file_exists($google_credential_file)): ?>
    <div class="alert alert-success">
        <strong><?= Yii::t('app', 'Your google translate JSON file is set under Settings...Company and exists at '. $google_credential_file); ?></strong>
        <br>
        <strong><?= Yii::t('app', 'GOOGLE APPLICATION CREDENTIALS ' . getenv('GOOGLE_APPLICATION_CREDENTIALS')) ?></strong>
    </div>
<?php endif; ?>
<?php if (empty($google_credential_file)): ?>
    <div class="alert alert-danger">
        <strong><?= Yii::t('app', 'Your Google Credential setting under Settings...Company has not been set.') ?><?= Html::a('Further reading: ',['url'=>'https://cloud.google.com/docs/authentication/production#windows']) ?></strong>
    </div>
<?php endif; ?>

<?php if (!file_exists($google_credential_file) && !empty($google_credential_file)): ?>
    <div class="alert alert-danger">
        <strong><?= Yii::t('app', 'Your Google Credential Filename and path has been set under Settings...Company  but the file itself does not exist. Include quotes and forward slashes.') ?></strong>
    </div>
<?php endif; ?> 

<?= GridView::widget([
 'dataProvider' => $dataProvider,
 'columns' => [
 'id',
 'language', 
 ],
 ]) ?>
</div>


