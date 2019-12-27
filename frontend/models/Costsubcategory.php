<?php

namespace frontend\models;

use Yii;

class Costsubcategory extends \yii\db\ActiveRecord
{
    
    
    public static function getDb()
   {
       return \frontend\components\Utilities::userdb();
   }
    
    
    
    public static function tableName()
    {
        return 'works_costsubcategory';
    }
    
    public function rules()
    {
        return [
            [['costcategory_id', 'name'], 'required'],
            [['costcategory_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['costcategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Costcategory::className(), 'targetAttribute' => ['costcategory_id' => 'id']],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'costcategory_id' => 'Cost Category',
            'name' => 'Name',
        ];
    }
    
    public function getCosts()
    {
        return $this->hasMany(Cost::className(), ['costsubcategory_id' => 'id']);
    }
    
    public function getCostcategory()
    {
        return $this->hasOne(Costcategory::className(), ['id' => 'costcategory_id']);
    }
    
   
    
    
    
}
