<?php
namespace frontend\controllers;
use Yii;
use frontend\models\Company;
use frontend\models\Cost;
use frontend\models\Costdetail;
use frontend\models\Costsearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\Request;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\db\IntegrityException;
use kartik\mpdf\Pdf;
use kartik\grid\EditableColumnAction;
use yii\behaviors\TimestampBehavior;
use yii\filters\AccessControl;

class CostController extends Controller
{
    
    public function behaviors()
    {
        return [
                'verbs' => 
                            [
                            'class' => VerbFilter::className(),
                            'actions' =>    [
                                                'delete' => ['POST'],
                                            ],
                            ],
                'timestamp' => 
                            [
                            'class' => TimestampBehavior::className(),
                            'attributes' => [
                                                ActiveRecord::EVENT_BEFORE_INSERT => ['nextcost_date',
                                                'modified_date'],
                                                ActiveRecord::EVENT_BEFORE_UPDATE => ['modified_date'],
                                            ],
                            ],
                'access' => 
                            [
                            'class' => \yii\filters\AccessControl::className(),
                            'only' => ['create', 'update','view','delete','doit'],
                            'rules' => [
                            [
                              'allow' => true,
                              'verbs' => ['POST']
                            ],
                            [
                              'allow' => true,
                              'roles' => ['@'],
                            ],
                            ],
                            ],            
        ];
         
    }
    public function actionIndex()
    {
             
        $searchModel = new Costsearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort->sortParam = false;
        
        $dataProvider->setSort([
            'attributes' => [
                'costnumber' => [
                    'asc' => ['works_cost.costnumber' => SORT_ASC],
                    'desc' => ['works_cost.costnumber' => SORT_DESC],
                    'default' => SORT_ASC,
                ],
            ],
            'defaultOrder' => [
              'costnumber' => SORT_ASC,
            ]
          ]); 
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        
    }
    public function actionCreate()
    {
        if (!\Yii::$app->user->can('Create House')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to create a cost.');
        }
        $model = new Cost();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionView($id) {
        $model=$this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('kv-detail-success', 'Saved record successfully');
            return $this->redirect(['view', 'id'=>$model->id]);
        } else {
            return $this->render('view', ['model'=>$model]);
        }
    }
    public function actionDelete() {
        if (!\Yii::$app->user->can('Delete House')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to delete a cost.');
        }        
        try {
        $post = Yii::$app->request->post();
        if (Yii::$app->request->isAjax && isset($post['costdelete'])) {
            $id = $post['id'];
            if ($this->findModel($id)->delete()) {
                echo Json::encode([
                    'success' => true,
                    'messages' => [
                        'kv-detail-info' => 'The cost # ' . $id . ' was successfully deleted. <a href="' . 
                            Url::to(['/cost/index']) . '" class="btn btn-sm btn-info">' .
                            '<i class="glyphicon glyphicon-hand-right"></i>  Click here</a> to proceed.'
                    ]
                ]);
            } 
          }
       }
       catch (\Exception $e)
       {
                echo Json::encode([
                    'success' => false,
                    'messages' => [
                        'kv-detail-error' => 'Cannot delete the cost # ' . $id . '. It exists on Daily Cost'
                      . 'schedule(s) already. Delete this cost on these Daily Cost Schedules first please.'
                    ]
                ]);
       }
   } 
   public function actionDoit()
   {
      //corder is the dropdownbox specific date's (w59:cost/index) cost header id
      $dailycost_id = Yii::$app->request->get('ccost');
      $keylist = Yii::$app->request->get('keylist');
      //work through the costs that have been selected to be copied
      foreach ($keylist as $key => $value)
      {
                    $model = Cost::findOne($value);
                    //prevent cost duplicates
                    $q = new Query();
                    if  ($q->select('*')->from('works_costdetail')->where(['cost_header_id' => $dailycost_id])->andWhere(['cost_id'=>$value])->exists()) 
                          {
                            //ignore if the house already exists as a salesorderdetail on the sales order
                          }
                          else {
                    $model2 = new Costdetail();
                    //the sales order id for the specific daily clean that we are copying to
                    $model2->cost_header_id = $dailycost_id;
                    if ($model->frequency == "Daily")
                    {
                            $date = strtotime("+1 day");
                            $addeddate = date("Y-m-d" , $date);
                            $model2->nextcost_date = $addeddate;
                    };
                    if ($model->frequency == "Weekly")
                    {
                            $date = strtotime("+7 day");
                            $addeddate = date("Y-m-d" , $date);
                            $model2->nextcost_date = $addeddate;
                    };
                    if ($model->frequency == "Monthly")
                        {
                           $date = strtotime("+30 day");
                           $addeddate = date("Y-m-d" , $date);
                           $model2->nextcost_date = $addeddate;
                        };
                    if ($model->frequency == "Fortnightly")
                        {
                           $date = strtotime("+15 day");
                           $addeddate = date("Y-m-d" , $date);
                           $model2->nextcost_date = $addeddate;
                        };
                    if ($model->frequency == "Every two months")
                        {
                           $date = strtotime("+60 day");
                           $addeddate = date("Y-m-d" , $date);
                           $model2->nextcost_date = $addeddate;
                        }; 
                    if ($model->frequency == "Other")
                        {
                           $model2->nextcost_date = date("Y-m-d"); 
                        };     
                    $model2->order_qty=1;
                    $model2->unit_price = $model->listprice;
                    $model2->line_total = $model2->unit_price;
                    $model2->cost_id = $value;
                    $model2->paid = 0;
                    $model2->costcategory_id = $model->costcategory_id;
                    $model2->costsubcategory_id = $model->costsubcategory_id;
                    $model2->save();
                    }
      }
        
    }
    
    
    
    protected function findModel($id)
    {
        if (($model = Cost::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}