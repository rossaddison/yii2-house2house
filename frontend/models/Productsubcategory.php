<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "works_productsubcategory".
 *
 * @property integer $id
 * @property integer $productcategory_id
 * @property string $name
 * @property string $modifieddate
 *
 * @property WorksProduct[] $worksProducts
 * @property WorksProductcategory $productcategory
 */
class Productsubcategory extends \yii\db\ActiveRecord
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
        return 'works_productsubcategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productcategory_id', 'name'], 'required'],
            [['productcategory_id','sort_order'], 'integer'],
            [['lat_start','lng_start','lat_finish','lng_finish'],'integer','integerOnly'=>false],
            [['lat_start','lng_start','lat_finish','lng_finish'],'default','value'=>0.00],
            [['name'], 'string', 'max' => 50],
            [['sort_order'],'integer','min'=>0,'max'=>500],
            [['productcategory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Productcategory::className(), 'targetAttribute' => ['productcategory_id' => 'id']],
            [['directions_to_next_productsubcategory'], 'string', 'max' => 5000],
            [['isactive'],'default','value'=>1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'productcategory_id' => 'Area',
            'name' => 'Name',
            'sort_order'=>'Sequence eg. set to 500 temporarily if using Quick Build. 99 suggested if not using Quick Build.',
            'lat_start' => 'Latitude Start eg. 55.8888888',
            'lng_start' => 'Longitude Start eg. -4.1111111',
            'lat_finish' => 'Latitude Finish eg. 55.9999999',
            'lng_finish' => 'Longitude Finish eg. -4.2222222',
            'directions_to_next_productsubcategory' => 'Directions to next street',
            'isactive'=>'Is this active? (Default: Ticked)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['productsubcategory_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductcategory()
    {
        return $this->hasOne(Productcategory::className(), ['id' => 'productcategory_id']);
    }
    
   
    
    
    
}
