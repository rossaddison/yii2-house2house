<?php
$params = array_merge(
    //admin email, support email, bootstrap versioning located under params.php
    require(__DIR__ . '/params.php')
 );

Use frontend\modules\subscription\components\SessionHelper;

return [
    'id' => 'app-frontend',
    'name'=>'House-2-House',
    'timezone' => 'UTC',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
         // The sjaak/pluto user module facility setup in frontend/config/main.php and originating in composer.json uses this pseudonym. Set it here:
	 // This will appear next to your domain name eg. yoursite.co.uk/libra 
        'libra'
    ],
    'aliases'=>[
      '@bower'=>'@vendor/bower-asset',
      '@npm'=>'@vendor/npm-asset',
    ],
    //adjust the portalMode param when the site is under maintenance
    'on beforeRequest' => function ($event) {
	//change frontend/config/params.php file 'portalMode' setting.    
        if (Yii::$app->params['portalMode'] == 'maintenance') {
            $letMeIn = Yii::$app->session['letMeIn'] || isset($_GET['letMeIn']);
            if (!$letMeIn) {
		//modify the maintenance.php file under frontend/views/site/maintenance for a different graphical interface    
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
        //sjaak/pluto User model uses the reCaptcha. Get these settings from https://www.google.com/recaptcha/admin/create
	//demo https://www.google.com/recaptcha/api2/demo
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
	'user' => [
		//create an image upload directory for the carousal for timestamped demo user
               'on afterLogin' => function ($e) {
                    if (Yii::$app->user->identity->attributes['name'] === 'demo') {
                              \frontend\components\Utilities::create_demotimestamp_directory();
                    }    
               },
	       //delete the image upload directory for the carousal for timestamped demo user on exit
               'on beforeLogout' => function ($e) {
                    if (Yii::$app->user->identity->attributes['name'] === 'demo') {
                              \frontend\components\Utilities::delete_demotimestamp_directory();
                              \frontend\components\Utilities::delete_records();
                    }    
               }   
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
		        'daily-clean/<action:\w+>/<id:\d+>' => 'salesorderheader/<action>',
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
                        '<module:\w+>/backup/<controller:\w+><action:\w+>,' => '<module>/backup/<controller>/<action>',
                        '<module:\w+>/subscription/<controller:\w+><action:\w+>/<redirecturl:\d+>,' => '<module>/subscription/<controller>/<action>',
                        '<module:\w+>/installer/<controller:\w+><action:\w+>,' => '<module>/installer/<controller>/<action>',                       
	    ],
       ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ],
        'sessionHelper' => [
            'class' => SessionHelper::class
        ],
	'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'enableSwiftMailerLogging' =>false,
            'useFileTransport' => false,
            'transport' => ['class' => 'Swift_SmtpTransport',
                            'host' => 'mail.btinternet.com',
			    //get an email address through your service provider to test on localhost
			    //get an email address through your host to test on your host
                            'username' => 'myname@btinternet.com',
                            'password' => '7436hkdkdkdksaaaal@',
                            'port' => '25',
                            // 'encryption' => 'none',                            
                           ], 
        ],
    ],
    'params' => $params,
   
    'modules' => [
      'libra' => [
        'class' => 'sjaakp\pluto\Module',
        //'passwordFlags' => ['all' => 'captcha'],
        'passwordFlags' => ['all' => 'reveal'],
        'passwordHint' => 'At least eight characters, one uppercase, one digit',
        'passwordRegexp' => '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
        'identityClass' => 'sjaakp\pluto\models\User',
        //prevent the external guest signing up of users until site is stable by setting fenceMode to true
	//if fenceMode is set to true you can still signup users internally as the user with 'admin' rights.
        'fenceMode' => true,
        'viewOptions' => [
           'row' => [ 'class' => 'row justify-content-center' ],
           'col' => [ 'class' => 'col-md-6 col-lg-5' ],
           'button' => [ 'class' => 'btn btn-success' ],
           'link' => [ 'class' => 'btn btn-sm btn-secondary' ],
        ],        
       ],
      //use this module for timed backups 	    
      'subscription' => [
            'class' => 'frontend\modules\subscription\Module',
      ],
      'installer' => [
            'class' => 'frontend\modules\installer\Module',
      ],
      'backuper'=> [
             'class' => 'frontend\modules\backup\Module',
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
