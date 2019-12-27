<?php

namespace frontend\models;

use Yii;

class Cost extends \yii\db\ActiveRecord
{
    public static function getDb()
   {
       return \frontend\components\Utilities::userdb();
   }    
    
    public static function tableName()
    {
        return 'works_cost';
    }

    public function rules()
    {
        return [
            [['description', 'listprice','frequency','costsubcategory_id'], 'required'],
            [['listprice'], 'number'],
            [['costsubcategory_id'], 'integer'],
            [['frequency'],'string'],
            [['costcategory_id'], 'integer'],
            [['coststartdate', 'discontinueddate'], 'default','value'=>null],
            [['costenddate'], 'default','value'=>date('2099/12/31')],
            [['coststartdate', 'costenddate', 'discontinueddate'], 'safe'],
            [['costnumber'], 'default','value'=>1],
            [['costnumber'], 'integer', 'max' => 10000],
            [['costcodefirsthalf'], 'string', 'max' => 4],
            [['costcodesecondhalf'], 'string', 'max' =>3],
            [['description'], 'string', 'max' => 100],
            [['costsubcategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Costsubcategory::className(), 'targetAttribute' => ['costsubcategory_id' => 'id']],
            [['costcategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Costcategory::className(), 'targetAttribute' => ['costcategory_id' => 'id']],
        ];
    }
    
     

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'listprice' => 'Price',
            'costnumber'=>'Cost Number',
            'costcategory_id' => 'Category Code (eg. SUB - Subcontractor)',
            'costcodefirsthalf' =>'Category Code Firsthalf eg. SUB (Max 4 characters)',
            'costcodesecondhalf' =>'Category Code Secondhalf eg. 001 (Max 3 characters)',
            'costcategory_id.description'=>'Description',
            'costsubcategory_id' => 'Specialisation',
            'coststartdate' => 'First cost date',
            'costenddate' => 'Termination date (default: 2099/12/31) . Set to remove from cost list.',
            'discontinueddate' => 'Modified Date (ignore)',           
        ];
    }

    public function getCostcategory()
    {
        return $this->hasOne(Costcategory::className(), ['id' => 'costcategory_id']);
    }

    public function getCostsubcategory()
    {
        return $this->hasOne(Costsubcategory::className(), ['id' => 'costsubcategory_id']);
    }
    
    public function getCostdetails()
    {
        return $this->hasMany(Costdetail::className(), ['cost_id' => 'id']);
    }
    
    
    
    
    
    
    
}
