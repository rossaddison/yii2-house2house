<?php
namespace frontend\modules\installer\assets;

use yii\web\AssetBundle;

class InstallerAsset extends AssetBundle
{
    public $sourcePath = '@frontend/modules/installer/assets/installer';
    public $css = [
        'css/installer.css'
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
        'frontend\modules\installer\assets\LaddaAsset',
    ];
}
