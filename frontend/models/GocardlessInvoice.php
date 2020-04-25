<?php

namespace frontend\models;

use Yii;

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
            'id' => Yii::t('app','ID'),
            'product_id' => Yii::t('app','Product ID'),
            'date' => Yii::t('app','Date'),
            'amount' => Yii::t('app','Amount'),
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
