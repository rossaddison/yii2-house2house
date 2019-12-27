<?php

namespace frontend\modules\installer\models;

use Yii;

class MigrateModel extends \yii\base\Model
{ 
    public $dbCode = '';
    
    public static function getDb()
    {
       return \frontend\components\Utilities::userdb();
    }
    
}