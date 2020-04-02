<?php
Namespace frontend\modules\subscription\components;
    
use Yii;
use yii\base\Component;
use frontend\modules\subscription\models\paypalagreement;
use frontend\modules\subscription\components\Configpaypal;
use yii\db\Expression;
    
class Tools extends Component
{
public static function getAgreement_id()
{
    $agreement_id = "";
    $db = \Yii::$app->db;
    $all = paypalagreement::find()
    ->where(['user_id'=>Yii::$app->user->id]) 
    //the subscription has not been terminated
    ->andWhere(['terminated_at' => NULL])
    //the subscription has been created
    ->andWhere(['NOT',['created_at'=>null]])
    //the subscription has been approved by user and redirected to us
    ->andwhere(['NOT',['executed_at'=>null]])    
    //->Andwhere(['>','end_at',date('Y-m-d H:i:s', time())])
    //->orderBy('agreement_id')
    ->all($db);
    
    //go to the last record in the array
    foreach ($all as $key => $value)
    {
      $agreement_id = $all[$key]['agreement_id']; 
    }
    
    return $agreement_id;
} 

//check if the subscription exists whether active or suspended
public static function paypal_subscription_active_or_suspended_or_notexist()
{
    //get the agreement id from the default 'db' database
    $agreement_id = \frontend\modules\subscription\components\Tools::getAgreement_id();
    
    //https://stackoverflow.com/questions/29796329/how-to-use-not-null-condition-in-yii2
    //$two = paypalagreement::find()->all();
    //check the state of the agreement by going to paypal 
    if (!empty( $agreement_id)) {
        //use the api to determine if subscription exists with paypal
        $newapicontext = new Configpaypal();
        $apiContext = $newapicontext->paypalconfig(); 
        $agreement = \PayPal\Api\Agreement::get($agreement_id, $apiContext);
        $state = \frontend\modules\subscription\components\Tools::displayRecursiveResults($agreement->toArray(),'state');
        //var_dump($state);
        //$status = \frontend\modules\subscription\components\Tools::displayRecursiveResults($agreement->getPayer()->toArray(),'status');
        //var_dump($status);
        //$a = $agreement->getLinks();
        //var_dump($a);
        //Yii::$app->session->setFlash('warning', 'Your one:' . var_dump($a));
        if (($state === 'Active')) return 1;
        if (($state === 'Suspended')) return 0;  
    } else {return 2;}
      
}

public static function setAgreement_cancelled($passed_agreement_id)
{
    $db = \Yii::$app->db;
    $all = paypalagreement::find()
    ->where(['user_id'=>Yii::$app->user->id]) 
    //the subscription has not been terminated
    ->andWhere(['terminated_at' => NULL])
    //the subscription has been created
    ->andWhere(['NOT',['created_at'=>null]])
    //the subscription has been approved by user and redirected to us
    ->andwhere(['NOT',['executed_at'=>null]]) 
    ->andwhere(['=','agreement_id',$passed_agreement_id])        
    //->Andwhere(['>','end_at',date('Y-m-d H:i:s', time())])
    //->orderBy('agreement_id')
    ->all($db);
    
    foreach ($all as $key => $value)
    {
      $agreement_id = $all[$key]['agreement_id']; 
    }
    
    $one = paypalagreement::find()
    ->where(['user_id'=>Yii::$app->user->id]) 
    ->andWhere(['agreement_id' => $agreement_id])  
    ->one($db);
    
    $one->terminated_at = new Expression('NOW()');
    $one->save();
    
}

public static function setAgreement_suspended($passed_agreement_id)
{
    $db = \Yii::$app->db;
    $all = paypalagreement::find()
    ->where(['user_id'=>Yii::$app->user->id]) 
    //the subscription has not been terminated
    ->andWhere(['terminated_at' => NULL])
    //the subscription has been created
    ->andWhere(['NOT',['created_at'=>null]])
    //the subscription has been approved by user and redirected to us
    ->andwhere(['NOT',['executed_at'=>null]]) 
    ->andwhere(['=','agreement_id',$passed_agreement_id])        
    //->Andwhere(['>','end_at',date('Y-m-d H:i:s', time())])
    //->orderBy('agreement_id')
    ->all($db);
    
    foreach ($all as $key => $value)
    {
      $agreement_id = $all[$key]['agreement_id']; 
    }
    
    $one = paypalagreement::find()
    ->where(['user_id'=>Yii::$app->user->id]) 
    ->andWhere(['agreement_id' => $agreement_id])  
    ->one($db);
    
    $one->suspended_at = new Expression('NOW()');
    $one->save();
    
}

public static function displayRecursiveResults($arrayObject,$searchkey) {
    foreach($arrayObject as $key => $data) {
        if(is_array($data)) {
            \frontend\modules\subscription\components\Tools::displayRecursiveResults($data,$searchkey);
        } elseif(is_object($data)) {
            \frontend\modules\subscription\components\Tools::displayRecursiveResults($data,$searchkey);
        } else {
            if ($key === $searchkey)
            return $data;
        }
    }
}

public function displayRecursiveResultsOriginal($arrayObject) {
    foreach($arrayObject as $key=>$data) {
        if(is_array($data)) {
            \frontend\modules\subscription\components\Utilities::displayRecursiveResultsOriginal($data);
        } elseif(is_object($data)) {
            \frontend\modules\subscription\components\Utilities::displayRecursiveResultsOriginal($data);
        } else {
            echo $key."  ".$data."<br />";
        }
    }
}

}








