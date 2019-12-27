<?php

namespace frontend\modules\installer\models;

use Yii;

class FinalStep extends \yii\base\Model
{
    public $serverName = 'localhost';
    public $serverPort = 80;
    public $cacheClass = 'yii\caching\FileCache';
    public $useMemcached = false;
    public $keyPrefix = 'dp2';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'serverName',
                    'serverPort',
                    'cacheClass',
                    'keyPrefix',
                ],
                'filter',
                'filter' => 'trim',
            ],
            [
                [
                    'serverName',
                    'cacheClass',
                ],
                'required',
            ],
            [
                [
                    'useMemcached',
                ],
                'filter',
                'filter' => 'boolval',
            ],
            [
                [
                    'useMemcached',
                ],
                'boolean'
            ],
            [
                [
                    'cacheClass',
                ],
                \frontend\modules\installer\components\ClassnameValidator::className(),
            ],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'useMemcached' => '>>>>>  Use MemCached.',
        ];
    }
}