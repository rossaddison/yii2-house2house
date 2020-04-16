<?php

namespace frontend\modules\backup\controllers;

use frontend\modules\backup\components\BackupHelper;
use frontend\modules\backup\components\SessionHelper;
use frontend\modules\backup\models\FinalStep;
use frontend\modules\backup\models\BackupModel;
use frontend\modules\backup\models\DumpModel;
use Yii;
use yii\base\DynamicModel;
use yii\web\Controller;
use Ifsnop\Mysqldump as IMysqldump;

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
    
    public function actionDump()
    {
           $model = new DumpModel(); 
           try {
                $database_handle = $model->getDatabasehandle();
                $database = Yii::$app->$database_handle->createCommand("SELECT DATABASE()")->queryScalar();
                $dumpit = new IMysqldump\Mysqldump('mysql:host=localhost;dbname='.$database.'', Yii::$app->$database_handle->username, Yii::$app->$database_handle->password);
                $basepath = \Yii::getAlias('@webroot');
                $timestamp = time();
                $model->save_from_path = "/mysqlbackup/".$timestamp."_".Yii::$app->security->generateRandomString()."_".$database_handle;
                $model->path = $basepath .  $model->save_from_path;
                //$path = $basepath . "/mysqlbackup/".$database_handle;
                mkdir($model->path,0777); 
                if (is_dir($model->path)){$model->created_directory_successfully = true;}
                else {$model->created_directory_successfully = false;}
	        $model->path_and_filename = $basepath . $model->save_from_path."/".$timestamp.".sql";
                $model->save_from_path_and_filename = $model->save_from_path . "/".$timestamp.".sql";
                $dumpit->start($model->path_and_filename);
            } catch (\Exception $e) {
                $model->resultmessage = 'mysqldump-php error: ' . $e->getMessage();
            }
            return $this->render('dump',
                     [
                       'dumpit'=>$dumpit,
                       'model' => $model,
                       'path' => $model->path,
                       'path_and_filename' => $model->path_and_filename,
                       'resultmessage'=> $model->resultmessage,  
                       'created_directory_successfully'=>$model->created_directory_successfully,
                       'save_from_path'=>$model->save_from_path,
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
