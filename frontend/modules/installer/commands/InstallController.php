<?php
namespace frontend\modules\installer\commands;

use frontend\modules\installer\components\UpdateHelper;
use frontend\modules\installer\models\AdminUser;
use frontend\modules\installer\models\DbConfig;
use frontend\modules\installer\components\InstallerFilter;
use frontend\modules\installer\components\InstallerHelper;
use frontend\modules\installer\models\FinalStep;
use Yii;
use yii\console\Controller;
use yii\helpers\Console;

class InstallController extends Controller
{
    private $db = null;
    
    public function behaviors()
    {
        return [
            'installer' => [
                'class' => InstallerFilter::class,
            ],
        ];
    }

    public function actionIndex()
    {
        $this->stdout(Yii::t('app','Checking permissions'), Console::FG_YELLOW);
        $permissions = InstallerHelper::checkPermissions();
        $ok = true;
        foreach ($permissions as $file => $result) {

            if ($result) {
                $this->stdout('[ OK ]    ', Console::FG_GREEN);
            } else {
                $this->stdout('[ Error ] ', Console::FG_RED);
            }
            $this->stdout($file);
            $this->stdout("\n");
            $ok = $ok && $result;
        }
        if (!$ok) {
            if ($this->confirm(Yii::t('app','Some of your files are not accessible. Continue at your own risk?'), true)) {
                return $this->language();
            } else {
                return 1;
            }
        } else {
            return $this->language();
        }
    }

    private function language()
    {
        $sessionHelper = Yii::$app->get('sessionHelper');
        $sessionHelper->set('language', $this->prompt(Yii::t('app','Enter language'),[
            'required' => true,
            'default' => 'en',
        ]));
        return $this->dbConfig();
    }

    private function dbConfig()
    {
        $config = $this->getDbConfigFromSession();

        $model = new DbConfig();
        $model->setAttributes($config);

        $this->stdout(Yii::t('app','Enter your database configuration'), Console::FG_YELLOW);
        foreach ($model->attributes() as $attribute) {
            if ($attribute !== 'enableSchemaCache') {
                $model->setAttributes(
                    [
                        $attribute => $this->prompt("-> $attribute", [
                            'required' => in_array($attribute, ['db_host', 'db_name', 'username']),
                            'default' => $model->$attribute,
                        ]),
                    ]
                );
            }
        }

        if (!$this->interactive) {
            if (getenv('DB_USER')) {
                $model->username = getenv('DB_USER');
            }
            if (getenv('DB_PASS')) {
                $model->password = getenv('DB_PASS');
            }
            if (getenv('DB_NAME')) {
                $model->db_name = getenv('DB_NAME');
            }
        }
        $config = $model->getAttributes();
        $config['connectionOk'] = false;

        if ($model->testConnection() === false) {
            $config['connectionOk'] = true;
            $this->stderr(Yii::t('app','Could not connect to databse!'), Console::FG_RED);
            $this->dbConfig();
        }
        /**
         * @var $sessionHelper SessionHelper
         */
        $sessionHelper = Yii::$app->get('sessionHelper');
        $sessionHelper->set('db-config', $config);
        return $this->migration();

    }

    private function migration()
    {
        $config = $this->getDbConfigFromSession();
        $dbConfigModel = new DbConfig();
        $dbConfigModel->setAttributes($config);
        $config = InstallerHelper::createDatabaseConfig($dbConfigModel->getAttributes());
        if (InstallerHelper::createDatabaseConfigFile($config) === false) {
            $this->stderr(Yii::t('app', 'Unable to create db-local config'), Console::FG_RED);
            return false;
        }
        $this->stdout(Yii::t('app','Running migrations'), Console::FG_YELLOW);
        /** @var UpdateHelper $helper */
        $helper = Yii::createObject([
            'class' => UpdateHelper::className(),
        ]);
        $process = $helper->applyAppMigrations(
            false
        );

        $process->run();

        if (!$this->interactive && getenv("DP2_SKIP_ADMIN")) {
            return $this->finalStep();
        } else {
            return $this->adminUser();
        }
    }

    private function adminUser()
    {
        $model = new AdminUser();
        foreach ($model->attributes() as $attribute) {

            $model->setAttributes(
                [
                    $attribute => $this->prompt("-> $attribute", [
                        'required' => true,
                        'default' => $model->$attribute,
                    ]),
                ]
            );

        }
        if (!$this->interactive) {
            $model->password = 'password';
        }
        if ($model->validate()) {
            InstallerHelper::createAdminUser($model, $this->db());
            return $this->finalStep();
        } else {
            $this->stderr(Yii::t('app','Error in input data: ').var_export($model->errors, true), Console::FG_RED);
            return $this->adminUser();
        }
    }

    private function finalStep()
    {
        $model = new FinalStep();
        Yii::setAlias('@webroot', Yii::getAlias('@app/web/'));
        foreach ($model->attributes() as $attribute) {
            if ($attribute !== 'useMemcached') {
                $model->setAttributes(
                    [
                        $attribute => $this->prompt("-> $attribute", [
                            'required' => true,
                            'default' => $model->$attribute,
                        ]),
                    ]
                );
            } else {
                $model->useMemcached = $this->confirm(Yii::t('app','Use memcached extension?'), false);
            }

        }
        return 0;
    }
   
    private function db()
    {
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

    private function getDbConfigFromSession()
    {
        $sessionHelper = Yii::$app->get('sessionHelper');
        return $sessionHelper->get('db-config', [
            'db_host' => 'localhost',
            'db_name' => 'installer',
            'username' => 'root',
            'password' => '',
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 86400,
            'schemaCache' => 'cache',
            'connectionOk' => false,
        ]);
    }
}
