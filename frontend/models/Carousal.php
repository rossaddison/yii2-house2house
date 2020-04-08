<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;

class Carousal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public $image;

    
   public static function getDb()
   {
       return \frontend\components\Utilities::userdb();
   }
    
    
    public static function tableName()
    {
        return 'works_carousal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image'], 'safe'],
            [['fontcolor'],'string','max' => 20],
            [['image_source_filename','image_web_filename','content_alt', 'content_title', 'content_caption'], 'string', 'max' => 255],
            [['image'], 'file','skipOnEmpty' => true, 'maxSize' => 2000000,'tooBig' => 'The picture cannot be larger than 2MB.', 'extensions'=>'jpg, gif, png, pdf, xls, xlsx, ods,odt, docx,doc','wrongExtension' => 'The file must be a JPG, GIF, PNG, PDF, XLS, XLSX, ODS,ODT, DOCX, DOC'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_source_filename' => 'Client-side Filename eg. joe20190304_1.jpg',
            'image_web_filename' => 'Server-side Filename',
            'content_alt' => 'Content Alt',
            'content_title' => 'Content Title',
            'content_caption' => 'Content Caption',
        ];
    }
    
    
    
    
    
}
