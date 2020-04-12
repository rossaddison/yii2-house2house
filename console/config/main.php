<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-console',
    'name'=> 'multi-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','libra'],
    'timezone' => 'UTC',
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\console\controllers\FixtureController',
            'namespace' => 'common\fixtures',
          ],
         'migrate-db-namespaced' => [
                'class' => 'yii\console\controllers\MigrateController',
                'migrationNamespaces' => [
                        '\\sjaakp\pluto\migrations',
                        'frontend\migrations',
                ],
               'color'=>true,
               'comment'=> 'You are migrating the namespaced user table and main frontend tables to database connection component db which is your administration database.',
               'db' => 'db',
               'interactive'=>1,
               'migrationPath' => null, // allows to disable not namespaced migration completely
          ],
          'migrate-db-ellera' => [
                'class' => 'yii\console\controllers\MigrateController',
                'migrationPath' => '@vendor/ellera/yii2-backup/src/migrations',
                'color'=>true,
                'comment' => 'You are migrating the non-namespaced ellera backup module tables to database connection component db which is your administration database.',
                'db' => 'db',
                'interactive'=>1,
          ],
          'migrate-db-rbac' => [
               'class' => 'yii\console\controllers\MigrateController',
               'migrationPath' => '@yii/rbac/migrations',
               'color'=>true,
               'comment'=> 'You are migrating the rbac authorisation tables to database connection component db which is your administration database.',
               'db' => 'db',
               'interactive'=>1,
          ],
          'migrate-db-rbac-fill' => [
                'class' => 'yii\console\controllers\MigrateController',
                'migrationNamespaces' => [
                        'console\migrations\auth',                        
                ],
               'color'=>true,
               'comment'=> 'You are migrating the namespaced authorisation tables to database connection component db which is your administration database.',
               'db' => 'db',
               'interactive'=>1,
               'migrationPath' => null, // allows to disable not namespaced migration completely
          ],
          'migrate-db-paypal' => [
                'class' => 'yii\console\controllers\MigrateController',
                'migrationNamespaces' => [
                        'frontend\modules\subscription\migrations',                        
                ],
               'color'=>true,
               'comment'=> 'You are migrating the namespaced user table and main frontend tables to database connection component db which is your administration database.',
               'db' => 'db',
               'interactive'=>1,
               'migrationPath' => null, // allows to disable not namespaced migration completely
          ],
          'migrate-db1' => [
                'class' => 'yii\console\controllers\MigrateController',
                'migrationNamespaces' => [
                        'frontend\migrations',                        
                ],
               'color'=>true,
               'db' => 'db1',
               'interactive'=>1,
               'migrationPath' => null, // allows to disable not namespaced migration completely
          ],
          'migrate-db2' => [
                'class' => 'yii\console\controllers\MigrateController',
                'migrationNamespaces' => [
                        'frontend\migrations',                        
                ],
               'color'=>true,
               'db' => 'db2',
               'interactive'=>1,
               'migrationPath' => null, // allows to disable not namespaced migration completely
          ],
          'migrate-db3' => [
                'class' => 'yii\console\controllers\MigrateController',
                'migrationNamespaces' => [
                        'frontend\migrations',                        
                ],
               'color'=>true,
               'db' => 'db3',
               'interactive'=>1,
               'migrationPath' => null, // allows to disable not namespaced migration completely
          ],
          'migrate-db4' => [
                'class' => 'yii\console\controllers\MigrateController',
                'migrationNamespaces' => [
                        'frontend\migrations',                        
                ],
               'color'=>true,
               'db' => 'db4',
               'interactive'=>1,
               'migrationPath' => null, // allows to disable not namespaced migration completely
          ],
          'migrate-db5' => [
                'class' => 'yii\console\controllers\MigrateController',
                'migrationNamespaces' => [
                        'frontend\migrations',                        
                ],
               'color'=>true,
               'db' => 'db5',
               'interactive'=>1,
               'migrationPath' => null, // allows to disable not namespaced migration completely
          ],
           'migrate-db6' => [
                'class' => 'yii\console\controllers\MigrateController',
                'migrationNamespaces' => [
                        'frontend\migrations',                        
                ],
               'color'=>true,
               'db' => 'db6',
               'interactive'=>1,
               'migrationPath' => null, // allows to disable not namespaced migration completely
          ],
          'migrate-db7' => [
                'class' => 'yii\console\controllers\MigrateController',
                'migrationNamespaces' => [
                        'frontend\migrations',                        
                ],
               'color'=>true,
               'db' => 'db7',
               'interactive'=>1,
               'migrationPath' => null, // allows to disable not namespaced migration completely
          ],
           'migrate-db8' => [
                'class' => 'yii\console\controllers\MigrateController',
                'migrationNamespaces' => [
                        'frontend\migrations',                        
                ],
               'color'=>true,
               'db' => 'db8',
               'interactive'=>1,
               'migrationPath' => null, // allows to disable not namespaced migration completely
          ],
          'migrate-db9' => [
                'class' => 'yii\console\controllers\MigrateController',
                'migrationNamespaces' => [
                        'frontend\migrations',                        
                ],
               'color'=>true,
               'db' => 'db9',
               'interactive'=>1,
               'migrationPath' => null, // allows to disable not namespaced migration completely
          ],
          'migrate-db10' => [
                'class' => 'yii\console\controllers\MigrateController',
                'migrationNamespaces' => [
                        'frontend\migrations',                        
                ],
               'color'=>true,
               'db' => 'db10',
               'interactive'=>1,
               'migrationPath' => null, // allows to disable not namespaced migration completely
          ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ],  
        
    ],
    'params' => $params,
    'modules' => [
            'libra' => [
                    'class' => 'sjaakp\pluto\Module',
                    // several options
            ],
            'backup' => [
                'class' => 'ellera\backup\Module',
                'automated_cleanup' => [
                    'daily' => true,
                    'weekly' => true,
                    'monthly' => true,
                    'yearly' => true
                ],
                'databases' => [
                    'db',
                    'db1',
                    'db2',
                    'db3',
                    'db4',
                    'db5',
                    'db6',
                    'db7',
                    'db8',
                    'db9',
                    'db10',
                ],
                'path' => '@frontend/_backup'
            ],
            'backuper'=> [
                                 'class' => 'frontend\modules\backup\Module',
                          ],
            
      ],
];
