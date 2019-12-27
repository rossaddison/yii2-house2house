<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;

class Importhouses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public $importfile;

    
   public static function getDb()
   {
       return \frontend\components\Utilities::userdb();
   }
    
    
    public static function tableName()
    {
        return 'works_importhouses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['importfile'], 'safe'],
            [['importfile_source_filename','importfile_web_filename'], 'string', 'max' => 255],
            [['importfile'], 'file','skipOnEmpty' => true, 'maxSize' => 2000000,'tooBig' => 'The import file cannot be larger than 2MB.', 'extensions'=>'xls, xlsx, ods','wrongExtension' => 'The file must be a XLS, XLSX or ODS.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'importfile_source_filename' => 'Client-side Filename',
            'importfile_web_filename' => 'Server-side Filename',
            'importfile' =>'Import File'
        ];
    }
    
    
    
    
    
}
