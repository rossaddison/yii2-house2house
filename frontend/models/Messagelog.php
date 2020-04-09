<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "works_messagelog".
 *
 * @property int $id
 * @property string $message
 * @property string $date
 * @property string $phoneto
 * @property int $salesorderdetail_id
 * @property int $product_id
 *
 * @property WorksProduct $product
 * @property WorksSalesorderdetail $salesorderdetail
 */
class Messagelog extends \yii\db\ActiveRecord
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
        return 'works_messagelog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message', 'date', 'phoneto', 'salesorderdetail_id', 'product_id'], 'required'],
            [['date'], 'safe'],
            [['salesorderdetail_id', 'product_id'], 'integer'],
            [['date'],'default','value'=>null],
            [['message'], 'string', 'max' => 255],
            [['phoneto'], 'string', 'max' => 20],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['salesorderdetail_id'], 'exist', 'skipOnError' => true, 'targetClass' => Salesorderdetail::className(), 'targetAttribute' => ['salesorderdetail_id' => 'sales_order_detail_id']],
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
            'date' => 'Date',
            'phoneto' => 'Mobile',
            'salesorderdetail_id' => 'Salesorderdetail ID',
            'product_id' => 'Product ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalesorderdetail()
    {
        return $this->hasOne(Salesorderdetail::className(), ['sales_order_detail_id' => 'salesorderdetail_id']);
    }
}
