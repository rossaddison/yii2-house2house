<?php
namespace frontend\models;

use Yii;
 
class KrajeeProductTree extends \kartik\tree\models\Tree
{
    public static function getDb()
    {
        return \frontend\components\Utilities::userdb();
    }
       
    public static function tableName()
    {
        return 'works_krajee_product_tree';
    }
    
    public function isDisabled()
    {
        if (!Yii::$app->user->can('Manage Basic')) {
            return true;
        }
        return parent::isDisabled();
    }
}
