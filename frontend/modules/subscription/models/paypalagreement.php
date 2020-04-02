<?php

namespace frontend\modules\subscription\models;

use Yii;


/**
 * This is the model class for table "paypal_agreement".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $agreement_id
 * @property string $agreementplan_id
 * @property int $quantity
 * @property string $end_at
 * @property string $created_at
 * @property string $updated_at
 * @property string $suspended_at
 * @property string $terminated_at
 * @property string $reactivated_at
 */
class paypalagreement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function getDb()
   {
       return \Yii::$app->db; 
   }
    
    
    
    public static function tableName()
    {
        return 'paypal_agreement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id','agreement_id','quantity'], 'required'],
            [['user_id', 'quantity'], 'integer'],
            [['end_at', 'created_at','executed_at', 'updated_at', 'suspended_at', 'terminated_at', 'reactivated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'agreement_id' => 'Agreement ID',
            'quantity' => 'Quantity',
            'end_at' => 'End At',
            'created_at' => 'Created At',
            'executed_at' => 'Executed At',
            'updated_at' => 'Updated At',
            'suspended_at' => 'Suspended At',
            'terminated_at' => 'Terminated At',
            'reactivated_at' => 'Reactivated At',
        ];
    }
}
