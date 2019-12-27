<?php

namespace frontend\modules\installer\components;

use frontend\modules\installer\models\AdminUser;
use frontend\modules\installer\models\FinalStep;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use frontend\modules\installer\components\ConfigurationUpdater;
use frontend\modules\installer\models\Configurable;

class InstallerHelper
{
   
    public static function unlimitTime()
    {
        return set_time_limit(0);
    }

    public static function getLanguagesArray()
    {
        $yiiLanguages = [
            'en-GB',
        ];
        $multiLanguages = [
            'en-GB'
        ];
        $result = [];
        foreach ($yiiLanguages as $lang) {
            $result[] = [
                'language' => $lang,
                'translated' => in_array($lang, $multiLanguages),
            ];
        }
        ArrayHelper::multisort($result, 'translated', SORT_DESC);
        return $result;
    }

    public static function createDatabaseConfig($config)
    {
        $config['dsn'] = 'mysql:host='.$config['db_host'].';dbname='.$config['db_name'];
        $config['class'] = 'yii\db\Connection';
        unset($config['db_name'], $config['db_host'], $config['connectionOk']);
        return $config;
    }
    
}