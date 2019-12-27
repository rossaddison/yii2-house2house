<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "works_quicknote".
 *
 * @property int $id
 * @property string $note
 * @property string|null $created_at
 * @property string $modified_at
 */
class Quicknote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'works_quicknote';
    }
    
    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
   {
       return \frontend\components\Utilities::userdb();
   }  

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['note'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['note'], 'string', 'max' => 5000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'note' => 'Note',
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
        ];
    }
}
