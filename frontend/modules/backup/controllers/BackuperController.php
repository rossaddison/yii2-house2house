<?php

namespace frontend\modules\backup\controllers;

use frontend\modules\backup\components\BackupHelper;
use frontend\modules\backup\components\SessionHelper;
use frontend\modules\backup\models\FinalStep;
use frontend\modules\backup\models\BackupModel;
use Yii;
use yii\base\DynamicModel;
use yii\web\Controller;


class BackuperController extends Controller
{
    // set simple layout
    // public $layout = 'backuper';
    private $db = null;
    /**
     * @inheritdoc
     */

    public function actionIndex()
    {
        $minPhpVersion = version_compare(PHP_VERSION, '5.5.0') >= 0;
        $docRoot = strpos(Yii::$app->request->url, '/backuper') === 0;

        return $this->render(
            'index',
            [
                'minPhpVersion' => $minPhpVersion,
                'docRoot' => $docRoot,
            ]
        );
    }
    
    public function actionBackup()
    {
        $model = new BackupModel();
        $sessionHelper = Yii::$app->get('sessionHelper');
        $model->ignore_time_limit_warning = $sessionHelper->get('ignore_time_limit_warning', false);
        if ($model->load(Yii::$app->request->post())) {
            $model->validate();
            foreach ($model->getAttributes() as $key => $value) {
                $sessionHelper->set($key, $value);
            }
        }
        
        $helper = Yii::createObject([
            'class' => BackupHelper::className(),
        ]);
        
        $process = $helper->applyAppBackupCron();

        $commandToRun = $process->getCommandLine();

        $check = $this->checkTime($model->ignore_time_limit_warning);
        if (Yii::$app->request->isPost) {
            if ($check) {
                $process->run();
                if ($process->getExitCode() === 0) {
                        Yii::$app->session->setFlash('info', Yii::t('app', 'Backup completed successfully'));  
                        return $this->redirect(['final']);
                }
            }
        }
        
        return $this->render(
            'backup',
            [
                'check' => $check,
                'commandToRun' => $commandToRun,
                'process' => $process,
                'model' => $model,
            ]
        );
    }
    
    public function actionFinal()
    {
        $model = new FinalStep();
        $model->serverName = Yii::$app->request->serverName;
        
        if (extension_loaded('memcached') || extension_loaded('memcache')) {
            $model->cacheClass = 'yii\caching\MemCache';
            if (extension_loaded('memcached')) {
                $model->useMemcached = true;
            }
        }

        if (Yii::$app->request->serverPort !== 80) {
            $model->serverPort = Yii::$app->request->serverPort;
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

                return $this->redirect(['complete']);
        }
      
         $cacheClasses = [
            'yii\caching\FileCache',
            'yii\caching\MemCache',
            'yii\caching\XCache',
            'yii\caching\ZendDataCache',
            'yii\caching\ApcCache',
        ];

        return $this->render(
            'final',
            [
                'model' => $model,
                'cacheClasses' => $cacheClasses,
            ]
        );
    }

    public function actionComplete()
    {
        return $this->render(
            'complete'
        );
    }
    
    private function checkTime($ignoreTimeLimit=false)
    {
        if (BackupHelper::unlimitTime() === false && $ignoreTimeLimit === false) {
            Yii::$app->session->setFlash('warning', Yii::t('app', 'Can\'t set time limit to 0. Some operations may not complete.'));
            return false;
        } else {
            return true;
        }
    }
}
