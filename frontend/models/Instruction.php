<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "works_instruction".
 *
 * @property int $id
 * @property string $code
 * @property string $code_meaning
 * @property int $include
 * @property string $modified_date
 */
class Instruction extends \yii\db\ActiveRecord
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
        return 'works_instruction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code_meaning'], 'required'],
            [['id', 'include'], 'integer'],
            [['modified_date'], 'safe'],
            [['include'],'default','value'=>1],
            [['code'], 'string', 'max' => 10],
            [['code_meaning'], 'string', 'max' => 100],
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
            'code' => 'Code',
            'code_meaning' => 'Code Meaning',
            'include' => 'Include in Sales Order Detail Drop Down List',
            'modified_date' => 'Modified Date',
        ];
    }
}
