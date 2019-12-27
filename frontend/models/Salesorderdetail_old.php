<?php

namespace frontend\models;

use frontend\models\Salesorderheader;
use frontend\models\Productcategory;
use frontend\models\Productsubcategory;
use frontend\models\Product;
use frontend\models\Tax;
use frontend\models\Instruction;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\db\Query;
use Yii;

/**
 * This is the model class for table "works_salesorderdetail".
 *
 * @property integer $sales_order_id
 * @property integer $sales_order_detail_id
 * @property string $nextclean_date
 * @property integer $product_id
 * @property string $unit_price
 * @property integer $paid
 * @property string $modified_date
 *
 * @property WorksProduct $product
 * @property WorksSalesorderheader $salesOrder
 */
class Salesorderdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'works_salesorderdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nextclean_date','sales_order_id', 'productcategory_id','productsubcategory_id', 'product_id', 'unit_price','instruction_id'], 'required'],
            [['sales_order_id','productcategory_id','productsubcategory_id', 'product_id','instruction_id'], 'integer'],
            [['nextclean_date'], 'safe'],
            [['cleaned'],'default','value'=>'Cleaned'],
            [['unit_price','paid','advance_payment','pre_payment','tip'], 'number','min'=>0.00,'max'=>1000.00],
            [['unit_price','paid','advance_payment','pre_payment','tip'], 'default','value' => 0.00],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['sales_order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Salesorderheader::className(), 'targetAttribute' => ['sales_order_id' => 'sales_order_id']],
          
        ];
    }

    public function attributeLabels()
    {
        return [
            'sales_order_id' => 'Daily Clean ID',
            'sales_order_detail_id' => 'House(s) to Clean ID',
            'result_id'=>'Result',
            'instruction_id'=>'What',
            'nextclean_date' => 'Next Clean Date',
            'productcategory_id' => 'Postcode',
            'productsubcategory_id'=>'Street',
            'product_id'=>'House',
            'product_id.homeowner' => 'Homeowner',
            'product_id.productnumber'=>'House Number',
            'unit_price' => 'Unit Price',
            'paid' => 'Paid',
            'advance_payment'=>'AdvPyt',
            'tip'=>'Tip',
            'pre_payment'=>'PrePyt',
            'modified_date' => 'Modified Date',
        ];
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
    
    public function getProductcategory()
    {
        return $this->hasOne(Productcategory::className(), ['id' => 'productcategory_id']);
    }

    public function getProductsubcategory()
    {
        return $this->hasOne(Productsubcategory::className(), ['id' => 'productsubcategory_id']);
    }
       
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalesOrder()
    {
        return $this->hasOne(Salesorderheader::className(), ['sales_order_id' => 'sales_order_id']);
    }
    
    public function getInstructioncode()
    {
        return $this->hasOne(Instruction::className(), ['id' => 'instruction_id']);
    }
    
    public function getResultcode()
    {
        return $this->hasOne(Result::className(), ['id' => 'result_id']);
    }
    
}
