<?php
$params = array_merge(
    //admin email, support email, bootstrap versioning located under params.php
    require(__DIR__ . '/params.php')
 );

Use frontend\modules\installer\components\SessionHelper;

return [
    'id' => 'app-frontend',
    'name'=>'House-2-House',
    'timezone' => 'UTC',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        //use sjaak/pluto facility for rbac connecting to first database namely 'db'. Alias pluto.
        'libra'
    ],
    'aliases'=>[
      '@bower'=>'@vendor/bower-asset',
      '@npm'=>'@vendor/npm-asset',
    ],
    //adjust the portalMode param when the site is under maintenance
    'on beforeRequest' => function ($event) {
        if (Yii::$app->params['portalMode'] == 'maintenance') {
            $letMeIn = Yii::$app->session['letMeIn'] || isset($_GET['letMeIn']);
            if (!$letMeIn) {
                Yii::$app->catchAll = [
                    'site/maintenance',
                ];
            }else{
                Yii::$app->session['letMeIn'] = 1;
            }
        }
    },
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap4\BootstrapAsset' => [
                    'sourcePath' => '@npm/bootstrap/dist'
                ],
                'yii\bootstrap4\BootstrapPluginAsset' => [
                    'sourcePath' => '@npm/bootstrap/dist'
                ],
                //
                'dosamigos\google\maps\MapAsset' => [
                 'options' => [
                         //insert your Google Maps API key. Free from Google
                        //by creating an account with them.
                        //Houses will be visible on Google Maps
                        'key' => 'xxxxxxxxxxxxxxx',
                        'language' => 'en',
                        'version' => '3.1.18'
                 ],
                 ],
            ],
        ], 
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'parsers' => [
            'application/json' => 'yii\web\JsonParser'],
            'enableCsrfValidation' => true,
        ],
        //sjaak/pluto uses the reCaptcha. Get these settings from https://www.google.com/recaptcha/admin/create
        'reCaptcha' => [
                'class' => 'himiklab\yii2\recaptcha\ReCaptchaConfig',
                'siteKeyV2' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'secretV2' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'siteKeyV3' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'secretV3' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
            'class' => 'yii\web\Session',
            'cookieParams' => ['httponly' => true, 'lifetime' => 7 * 24 *60 * 60],
            'timeout' => 3600*4, //session expire
            'useCookies' => true, 
        ],
       /**
     * @var string the route (e.g. `site/error`) to the controller action that will be used
     * to display external errors. Inside the action, it can retrieve the error information
     * using `Yii::$app->errorHandler->exception`. This property defaults to null, meaning ErrorHandler
     * will handle the error display.
     */     
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'showScriptName' => false,
            'baseUrl'=>'/',
            'rules' => [
                        'your-settings/<action:\w+>/<id:\d+>'=>'company/<action>',
                        'work-area/<action:\w+>/<id:\d+>' => 'productcategory/<action>',
                        'street/<action:\w+>/<id:\d+>' => 'productsubcategory/<action>',
                        'your-staff/<action:\w+>/<id:\d+>' => 'employee/<action>',
                        'house/<action:\w+>/<id:\d+>' => 'product/<action>',
                        'specific-cost-main-category-code/<action:\w+>/<id:\d+>' => 'costcategory/<action>',
                        'specific-cost-secondary-category-code/<action:\w+>/<id:\d+>' => 'costsubcategory/<action>',
                        'individual-cost-under-secoondary-category-code/<action:\w+>/<id:\d+>' => 'cost/<action>',
                        'daily-cost-header/<action:\w+>/<id:\d+>' => 'costheader/<action>',
                        '<controller:\w+>/<id:\d+>'=>'<controller>/view',
			'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			'gii'=>'gii','gii/<controller:\w+>'=>'gii/<controller>',
                        'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>', 
                        '<module:\w+>/installer/<controller:\w+><action:\w+>,' => '<module>/installer/<controller>/<action>',
                        '<module:\w+>/backuper/<controller:\w+><action:\w+>,' => '<module>/backuper/<controller>/<action>',
                        '<module:\w+>/backup/<controller:\w+><action:\w+>,' => '<module>/backup/<controller>/<action>',
                        '<module:\w+>/subscription/<controller:\w+><action:\w+>/<redirecturl:\d+>,' => '<module>/subscription/<controller>/<action>',
              ],
       ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ],
        'sessionHelper' => [
            'class' => SessionHelper::class
        ]
    ],
    'params' => $params,
   
    'modules' => [
      'libra' => [
        'class' => 'sjaakp\pluto\Module',
        //'passwordFlags' => ['all' => 'captcha'],
        'passwordFlags' => ['all' => 'reveal'],
        'passwordHint' => 'At least eight characters, one uppercase, one digit',
        'passwordRegexp' => '^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$',
        'identityClass' => 'sjaakp\pluto\models\User',
        //prevent the signing up of users until site is stable by setting fenceMode to true
        'fenceMode' => true,
        'viewOptions' => [
           'row' => [ 'class' => 'row justify-content-center' ],
           'col' => [ 'class' => 'col-md-6 col-lg-5' ],
           'button' => [ 'class' => 'btn btn-success' ],
           'link' => [ 'class' => 'btn btn-sm btn-secondary' ],
        ],
        
       ],
      'installer' => [
            'class' => 'frontend\modules\installer\Module',
      ],
      'backuper'=> [
             'class' => 'frontend\modules\backup\Module',
      ],
      'composerer'=> [
             'class' => 'frontend\modules\composer\Module',
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
      'subscription' => [
            'class' => 'frontend\modules\subscription\Module',
      ],    
      'gii' => [
      'class' => 'yii\gii\Module', //adding gii module
        'allowedIPs' => ['127.0.0.1','localhost', '::1'],
                     'generators' => [
                        'migrik' => [
                            'class' => \insolita\migrik\gii\StructureGenerator::class,
                            'templates' => [
                                'custom' => '@frontend/gii/templates/migrator_schema',
                            ],
                        ],
                        'migrikdata' => [
                            'class' => \insolita\migrik\gii\DataGenerator::class,
                            'templates' => [
                                'custom' => '@frontend/gii/templates/migrator_data',
                            ],
                        ],
                    ],
       ],
      'gridview' =>  [
        'class' => '\kartik\grid\Module'
       ],
       'social' => [
         'class' => 'kartik\social\Module',
         'googleAnalytics' => [
            //insert your Google Analytics code here under id.
            //'id' => 'UA-1111111-1',
            'domain' => 'localhost',
            'testMode'=>false,
         ],
        ],
      'treemanager' =>  [
        'class' => 'kartik\tree\Module',
      ],
       'datecontrol' => [
        'class' => 'kartik\datecontrol\Module',
        'displaySettings' => [
            'date' => 'php:d-M-Y',
            'time' => 'php:H:i:s A',
            'datetime' => 'php:d-m-Y H:i:s A',
        ],
        'saveSettings' => [
            'date' => 'php:Y-m-d', 
            'time' => 'php:H:i:s',
            'datetime' => 'php:Y-m-d H:i:s',
        ],
        // automatically use kartikwidgets for each of the above formats
        'autoWidget' => true,      
     ],
   ],
];  