<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "works_gocardless_invoice".
 *
 * @property int $id
 * @property int $product_id
 * @property string $date
 * @property string $amount
 *
 * @property WorksProduct $product
 */
class GocardlessInvoice extends \yii\db\ActiveRecord
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
        return 'works_gocardless_invoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'date', 'amount'], 'required'],
            [['product_id'], 'integer'],
            [['date'], 'safe'],
            [['amount'], 'number'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'date' => 'Date',
            'amount' => 'Amount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
