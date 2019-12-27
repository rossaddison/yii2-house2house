<?php

namespace frontend\models;

use frontend\models\Costheader;
use frontend\models\Productcategory;
use frontend\models\Productsubcategory;
use frontend\models\Product;
use frontend\models\Tax;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\db\Query;
use Yii;

class Costdetail extends \yii\db\ActiveRecord
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
        return 'works_costdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nextcost_date','cost_header_id', 'costcategory_id','costsubcategory_id', 'cost_id', 'unit_price'], 'required'],
            [['cost_header_id','costcategory_id','costsubcategory_id', 'cost_id'], 'integer'],
            [['nextcost_date'], 'safe'],
            //[['cleaned'],'default','value'=>'Cleaned'],
            //[['nextclean_date'], 'default','value'=>null],
            //[['nextclean_date'],'date','format' => 'php:F d Y'],
            [['order_qty'],'default','value'=>1],
            [['line_total'],'default','value'=>1],
            //[['paid'],'default','value'=>0.00],
            [['order_qty'], 'number'],
            [['unit_price','paid'], 'number','min'=>0.00,'max'=>1000.00],
            [['unit_price','paid','order_qty'], 'default','value' => 0.00],
            [['cost_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cost::className(), 'targetAttribute' => ['cost_id' => 'id']],
            [['cost_header_id'], 'exist', 'skipOnError' => true, 'targetClass' => Costheader::className(), 'targetAttribute' => ['cost_header_id' => 'cost_header_id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'cost_header_id' => 'Daily Cost ID',
            'cost_detail_id' => 'Cost(s) in Clean ID',
            'nextcost_date' => 'Next Cost Date',
            'costcategory_id' => 'Costcode',
            'costsubcategory_id'=>'Costsubcode',
            'cost_id'=>'Cost',
            'cost_id.costdescription' => 'Cost Description',
            'cost_id.costnumber'=>'Cost Number',
            'order_qty'=>'Order Qty',
            'unit_price' => 'Unit Price',
            'line_total'=> 'Line Total',
            'paid' => 'Paid',
            'modified_date' => 'Modified Date',
        ];
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCost()
    {
        return $this->hasOne(Cost::className(), ['id' => 'cost_id']);
    }
    
    public function getCostcategory()
    {
        return $this->hasOne(Costcategory::className(), ['id' => 'costcategory_id']);
    }

    public function getCostsubcategory()
    {
        return $this->hasOne(Costsubcategory::className(), ['id' => 'costsubcategory_id']);
    }
       
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCostHeader()
    {
        return $this->hasOne(Costheader::className(), ['cost_header_id' => 'cost_header_id']);
    }
    
   
    
    
    
}
