<?php

namespace frontend\controllers;

use sjaakp\pluto\models\User;
use Yii;

class SubpayrecController extends \yii\web\Controller
{
    
    
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionCreatesub()
    {
         $creditCardToken = 'asdfadhadifadfav';
         $iduser = Yii::$app->user->id;
         $user = User::findOne($iduser);
         $user->newSubscription('kfcg', 'B')->create($creditCardToken);
         return $this->render('index');
    }

}
