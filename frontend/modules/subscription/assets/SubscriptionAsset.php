<?php

namespace frontend\modules\subscription\assets;

use yii\web\AssetBundle;

/**
 * Asset bundle for subscription 
 *
 * @package app\modules\subscription\assets
 */
class SubscriptionAsset extends AssetBundle
{

    public $sourcePath = '@frontend/modules/subscription/assets/subscription';
    public $css = [
        'css/subscription.css'
    ];
    public $js = [
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\web\JqueryAsset',
        'yii\validators\ValidationAsset',
        'yii\widgets\ActiveFormAsset',
        'yii\jui\JuiAsset',
        '\kartik\icons\FontAwesomeAsset',
        'frontend\modules\subscription\assets\LaddaAsset',
    ];
}
