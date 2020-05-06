<?php
namespace frontend\controllers;

use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use frontend\models\Sourced;
use frontend\models\Translated;
use frontend\models\Company;
use frontend\models\TranslatedSearch;
use Google\Cloud\Translate\V3\TranslationServiceClient;
use yii\helpers\Json;
use yii\helpers\FileHelper;
use Yii;

class TranslatedController extends \yii\web\Controller
{
    public $google_get_service_account_url = "https://console.cloud.google.com/apis/credentials/serviceaccountkey";
    public $ssl_get_cacert_pem_url ="http://curl.haxx.se/ca/cacert.pem";
        
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                   // 'delete' => ['POST'],
                ],
            ],
           'access' => 
                            [
                            'class' => \yii\filters\AccessControl::className(),
                            'only' => ['index','translated'],
                            'rules' => [
                            [
                              'allow' => true,
                              'roles' => ['admin','support'],
                            ],
                            [
                              'allow' => false,
                              'roles' => ['?'],
                            ],  
                            [
                              'allow' => true,
                              'verbs' => ['POST']
                            ],  
                            ],
            ], 
        ];
    }   
    
    public function actionIndex()
    {
        if (!\Yii::$app->user->can('Google Translate')) {
            throw new \yii\web\ForbiddenHttpException(Yii::t('app','You do not have permission to translate this package into a language of your choice. Ask your Administrator for the Google Translate permission and you will be able to multi select which sentences you want Google to translate. '));
        }
        
        $minPhpVersion = version_compare(PHP_VERSION, '7.1.0') >= 0; 
        $path_and_filename = trim(Company::findOne(1)->google_translate_json_filename_and_path,'"');
        putenv("GOOGLE_APPLICATION_CREDENTIALS=$path_and_filename");
                
        if (empty($path_and_filename)){
            throw new \yii\web\ForbiddenHttpException(Yii::t('app','You have not setup the filename and path of your JSON file that you downloaded from Google Translate (under your service account) in Company...Setting. Download the JSON file and put its path/filename under Company...Settings including double quotes and forward slashes. If you have not setup a service account setup key ').$google_get_service_account_url); 
        }
            
        if (!file_exists($path_and_filename)){
            throw new\yii\web\ForbiddenHttpException(Yii::t('app', 'Your Google Translate Credential Json file that you downloaded from your Google Translate Service Account does not exist at the path that you specified under Company ... Settings. Ensure that you have double quotes and forward slashes.'));
        }
        
        !empty(ini_get('curl.cainfo')) ?  $curlcertificate = true : $curlcertificate = false;
        
        if ($curlcertificate == false) {
            throw new \yii\web\ForbiddenHttpException(Yii::t('app', 'Your SSL certificate cacert.pem for this version of PHP {0} does not exist under the server php directory  ...bin/php/{0}', [PHP_VERSION]).Html::a(Yii::t(' .Download here '),['url'=>$ssl_get_cacert_pem_url]));        
        }
        
        $searchModel = new TranslatedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=100;
        $dataProvider->sort->sortParam = false;
        $dataProvider->setSort([
            'attributes' => [
                'id' => [
                    'asc' => ['id' => SORT_ASC,
                              'translation' => SORT_ASC
                             ],
                    'desc' => ['id' => SORT_DESC,
                               'translation' => SORT_DESC
                              ],
                    'default' => SORT_DESC,
                ],
            ],
            'defaultOrder' => [
              'id' => SORT_DESC,
            ]
          ]); 
        
        if (Yii::$app->request->post('hasEditable')) {
        $editablekey = Yii::$app->request->post('editableKey');
        $model = Translated::findOne($editablekey);
        //$out = Json::encode(['output'=>'', 'message'=>'']);
        //$post = [];
        $posted = current($_POST['Translated']);
        //$post = ['Translated' => $posted];
        if ($model->load($post)) {
            $model->save();
        }
        $output = '';
        return Json::encode(['output'=> $output, 'message'=>'']);
       }
        
        return $this->render(
            'index',
            [
                'minPhpVersion' => $minPhpVersion,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'google_credential_file' =>$path_and_filename,
                'curlcertificate'=>$curlcertificate,
            ]
        );
    }
    
    public function actionTranslated()
    {
     //https://cloud.google.com/docs/authentication/production#windows
     try {
        $keylist = Yii::$app->request->get('keylist');
        $path_and_filename = trim(Company::findOne(1)->google_translate_json_filename_and_path,'"');
        $data = file_get_contents (FileHelper::normalizePath($path_and_filename));
        $json = Json::decode($data, true);
        $projectId = $json['project_id']; 
        putenv("GOOGLE_APPLICATION_CREDENTIALS=$path_and_filename");
        foreach ($keylist as $key => $value) 
        {    
            $idvalue = $keylist[$key]['id'];
            //table source_message
            //table source_message has fields id, category, and message
            $sourced_message = Sourced::findOne($idvalue);
            $sourced_id = $sourced_message->id;
            //$sourced_category = $sourced_message->category;
            $sourced_for_translation = $sourced_message->message;
            
            //table message id corresponds to id in source_message
            //language code filled from @frontend/messages/template.php languages setting.
            //table messages has fields id, language, translation
            $translated = Translated::findOne($idvalue);
            $translated_language = $translated->language;
                                    
            $targetLanguageCode = $translated_language;
            $translationServiceClient = new TranslationServiceClient();
            
            $contents = [$sourced_for_translation];        
            $formattedParent = $translationServiceClient->locationName($projectId, 'global');
           
            $response = $translationServiceClient->translateText(
                    $contents, 
                    $targetLanguageCode, 
                    $formattedParent,
                   // ['model' => null, 'sourceLanguageCode' => 'en', 'mimeType' => 'text/plain']
            );
           
            foreach ($response->getTranslations() as $translation) {
                 $translated->translation = $translation->getTranslatedText();
                 $translated->save();
            }
            $translationServiceClient->close();
       }//foreach
               
       } catch (\ErrorException $e) {
             throw new ForbiddenHttpException($e);
       }//
    } //public function actionTranslated()
} //class
