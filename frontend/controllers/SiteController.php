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
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Productsubcategory;
use frontend\models\Productcategory;
use frontend\models\Product;
use frontend\models\Company;
use frontend\models\Sessiondetail;
use frontend\components\Utilities;
use Yii\helpers\BaseUrl;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\helpers\Json;
use yii\helpers\Html;
use yii\web\ErrorAction;
use \SEOstats\Services as SEOstats;
use yii\web\JqueryAsset;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;
use PayPal\Api\CreditCard as CreditCard;
use PayPal\Exception\PaypalConnectionException as PaypalConnectionException;



class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup','gocardlesscustomercreated'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','gocardlesscustomercreated'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionGocardlesscustomercreated($redirect_flow_id)
    {
        //customer passback retrieve details
        $redirectflowid = Sessiondetail::find()->where(['=','redirect_flow_id',$redirect_flow_id])->one();
        $redirectflowid->customer_approved = 1;
        $redirectflowid->save();
        return $this->render('gocardlesscustomercreated');
    }
    
    public static function getSubCatList($postalcode_id) {
       //find all the streets in the postal area 
        $data=\frontend\models\Productsubcategory::find()
       ->where(['productcategory_id'=>$postalcode_id])
       ->select(['id','name AS name'])->asArray()->orderBy('name')->all();
       return $data;
       
    }
    
    public static function getSubCatCostList($postalcode_id) {
       //find all the streets in the postal area 
        $data=\frontend\models\Costsubcategory::find()
       ->where(['costcategory_id'=>$postalcode_id])
       ->select(['id','name AS name'])->asArray()->orderBy('name')->all();
       return $data;
       
    }
    
    public static function getSubCatListb($postalcode_id) {
       //find all the streets in the postal area 
        $data=\frontend\models\Productsubcategory::find()
       ->where(['productcategory_id'=>$postalcode_id])
       ->select(['id'])->asArray()->all();
       return $data;
       
    }
    
    public static function getProdList($cat_id, $sub_id) {
        
        $data = [];
        $data=\frontend\models\Product::find()
       ->where(['productcategory_id'=>$cat_id])
       ->andWhere(['productsubcategory_id'=>$sub_id])
       ->select(['id','name'])->asArray()->orderBy('name')->all();
       return $data;
       
    }
    
    public static function getProdListb($cat_id, $subcat_id) {
        //find all the houses in the street
        $data = [];
        $data=\frontend\models\Product::find()
       ->where(['productcategory_id'=>$cat_id])
       ->andWhere(['productsubcategory_id'=>$subcat_id])      
       ->select(['id', 'productnumber AS name'])->asArray()->orderBy('name')->all();
       return $data;
       
    }
    
    public static function getCostListb($cat_id, $subcat_id) {
        //find all the houses in the street
        $data = [];
        $data=\frontend\models\Cost::find()
       ->where(['costcategory_id'=>$cat_id])
       ->andWhere(['costsubcategory_id'=>$subcat_id])      
       ->select(['id', 'costnumber AS name'])->asArray()->orderBy('name')->all();
       return $data;
       
    }
    
    public static function getProdListc($cat_id, $subcat_id) {
        //find all the houses in the street
        $data = 0;
        $data=\frontend\models\Product::find()
       ->where(['productcategory_id'=>$cat_id])
       ->andWhere(['productsubcategory_id'=>$subcat_id])      
       ->select(['id'])->count();
       return $data;
       
    }
    
    public function actionSubcat() 
    {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
            $out = self::getSubCatList($cat_id); 
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    
    public function actionSubcatcost() 
    {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $cat_id = $parents[0];
            $out = self::getSubCatCostList($cat_id); 
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    
    public function actionCos() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $ids = $_POST['depdrop_parents'];
        $cat_id = empty($ids[0]) ? null : $ids[0];
        $subcat_id = empty($ids[1]) ? null : $ids[1];
        if ($cat_id != null) {
            $out = self::getCostListb($cat_id,$subcat_id); 
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
           
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    
    public function actionProduc() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $ids = $_POST['depdrop_parents'];
        $cat_id = empty($ids[0]) ? null : $ids[0];
        $subcat_id = empty($ids[1]) ? null : $ids[1];
        if ($cat_id != null) {
            $out = self::getProdListb($cat_id,$subcat_id); 
            echo Json::encode(['output'=>$out, 'selected'=>'']);
            return;
           
        }
    }
    echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    //normally under D:\wamp29\www\advanced\web\vendor\yiisoft\yii2\views\errorHandler 
    //if errorHandler is set under config\main.php to site\error then 
    //You should now create a view file located at views/site/error.php. In this view file,
    //you can access the following variables if the error action is defined as yii\web\ErrorAction:
  
    public function actionError()
    {
    $exception = Yii::$app->errorHandler->exception;
    //if ($exception instanceof \yii\db\IntegrityException) {
    //    $message = 'NB: In order to delete a house you must make sure there is no house included in any Daily Clean. Delete this house in the Daily Clean first.';
    //    echo $message;
    //}
    if ($exception !== null) {
        return $this->render('error', ['exception' => $exception]);
    }
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    
    public function actionSeostats()
    {    
    try {
    $url = 'http://www.google.com/';

    // Create a new SEOstats instance.
    $seostats = new \SEOstats\SEOstats;

    // Bind the URL to the current SEOstats instance.
        if ($seostats->setUrl($url)) {
            echo SEOstats\Alexa::getGlobalRank();
            echo SEOstats\Google::getPageRank();
        }
    }
    catch (SEOstatsException $e) {
    die($e->getMessage());
    }
   }
   
   public function actionGoogleanalytics()
   {
       return $this->render('googleanalytics');       
   }
   
   public function actionSitemessage()
   {
       $cfirstname = Yii::$app->request->get('custfirstname');
       $cmobile = Yii::$app->request->get('custmobile');
       if (!empty($cfirstname) & !empty($cmobile) & (strlen($cmobile)==15))
       {
            $twilioService = Yii::$app->Yii2Twilio->initTwilio();
            try {
                date_default_timezone_set("Europe/London");
                $date = date('d/m/Y h:i:s a', time());
                $completemessage = $date. " Hi ". $cfirstname .", Window Clean Request: " .$cmobile;
                $message = $twilioService->account->messages->create(
                "+44" .substr($cmobile,1), // To a number that you want to send sms
                            array(
                                "from" => "+441315103755",   // From a number that you are sending
                                "body" => $completemessage, 
                            ));
                           } catch (\Twilio\Exceptions\RestException $e) {
                                echo $e->getMessage();
                                var_dump($e->getMessage());
                           }
       }
   }
   
   public function actionPayments()
    {
        return $this->render('payments');
    }
   
   public function actionMakepayfffents() 
   { 
    $card = new \PayPal\Api\CreditCard;
    $card->setType('visa')
      ->setNumber('4111111111111111')
      ->setExpireMonth('06')
      ->setExpireYear('2018')
      ->setCvv2('782')
      ->setFirstName('Richie')
      ->setLastName('Richardson');

    try {
      $card->create(Yii::$app->Yii2Paypal->getContext());
      // ...and for debugging purposes
      echo '<pre>';
      var_dump($card);
      //echo $card;
    } catch (PaypalConnectionException $e) {
      echo '<pre>';
      var_dump($e);
      //echo $e;
    }

  
//return $this->render('makepayments');
  }
  
  public function actionReceived()
  {
      return $this->render('received');
  }

  public function actionCancelled()
  {
      return $this->render('cancelled');
  }

  public function actionMigrateDemoUp()
  {
    ob_start();
    defined('STDIN') or define('STDIN', fopen('php://input', 'r'));
    defined('STDOUT') or define('STDOUT', fopen('php://output', 'w'));
    defined('STDERR') or define('STDERR', fopen('php://stderr', 'w'));
    $oldApp = \Yii::$app;
    // Load Console Application config
    $config = yii\helpers\ArrayHelper::merge(
    //migration namespaces
    require \Yii::getAlias('@console'). '/config/main.php',    
    //vendor path components ...rbac
    require \Yii::getAlias('@common').'/config/main.php',
    //database
    require (dirname(dirname(__DIR__)) .dirname(Yii::$app->urlManager->baseUrl). '/config/main-local.php'));    
    $runner = new \yii\console\Application($config);
    $runner->runAction('migrate/up',['db'=>'demo','interactive' => 0,'migrationPath'=>'@frontend/migrations/demo']);
    fclose(\STDOUT);
    fclose(\STDIN);
    fclose(\STDERR);
    \Yii::$app = $oldApp;
    return ob_get_clean();
  }
  
  public function actionPrivacypolicy()
  {
      return $this->render('privacypolicy');
  }
  
  public function actionMaintenance()
  {
      return $this->render('maintenance');
  }

    
}
