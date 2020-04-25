<?php
Namespace frontend\modules\subscription\components;
    
use Yii;
use yii\base\Component;
use PayPal\Auth\OAuthTokenCredential;
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
            'AUXXXXXXX',
            'EPvXXXXXX')
          ); 
          $apiContext->setConfig(
            [
                'mode'                      => 'live', // development (sandbox) or production (live) mode
                'http.ConnectionTimeOut'    => 30,
                'http.Retry'                => 1,
                'log.LogEnabled'            => YII_DEBUG ? 1 : 0,
                'log.FileName'              => Yii::getAlias('@runtime/logs/paypal.log'),
                'log.LogLevel'              => 'INFO', //'INFO' WHEN LIVE
                'validation.level'          => 'log',
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




