<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "works_messaging".
 *
 * @property int $id
 * @property string $message
 */
class Messaging extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
     public static function getDb()
   {
       return \frontend\components\Utilities::userdb();
   }
   
   
     
    public static function tableName()  
    {
        return 'works_messaging';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message'], 'required'],
            [['message'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message' => 'Message',
        ];
    }
}
