<?php
namespace frontend\modules\installer\components;

use Yii;
use yii\base\ActionFilter;

class InstallerFilter extends ActionFilter
{
    public function beforeAction($action)
    {
        $sessionHelper = Yii::$app->get('sessionHelper');
        Yii::$app->language = $sessionHelper->get('language', 'en');

        return true;
    }
}