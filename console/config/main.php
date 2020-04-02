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
         'migrate' => [
                'class' => 'yii\console\controllers\MigrateController',
                'migrationNamespaces' => [
                        'frontend\migrations',
                        'vendor\sjaak\yii2-pluto\migrations',
                        'vendor\ellera\yii2-backup\src\migrations',
                ],
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
