<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use Yii;
/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    
    public $sourcePath = '@app/assets/app';
    public $baseUrl = '@app';
    
    public $css = [
        '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
        '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"',
        'css/site.css',
    ];
    
    public $js = [ 'js/scripts2.js',
                   'js/scripts_slider.js',
                   'js/scripts_translated.js', 
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\web\JqueryAsset',
    ];
}
