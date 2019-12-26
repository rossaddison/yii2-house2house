<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use frontend\models\Carousal;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CarousalController implements the CRUD actions for Carousal model.
 */
class CarousalController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
           'access' => 
                            [
                            'class' => \yii\filters\AccessControl::className(),
                            'only' => ['index','create', 'update','delete','view'],
                            'rules' => [
                            [
                              'allow' => true,
                              'roles' => ['@'],
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

    /**
     * Lists all Carousal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Carousal::find(),
        ]);
        //Yii::$app->params['uploadPath'] = Yii::getAlias('@app\images');
        //Yii::$app->params['uploadUrl'] = Yii::base();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Carousal model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Carousal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
        {
           if (!\Yii::$app->user->can('Create Carousal')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to create a carousal.');
           }
        
          $model = new Carousal();
          if ($model->load(Yii::$app->request->post())) {
              $uploadedFile = UploadedFile::getInstance($model, 'image');
              if (!is_null($uploadedFile)) {
                    $model->image_source_filename = $uploadedFile->name;
                    $model->image_web_filename = Yii::$app->security->generateRandomString().".".$uploadedFile->extension;
                    if ($model->validate()) {                
                        Yii::$app->params['uploadPath'] = dirname(Yii::$app->basePath) .'\images';
                        ///dont forget to change actionUpdate as well
                        ///Yii::$app->params['uploadPath'] = Yii::$app->basePath .'\web\images';
                        $path = Yii::$app->params['uploadPath'] .'/'. $model->image_web_filename;   
                        $uploadedFile->saveAs($path); 
                    }                   
                  }
                if ($model->save())
                    {
                      return $this->redirect(['view', 'id' => $model->id]);
                    }
                    
      }
      return $this->render('create', ['model' => $model,
        ]);
      }
    
   public function actionUpdate($id)
        {
          if (!\Yii::$app->user->can('Update Carousal')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to update the carousal.');
          }
                 
          $model = $this->findModel($id);
          if ($model->load(Yii::$app->request->post())) {
              $uploadedFile = UploadedFile::getInstance($model, 'image');
              if (!is_null($uploadedFile)) {
                    $model->image_source_filename = $uploadedFile->name;
                    $model->image_web_filename = Yii::$app->security->generateRandomString().".".$uploadedFile->extension;
                    if ($model->validate()) {
                        Yii::$app->params['uploadPath'] = dirname(Yii::$app->basePath) .'\images';
                        //Yii::$app->params['uploadPath'] = Yii::$app->basePath .'\web\images';
                        $path = Yii::$app->params['uploadPath'] .'/'. $model->image_web_filename;   
                        $uploadedFile->saveAs($path); 
                    }                   
                  }
                if ($model->save())
                    {
                      return $this->redirect(['view', 'id' => $model->id]);
                    }
                    
      }
      return $this->render('create', ['model' => $model,
        ]);
    }   
      
    protected function findModel($id)
    {
        if (($model = Carousal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionDelete($id)
    {
        if (!\Yii::$app->user->can('Delete Carousal')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to delete a carousal.');
        }
        
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
}
