<?php

namespace frontend\models;

use frontend\models\Session;
use Yii;

/**
 * This is the model class for table "session_detail".
 *
 * @property int $session_detail_id
 * @property string $session_id
 * @property string $redirect_flow_id
 * @property string $db
 * @property int $product_id
 */
class SessionDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'session_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['session_id', 'redirect_flow_id', 'db', 'product_id'], 'required'],
            [['product_id','user_id'], 'integer'],
            [['session_id'], 'string', 'max' => 40],
            [['redirect_flow_id', 'db'], 'string', 'max' => 50],
            [['customer_approved'],'default','value'=>0],
            [['administrator_acknowledged'],'default','value'=>0],
          ];  
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'session_detail_id' => 'Session Detail ID',
            'session_id' => 'Session ID',
            'redirect_flow_id' => 'Redirect Flow ID',
            'db' => 'Db',
            'user_id'=>'User ID',
            'product_id' => 'Product ID',
            'customer_approved'=>'Mandate Confirmed by Customer',
            'administrator_acknowledged'=> 'Acknowledged by Administrator',
        ];
    }
    
}
