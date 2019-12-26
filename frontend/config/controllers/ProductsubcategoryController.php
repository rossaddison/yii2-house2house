<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Productsubcategory;
use frontend\models\ProductsubcategorySearch;
use yii\web\Controller;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductsubcategoryController implements the CRUD actions for Productsubcategory model.
 */
class ProductsubcategoryController extends Controller
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
                            'only' => ['index','create','view', 'update','delete'],
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
     * Lists all Productsubcategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        
            $searchModel = new ProductsubcategorySearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->sort->sortParam = false;
            $dataProvider->setSort([
            'attributes' => [
                'sort_order' => [
                    'asc' => ['sort_order' => SORT_ASC],
                    'desc' => ['sort_order' => SORT_DESC],
                    'default' => SORT_ASC,
                ], 
                'productcategory_id' => [
                    'asc' => ['productcategory_id' => SORT_ASC],
                    'desc' => ['productcategory_id' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
            ],
            'defaultOrder' => [
              'sort_order'=> SORT_ASC,
            ]
          ]);
            
     if (Yii::$app->request->post('hasEditable')) {
        $sequence = Yii::$app->request->post('editableKey');
        $model = Productsubcategory::findOne($sequence);

        // store a default json response as desired by editable
        $out = Json::encode(['output'=>'', 'message'=>'']);

        // fetch the first entry in posted data (there should only be one entry 
        // anyway in this array for an editable submission)
        // - $posted is the posted data for Model without any indexes
        // - $post is the converted array for single model validation
        $posted = current($_POST['Productsubcategory']);
        $post = ['Productsubcategory' => $posted];

        // load model like any single model validation
        if ($model->load($post)) {
        // can save model or do something before saving model
        $model->save();
        }
        // custom output to return to be displayed as the editable grid cell
        // data. Normally this is empty - whereby whatever value is edited by
        // in the input by user is updated automatically.
        $output = '';


        if (isset($posted['sort_order'])) {
          $output = Yii::$app->formatter->asDecimal($model->sort_order, 0);
        }
        
        
        $out = Json::encode(['output'=>$output, 'message'=>'']);
     
        // return ajax json encoded response and exit
        echo $out;
        return;
     }
        
        /////////////////////////////////////
        $searchModel = new ProductsubcategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Productsubcategory model.
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
     * Creates a new Productsubcategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!\Yii::$app->user->can('Create Street')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to create a street.');
        }
        
        $model = new Productsubcategory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Productsubcategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (!\Yii::$app->user->can('Update Street')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to update a street.');
        }
        
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Productsubcategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (!\Yii::$app->user->can('Delete Street')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to delete a street.');
        }
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Productsubcategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Productsubcategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Productsubcategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
