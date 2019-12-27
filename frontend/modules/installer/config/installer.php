<?php

use frontend\modules\installer\components\SessionHelper;

$config = [
    'id' => 'frontend-installer',
    'basePath' => dirname(__DIR__),
    //'extensions' => require(__DIR__ . '/vendor/yiisoft/extensions.php'),
    'language' => 'en',
    'defaultRoute' => 'installer/installer',
    //'bootstrap' => [
    //    'installer',
    //],
    'modules' => [
        'installer' => [
            'class' => 'frontend\modules\installer\Module',
        ],
        
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\DummyCache',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 6 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=installer',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'enableSchemaCache' => false,
        ],
        'request' => [
            'cookieValidationKey' => 'INSTALLER_COOKIE',
            'enableCsrfValidation' => false,
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'linkAssets' => YII_DEBUG && stripos(PHP_OS, 'win')!==0,
        ],
        'sessionHelper' => [
            'class' => SessionHelper::class
        ]

    ],
    'params' => [
        'icon-framework' => 'fa',
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
];

if (YII_CONSOLE) {
    echo "installer is running in console\n";
    unset($config['components']['request']);
    $config['defaultRoute'] = 'install/index';
    $config['controllerNamespace'] = 'frontend\modules\installer\commands';
}

return $config;
