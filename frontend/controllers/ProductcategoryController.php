<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Productcategory;
use frontend\models\ProductcategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductcategoryController implements the CRUD actions for Productcategory model.
 */
class ProductcategoryController extends Controller
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
                            'only' => ['view','create', 'update','delete'],
                            'rules' => [
                            [
                              'allow' => true,
                              'roles' => ['@'],
                            ],
                            ],
            ], 
              
        ];
    }

    /**
     * Lists all Productcategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductcategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Productcategory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
       // if(!Yii::$app->user->isGuest) 
       //{ 
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
       //}
       //else {
       //     throw new NotFoundHttpException('You do not have permission to view.');
      // }
        
    }

    /**
     * Creates a new Productcategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
       //if(!Yii::$app->user->isGuest) 
       //{ 
           $model = new Productcategory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
       //}
       //else {
       //     throw new NotFoundHttpException('You do not have permission to create.');
       // }
    }

    /**
     * Updates an existing Productcategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
       // if(!Yii::$app->user->isGuest) 
       //{ 
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        //}
       //else {
       //     throw new NotFoundHttpException('You do not have permission to make adjustments.');
       // }
    }

    /**
     * Deletes an existing Productcategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
       // if(!Yii::$app->user->isGuest) 
       //{ 
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
        //}
       //else {
       //     throw new NotFoundHttpException('You do not have permission.');
       // }
    }

    /**
     * Finds the Productcategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Productcategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Productcategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
