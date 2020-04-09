<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "works_paymentrequest".
 *
 * @property int $id
 * @property int $sales_order_detail_id
 * @property string $gc_payment_request_id
 * @property string $status
 * @property string $modified_date
 */
class Paymentrequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function getDb()
    {
       return \frontend\components\Utilities::userdb();
    } 
   
    public static function tableName()
    {
        return 'works_paymentrequest';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sales_order_detail_id', 'gc_payment_request_id', 'status'], 'required'],
            [['id', 'sales_order_detail_id'], 'integer'],
            [['modified_date'], 'safe'],
            [['gc_payment_request_id'], 'string', 'max' => 7],
            [['status'], 'string', 'max' => 25],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sales_order_detail_id' => 'Sales Order Detail ID',
            'gc_payment_request_id' => 'Gocardless Payment Request ID',
            'status' => 'Status',
            'modified_date' => 'Modified Date',
        ];
    }
}
