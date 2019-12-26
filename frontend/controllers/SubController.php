<?php
namespace frontend\controllers;

use Yii;
use yii\db\IntegrityException;
use yii\db\ServerErrorHttpException;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;
use common\models\LoginForm;
use Yii\helpers\BaseUrl;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\helpers\Json;
use yii\helpers\Html;
use yii\web\ErrorAction;
use yii\web\JqueryAsset;




class SubController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['kenny'],
                'rules' => [
                    [
                        'actions' => ['kenny'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    public function actionKenny()
    {
        $url = Yii::$app->UrlManagerKenny->createAbsoluteUrl(['testuser1/web/']);
        return $this->render($url);
    }

    



    
}
