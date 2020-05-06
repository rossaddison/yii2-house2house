<?php
namespace frontend\models;

use frontend\models\Sourced;

class Translated extends \yii\db\ActiveRecord
{
    public $message_table_filter;   
    public static function getDb()
    {
        return \Yii::$app->db; 
    }    
    
    public static function tableName()
    {
        return 'message';
    }

    public function rules()
    {
        return [
            [['id', 'language'], 'required'],
            [['id'], 'integer'],
            [['message_table_filter'],'string'],
            [['translation'], 'string'],
            [['translation'], 'default','value'=>null],
            [['language'], 'string', 'max' => 16],
            [['id', 'language'], 'unique', 'targetAttribute' => ['id', 'language']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Sourced::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'language' => 'Language',
            'translation' => 'Translation (message table)',
            'message_table_filter'=>'Source Message Filter (source_message table)',
        ];
    }

    //searching with message relation: line 1
    //https://stackoverflow.com/questions/34894966/yii2-sort-and-filter-in-gridview-with-viatable-relation//
    public function getExtracted()
    {
        return $this->hasOne(Sourced::className(), ['id' => 'id']);
    }
}
