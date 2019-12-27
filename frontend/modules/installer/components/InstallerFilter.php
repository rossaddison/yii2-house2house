<?php

namespace frontend\modules\installer\components;

use Yii;
use yii\base\ActionFilter;
use yii\web\ForbiddenHttpException;

class InstallerFilter extends ActionFilter
{
    public function beforeAction($action)
    {
        //if (file_get_contents(Yii::getAlias('@installer/installed.mark'))==='1') {
        //    throw new ForbiddenHttpException("Installer is already installed");
        //}
        /**
         * @var $sessionHelper SessionHelper
         */
        $sessionHelper = Yii::$app->get('sessionHelper');
        Yii::$app->language = $sessionHelper->get('language', 'en');

        return true;
    }
}