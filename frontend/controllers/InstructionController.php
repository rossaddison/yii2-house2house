<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Instruction;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\base\ErrorException;








/**
 * InstructionController implements the CRUD actions for Instruction model.
 */
class InstructionController extends Controller
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
                                                ActiveRecord::EVENT_BEFORE_INSERT => ['modified_date'],
                                                ActiveRecord::EVENT_BEFORE_UPDATE => ['modified_date'],
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
                              'allow' => true,
                              'verbs' => ['POST']
                            ],  
                            ],
            ], 
        ];
    }

    /**
     * Lists all Instruction models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!\Yii::$app->user->can('View Instruction')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to create an instruction.');
        }     
        
        $dataProvider = new ActiveDataProvider([
            'query' => Instruction::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Instruction model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (!\Yii::$app->user->can('View Instruction')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission.');
        }     
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Instruction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!\Yii::$app->user->can('Create Instruction')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to create an instruction.');
        }        
        
        $model = new Instruction();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Instruction model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!\Yii::$app->user->can('Update Instruction')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to create an instruction.');
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
     * Deletes an existing Instruction model.
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
     * Finds the Instruction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Instruction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Instruction::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
