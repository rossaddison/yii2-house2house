<?php
namespace frontend\models;

use frontend\models\Costheader;
use frontend\models\Costcategory;
use frontend\models\Costsubcategory;
use frontend\models\Carousal;
use frontend\models\Cost;

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
            [['cost_header_id','costcategory_id','costsubcategory_id', 'cost_id','carousal_id'], 'integer'],
            [['nextcost_date'], 'safe'],
            [['order_qty'],'default','value'=>1],
            [['line_total'],'default','value'=>1],
            [['order_qty'], 'number'],
            [['unit_price','paid'], 'number','min'=>0.00,'max'=>10000.00],
            [['unit_price','paid','order_qty'], 'default','value' => 0.00],
            [['carousal_id'], 'default','value' => null],
            [['carousal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Carousal::className(), 'targetAttribute' => ['carousal_id' => 'id']],
            [['cost_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cost::className(), 'targetAttribute' => ['cost_id' => 'id']],
            [['cost_header_id'], 'exist', 'skipOnError' => true, 'targetClass' => Costheader::className(), 'targetAttribute' => ['cost_header_id' => 'cost_header_id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'cost_header_id' => 'Daily Cost ID',
            'cost_detail_id' => 'Cost(s) in Clean ID',
            'paymenttype'=> 'Payment Type eg. Cash, Debitcard, Creditcard, Other',
            'nextcost_date' => 'Next Cost Date',
            'costcategory_id' => 'Costcode',
            'costsubcategory_id'=>'Costsubcode',
            'cost_id'=>'Cost',
            'cost_id.costdescription' => 'Cost Description',
            'cost_id.costnumber'=>'Cost Number',
            'carousal_id' => 'Carousal File eg. jpg, png, pdf, xls, xlsx',
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
    
    public function getCostHeader()
    {
        return $this->hasOne(Costheader::className(), ['cost_header_id' => 'cost_header_id']);
    }
    
    public function getCarousal()
    {
        return $this->hasOne(Carousal::className(), ['id' => 'carousal_id']);
    }
    
   
    
    
    
}
