<?php
Namespace frontend\modules\subscription\components;
    
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\base\ErrorException;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\RedirectUrls;
use PayPal\Rest\ApiContext;
    
class Configpaypal extends Component
{
    
public static function paypalconfig(){
         //error_reporting(E_ALL);   
         //ini_set('display_errors', '1');
         // live AU... EPv... null null
         // sandbox AT3...ED4.. null A21
         $apiContext = new ApiContext(
            new OAuthTokenCredential(
            /////  'AUHAEbcdhHQfHge3jtZpS3BA43LUDzEgS1x6Rt3AmD2lFZE07lbddtMPyLZi3bA1EsS7ozAIDiC5UWc7',
            'AT3cmHNTemkzWSJ5w-3d8cA01npuQs7aMbcFlHy0GgTH9sN3GD5WurFrld2rkvfOoGyuTZtd-61W6CY8',
           /////   'EPvOGx_IiwduFMDznUSfDrQLBIIopSBuqThb-94_cPt2wfGV4fBktzYLQ189cdLf4n_mupKjbCVEGgIm',
            'ED46yGKoobsynUQFyuvkRKWzLxREYoHPRJpuTmv2ffxBX_xz8BI32d9oZYxE9nQTIy6OYexVGbCZUR8S',
            null,
            'A21AAHZq24-oNbYxn5Xq2XubQQJkHsc5M5LANXAGZX5Ou1mDHDSZKbsdCdO4juyCwFfVlTIVdGaujA1mgcm__zqr_F6OqUoLw'
            /////   null 
            )
          ); 
          $apiContext->setConfig(
            [
                //'mode'                      => 'sandbox', // development (sandbox) or production (live) mode
                'mode'                      => 'sandbox', // development (sandbox) or production (live) mode
                'http.ConnectionTimeOut'    => 30,
                'http.Retry'                => 1,
                'log.LogEnabled'            => YII_DEBUG ? 1 : 0,
                'log.FileName'              => Yii::getAlias('@runtime/logs/paypal.log'),
                'log.LogLevel'              => 'INFO', //'INFO' WHEN LIVE
                //'validation.level'          => 'log',
                'validation.level'          => 'strict',
                'cache.enabled'             => 'true',
                //'cache.FileName' => '/PaypalCache' // for determining paypal cache directory
                // 'http.CURLOPT_CONNECTTIMEOUT' => 30
               //'http.headers.PayPal-Partner-Attribution-Id' => '123123123'

            //'log.AdapterFactory' => '\PayPal\Log\DefaultLogFactory' // Factory class implementing \PayPal\Log\PayPalLogFactory
            ]);
          return $apiContext;
}
}




