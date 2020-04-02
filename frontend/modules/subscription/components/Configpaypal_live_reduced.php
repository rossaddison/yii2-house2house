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
            'AUHAEbcdhHQfHge3jtZpS3BA43LUDzEgS1x6Rt3AmD2lFZE07lbddtMPyLZi3bA1EsS7ozAIDiC5UWc7',
            'EPvOGx_IiwduFMDznUSfDrQLBIIopSBuqThb-94_cPt2wfGV4fBktzYLQ189cdLf4n_mupKjbCVEGgIm')
          ); 
          return $apiContext;
}
}




