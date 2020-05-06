<?php
namespace frontend\models;

use frontend\models\Translated;

class Sourced extends \yii\db\ActiveRecord
{
    public static function getDb()
    {
        return \Yii::$app->db; 
    }   
       
    public static function tableName()
    {
        return 'source_message';
    }

    public function rules()
    {
        return [
            [['message'], 'string'],
            [['category'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'message' => 'Message',
        ];
    }
    
    public function getTranslatedmessages()
    {
        return $this->hasMany(Translated::className(), ['id' => 'id']);
    }
}
