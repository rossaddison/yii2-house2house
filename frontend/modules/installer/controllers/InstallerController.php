<?php
namespace frontend\modules\installer\controllers;

use frontend\modules\installer\components\UpdateHelper;
use frontend\modules\installer\models\DbConfig;
use frontend\modules\installer\components\InstallerFilter;
use frontend\modules\installer\components\InstallerHelper;
use frontend\modules\installer\models\MigrateModel;
use frontend\components\Utilities;
use Yii;
use yii\base\DynamicModel;
use yii\web\Controller;

class InstallerController extends Controller
{
    
    //public $layout = 'installer';
    private $db = null;
    
    public function behaviors()
    {
        return
        [
            'installer' => [
                'class' => InstallerFilter::className(),
            ],
            'access' => 
                            [
                              'class' => \yii\filters\AccessControl::className(),
                              'only' => ['index','language','dbconfig','dbconfigfromsession','migrate','db','complete','checktime'],
                              'rules' => [
                                        [
                                              'allow' => true,
                                              'roles' => ['@'],
                                        ],
                               ],
                             ]   
        ];
    }

    public function actionIndex()
    {
        if (!\Yii::$app->user->can('Migrate Works Database')) {
            throw new \yii\web\ForbiddenHttpException(Yii::t('app','You have to have the .. Migrate Works Database .. permission to do this migration. This facility is only to be run for databases db1 to db10. NOT the admin database db'));
        }
        $minPhpVersion = version_compare(PHP_VERSION, '5.5.0') >= 0;
        $docRoot = strpos(Yii::$app->request->url, '/installer') === 0;
        $databasecode = Utilities::userdb_database_code();

        return $this->render(
            'index',
            [
                'minPhpVersion' => $minPhpVersion,
                'docRoot' => $docRoot,
                'databasehandler'=>$databasecode,
            ]
        );
    }

    public function actionLanguage()
    {
        if (!\Yii::$app->user->can('Migrate Works Database')) {
           throw new \yii\web\ForbiddenHttpException(Yii::t('app','You have to have the .. Migrate Works Database .. permission to do this migration. This facility is only to be run for databases db1 to db10. NOT the admin database db.'));
        }
        $model = new DynamicModel(['language']);
        $model->addRule(['language'], 'required');
        $sessionHelper = Yii::$app->get('sessionHelper');
        $model->setAttributes(['language' => $sessionHelper->get('language', 'en')]);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $sessionHelper->set('language', $model->language);
            return $this->redirect(['migrate']);
        }
        return $this->render(
            'language',
            [
                'languages' => InstallerHelper::getLanguagesArray(),
                'model' => $model,
            ]
        );
    }

    public function actionDbConfig()
    {
        if (!\Yii::$app->user->can('Migrate Works Database')) {
            throw new \yii\web\ForbiddenHttpException(Yii::t('app','You have to have the .. Migrate Works Database .. permission to do this migration. This facility is only to be run for databases db1 to db10. NOT the admin database db'));
        }
        $config = $this->getDbConfigFromSession();
        $model = new DbConfig();
        $model->setAttributes($config);
        $sessionHelper = Yii::$app->get('sessionHelper');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $config = $model->getAttributes();
            $config['connectionOk'] = false;
            if ($model->testConnection()) {
                $config['connectionOk'] = true;
                Yii::$app->session->setFlash('success', Yii::t('app', 'Database connection - ok'));
                if (Yii::$app->request->post('next')) {
                    $sessionHelper->set('db-config', $config);
                    return $this->redirect(['migrate']);
                }
            }
            $sessionHelper->set('db-config', $config);
        }

        return $this->render(
            'db-config',
            [
                'config' => $config,
                'model' => $model,
            ]
        );
    }

    private function getDbConfigFromSession()
    { 
        if (!\Yii::$app->user->can('Migrate Works Database')) {
            throw new \yii\web\ForbiddenHttpException(Yii::t('app','You have to have the .. Migrate Works Database .. permission to do this migration. This facility is only to be run for databases db1 to db10. NOT the admin database db'));
        }
        $sessionHelper = Yii::$app->get('sessionHelper');
        return $sessionHelper->get('db-config', [
            'db_host' => '',
            'db_name' => '',
            'username' => '',
            'password' => '',
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 86400,
            'schemaCache' => 'cache',
            'connectionOk' => false,
        ]);
    }

    public function actionMigrate()
    {
        if (!\Yii::$app->user->can('Migrate Works Database')) {
             throw new \yii\web\ForbiddenHttpException(Yii::t('app','You have to have the .. Migrate Works Database .. permission to do this migration. This facility is only to be run for databases db1 to db10. NOT the admin database db'));
        }
        $model = new MigrateModel();
        $sessionHelper = Yii::$app->get('sessionHelper');
        //the user administering the installer will only be able to access their allocated database via the RBAC. 
        //the administrator will have to swop in and out of different databases 
        $model->dbCode = $sessionHelper->get('dbCode',Utilities::userdb_database_code());
        if ($model->dbCode = 'db'){throw new \yii\web\ForbiddenHttpException(Yii::t('app','You are trying to create the Works Tables for database db by means of migrations. These have already been done by means of the migrate-db-namespaced command ...see console config main ...'));}
        if ($model->load(Yii::$app->request->post())) {
            $model->validate();
            foreach ($model->getAttributes() as $key => $value) {
                $sessionHelper->set($key, $value);
            }
        }
        $helper = Yii::createObject([
            'class' => UpdateHelper::className(),
        ]);
        $process = $helper->applyAppMigrations(
            false,false, $model->dbCode
        );
        $commandToRun = $process->getCommandLine();
        if (Yii::$app->request->isPost) {
                    $process->run();
                    if ($process->getExitCode() === 0) {
                        Yii::$app->session->setFlash('info', Yii::t('app', 'Migrations completed successfully'));
                        return $this->redirect(['complete']);
                    }
        }
        return $this->render(
            'migrate',
            [
                'commandToRun' => $commandToRun,
                'process' => $process,
                'model' => $model,
            ]
        );
    }

    public function actionComplete()
    {
        if (!\Yii::$app->user->can('Migrate Works Database')) {
             throw new \yii\web\ForbiddenHttpException(Yii::t('app','You have to have the .. Migrate Works Database .. permission to do this migration. This facility is only to be run for databases db1 to db10. NOT the admin database db'));
        }
        return $this->render(
            'complete'
        );
    }

    
    private function db()
    {
        if (!\Yii::$app->user->can('Migrate Works Database')) {
             throw new \yii\web\ForbiddenHttpException(Yii::t('app','You have to have the .. Migrate Works Database .. permission to do this migration. This facility is only to be run for databases db1 to db10. NOT the admin database db'));
        }
        if ($this->db === null) {
            $config = InstallerHelper::createDatabaseConfig($this->getDbConfigFromSession());
            $dbComponent = Yii::createObject(
                $config
            );
            $dbComponent->open();
            $this->db = $dbComponent;
        }
        return $this->db;
    }


    private function checkTime($ignoreTimeLimit=false)
    {
        if (!\Yii::$app->user->can('Migrate Works Database')) {
            throw new \yii\web\ForbiddenHttpException(Yii::t('app','You have to have the .. Migrate Works Database .. permission to do this migration. This facility is only to be run for databases db1 to db10. NOT the admin database db'));
        }
        if (InstallerHelper::unlimitTime() === false && $ignoreTimeLimit === false) {
            Yii::$app->session->setFlash('warning', Yii::t('app', 'Cannot set time limit to 0. Some operations may not complete.'));
            return false;
        } else {
            return true;
        }
    }
}
