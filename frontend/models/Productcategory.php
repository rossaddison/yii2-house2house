<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "works_productcategory".
 *
 * @property integer $id
 * @property string $name
 * @property integer $tax_id
 * @property string $modifieddate
 *
 * @property WorksTax $tax
 * @property WorksProductsubcategory[] $worksProductsubcategories
 */
class Productcategory extends \yii\db\ActiveRecord
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
        return 'works_productcategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'tax_id'], 'required'],
            [['tax_id'], 'integer'],
            [['description'],'default','value' =>'No description'],
            [['name'], 'string', 'max' => 50],
            [['tax_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tax::className(), 'targetAttribute' => ['tax_id' => 'tax_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'tax_id' => 'Tax ID',
            'modifieddate' => 'Modifieddate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTax()
    {
        return $this->hasOne(Tax::className(), ['tax_id' => 'tax_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsubcategories()
    {
        return $this->hasMany(Productsubcategory::className(), ['productcategory_id' => 'id']);
    }
    
    public function getProduct()
    {
        return $this->hasMany(Product::className(),['productsubcategory_id' => 'id'])->via('productsubcategories');
    }
}
