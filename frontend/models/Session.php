<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "session".
 *
 * @property string $id
 * @property int $expire
 * @property resource $data
 * @property int $user_id
 * @property string $db
 * @property string $gc_rid
 */
class Session extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    
    
    
    public static function tableName()
    {
        return 'session';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'data'], 'required'],
            [['expire', 'user_id'], 'integer'],
            [['data'], 'string'],
            [['id'], 'string', 'max' => 40],
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
            'expire' => 'Expire',
            'data' => 'Data',
            'user_id' => 'User ID',
            'db' => 'Db',
            'gc_rid' => 'Gc Rid',
        ];
    }
}
