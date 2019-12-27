<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Legal;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * LegalController implements the CRUD actions for Legal model.
 */
class LegalController extends Controller
{
    /**
     * {@inheritdoc}
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
             'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create','update','delete'],
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['index', 'view','create','update','delete'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index','view','create','update','delete'],
                        'roles' => ['@'],
                    ],
                    
                  
                ],
            ],
             'timestamp' => 
                            [
                            'class' => TimestampBehavior::className(),
                            'attributes' => [
                                                ActiveRecord::EVENT_BEFORE_INSERT => [
                                                'last_updated'],
                                                ActiveRecord::EVENT_BEFORE_UPDATE => ['last_updated'],
                                            ],
                            ],
        ];
    }

    /**
     * Lists all Legal models.
     * @return mixed
     */
    public function actionIndex()
    {
         if (!\Yii::$app->user->can('Create Legal')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission.');
        }        
        
        $dataProvider = new ActiveDataProvider([
            'query' => Legal::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Legal model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
         if (!\Yii::$app->user->can('Create Legal')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission.');
        }    
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Legal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         if (!\Yii::$app->user->can('Create Legal')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission.');
        }           
        
        $model = new Legal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Legal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
         if (!\Yii::$app->user->can('Create Legal')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission.');
        }            
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Legal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
         if (!\Yii::$app->user->can('Create Legal')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission.');
        }    
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Legal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Legal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Legal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
