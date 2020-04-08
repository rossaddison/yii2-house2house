<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Messagelog;
use frontend\models\MessagelogSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MessagelogController implements the CRUD actions for Messagelog model.
 */
class MessagelogController extends Controller
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
                            'only' => ['index','create', 'update','view','delete'],
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
     * Lists all Messagelog models.
     * @return mixed
     */
    public function actionIndex()
    {
            $searchModel = new MessagelogSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->sort->sortParam = false;
            $dataProvider->setSort([
            'attributes' => [
                    'product_id.name' => [
                    'asc' => ['works_product.name' => SORT_ASC],
                    'desc' => ['works_product.name' => SORT_DESC],
                    'default' => SORT_ASC,
                 ],         
                    'salesorderdetail_id.sid' => [
                    'asc' => ['works_salesorderdetail.sales_order_detail_id' => SORT_ASC],
                    'desc' => ['works_salesorderdetail.sales_order_detail_id' => SORT_DESC],
                    'default' => SORT_ASC,
                 ],  
                
            ],
            'defaultOrder' => [
              'salesorderdetail_id.sid'=> SORT_DESC,  
              'product_id.name' => SORT_ASC,
            ]
          ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Messagelog model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Messagelog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!\Yii::$app->user->can('Create Messagelog')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to create a messagelog.');
        }        
        
        $model = new Messagelog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Messagelog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!\Yii::$app->user->can('Update Messagelog')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to update a messagelog.');
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
     * Deletes an existing Messagelog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!\Yii::$app->user->can('Delete Messagelog')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to delete a messagelog.');
        }        
        try{
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
        } catch(IntegrityException $e) {
              throw new \yii\web\HttpException(404, 'First delete the daily clean items this message was sent to then you will be able to delete this message.');
        }
    }

    /**
     * Finds the Messagelog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Messagelog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Messagelog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
