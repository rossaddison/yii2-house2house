<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Quicknote;
use frontend\models\QuicknoteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\filters\VerbFilter;

/**
 * QuicknoteController implements the CRUD actions for Quicknote model.
 */
class QuicknoteController extends Controller
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
            'timestamp' => 
                            [
                            'class' => TimestampBehavior::className(),
                            'attributes' => [
                                                ActiveRecord::EVENT_BEFORE_INSERT => ['created_at',
                                                'modified_at'],
                                                ActiveRecord::EVENT_BEFORE_UPDATE => ['modified_at'],
                                            ],
                            ],
        ];
    }

    /**
     * Lists all Quicknote models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuicknoteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;
        $dataProvider->sort->sortParam = false;
        $dataProvider->setSort([
            'attributes' => [
                'modified_at' => [
                    'asc' => ['modified_at' => SORT_ASC],
                    'desc' => ['modified_at' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
                'id' => [
                    'asc' => ['id' => SORT_ASC],
                    'desc' => ['id' => SORT_DESC],
                    'default' => SORT_DESC,
                ],
            ],
            'defaultOrder' => [
              'modified_at' => SORT_DESC,
            ]
          ]); 
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    
    

    /**
     * Displays a single Quicknote model.
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
     * Creates a new Quicknote model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Quicknote();
        if ($model->load(Yii::$app->request->post())) {
            $date = strtotime("+0 day");
            $addeddate = date('Y-m-d H:i:s', $date);
            $model->created_at = $addeddate;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Quicknote model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $date = strtotime("+0 day");
            $addeddate = date('Y-m-d H:i:s', $date);
            $model->modified_at = $addeddate;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Quicknote model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Quicknote model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Quicknote the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Quicknote::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
