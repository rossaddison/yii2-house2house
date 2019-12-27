<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "works_tax".
 *
 * @property integer $tax_id
 * @property string $tax_type
 * @property string $tax_name
 * @property string $tax_percentage
 *
 * @property WorksProductcategory[] $worksProductcategories
 */
class Tax extends \yii\db\ActiveRecord
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
        return 'works_tax';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tax_type', 'tax_name', 'tax_percentage'], 'required'],
            [['tax_percentage'], 'number'],
            [['tax_type'], 'string', 'max' => 2],
            [['tax_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tax_id' => 'Tax ID',
            'tax_type' => 'Tax Type',
            'tax_name' => 'Tax Name',
            'tax_percentage' => 'Tax Percentage',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorksProductcategories()
    {
        return $this->hasMany(WorksProductcategory::className(), ['tax_id' => 'tax_id']);
    }
}
