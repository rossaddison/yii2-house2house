<?php

namespace frontend\models;

use frontend\models\Productcategory;
use frontend\models\Productsubcategory;

use Yii;

class Product extends \yii\db\ActiveRecord
{
   public $importfile;
   
   public static function getDb()
   {
       return \frontend\components\Utilities::userdb();
   }  
    
    
   public static function tableName()
   {
        return 'works_product';
   }

    public function rules()
    {
        return [
            [['listprice','frequency','productsubcategory_id'], 'required'],
            [['listprice'], 'number'],
            [['productsubcategory_id','productcategory_id'], 'integer'],
            [['frequency'],'string'],
            [['frequency'],'default','value'=>'Monthly'],
            [['sellstartdate', 'discontinueddate'], 'default','value'=>null],
            [['sellenddate'], 'default','value'=>date('2099/12/31')],
            [['sellstartdate', 'sellenddate', 'discontinueddate'], 'safe'],
            [['productnumber'], 'default','value'=>'001'],
            [['postcodefirsthalf'], 'string', 'max' => 4],
            [['postcodesecondhalf'], 'string', 'max' =>3], 
            [['name'],'default','value'=>'Firstname'],
            [['surname'],'default','value'=>'Surname'],
            [['name'], 'string', 'max' => 60],
            [['surname'], 'string', 'max' => 60],
            [['contactmobile'], 'default', 'value'=>'09999999999'],
            [['contactmobile'], 'string', 'max' => 11,'min'=>11],
            [['email'],'email'],
            [['email'],'default','value'=>'email@email.com'],
            [['specialrequest'], 'string', 'max' => 100],
            [['productsubcategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Productsubcategory::className(), 'targetAttribute' => ['productsubcategory_id' => 'id']],
            [['productcategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Productcategory::className(), 'targetAttribute' => ['productcategory_id' => 'id']],
            [['isactive'],'default','value'=>1],
            [['jobcode'],'default','value'=>null],
            [['mandate'],'default','value'=>null],
            [['gc_number'],'default','value'=>null],
        ];
    }
    
     

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Firstname (Not required)',
            'surname' => 'Surname (Not required)',
            'contactmobile' => 'Contact Mobile',
            'specialrequest' => 'Special Request',
            'listprice' => 'Price (required)',
            'frequency'=> 'Frequency (required)',
            'productnumber'=>'House Number',
            'productcategory_id' => 'Postcode Area (eg. G32 - Carntyne)',
            'postcodefirsthalf' =>'Postcode Firsthalf eg. G32 (Max 4 characters)',
            'postcodesecondhalf' =>'Postcode Secondhalf eg. 6LF (Max 3 characters)',
            'productcategory_id.description'=>'Description',
            'productsubcategory_id' => 'Street (required)',
            'sellstartdate' => 'First captured date',
            'sellenddate' => 'Termination date (default: 2099/12/31) . Set to remove from round.',
            'discontinueddate' => 'Modified Date (ignore)',
            'isactive'=>'Is this active?',
            'jobcode' => 'Latest daily clean job code to link house to.',
            'mandate'=> 'Gocardless customer mandate link sent to customer in email (not approved yet) / Mandate Number eg. MD1234AA123BB (approved) ',
            'gc_number'=> 'Gocardless customer number in Gocardless Website indicating that direct debit mandate has been approved.',
          ];
    }

    public function getProductcategory()
    {
        return $this->hasOne(Productcategory::className(), ['id' => 'productcategory_id']);
    }

    public function getProductsubcategory()
    {
        return $this->hasOne(Productsubcategory::className(), ['id' => 'productsubcategory_id']);
    }
    
    public function getSalesorderdetails()
    {
        return $this->hasMany(Salesorderdetail::className(), ['product_id' => 'id']);
    }
    
    
    
    
    
    
    
}
