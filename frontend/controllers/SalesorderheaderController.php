<?php

namespace frontend\controllers;

use Yii;
use yii\db\IntegrityException;
use yii\web\NotFoundHttpException;
use frontend\models\Salesorderheader;
use frontend\models\Product;
use frontend\models\Salesorderdetail;
use yii\helpers\Json;
use yii\helpers\VarDumper;
use frontend\models\SalesorderheaderSearch;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\helpers\Url;
use yii\behaviors\TimestampBehavior;
use yii\filters\VerbFilter;
use yii\base\ErrorException;


/**
 * SalesorderheaderController implements the CRUD actions for Salesorderheader model.
 */
class SalesorderheaderController extends Controller
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
                              'roles' => ['manager','user','admin'],
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
     * Lists all Salesorderheader models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SalesorderheaderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=5;
        $dataProvider->sort->sortParam = false;
        $dataProvider->setSort([
        'attributes' => [
            'sales_order_id' => [
                'asc' => ['sales_order_id' => SORT_ASC],
                'desc' => ['sales_order_id' => SORT_DESC],
                'default' => SORT_DESC,
            ],
            'clean_date' => [
                'asc' => ['clean_date' => SORT_ASC],
                'desc' => ['clean_date' => SORT_DESC],
                'default' => SORT_DESC,
            ],
            
        ],
        'defaultOrder' => [
            'clean_date' => SORT_DESC
        ]
    ]); 
        
        if (Yii::$app->request->post('hasEditable')) {
        $salesorderId = Yii::$app->request->post('editableKey');
        $model = Salesorderheader::findOne($salesorderId);

        // store a default json response as desired by editable
        $out = Json::encode(['output'=>'', 'message'=>'']);

        // fetch the first entry in posted data (there should only be one entry 
        // anyway in this array for an editable submission)
        // - $posted is the posted data for Book without any indexes
        // - $post is the converted array for single model validation
        $posted = current($_POST['Salesorderheader']);
        $post = ['Salesorderheader' => $posted];

        // load model like any single model validation
        if ($model->load($post)) {
        // can save model or do something before saving model
        $model->save();
        }
        // custom output to return to be displayed as the editable grid cell
        // data. Normally this is empty - whereby whatever value is edited by
        // in the input by user is updated automatically.
        $output = '';


        $out = Json::encode(['output'=>$output, 'message'=>'']);
     
        // return ajax json encoded response and exit
        echo $out;
        // this return below is critical otherwise you will get syntax error invalid character from the popover
        return;
       } //if (Yii::$app->request->post('hasEditable'))
       
        if (!\Yii::$app->user->can('View Daily Clean')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to view a daily clean.');
        }   
       
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,           
        ]);
        
    }

    /**
     * Displays a single Salesorderheader model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (!\Yii::$app->user->can('View Daily Clean')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to view a daily clean.');
        }     
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Salesorderheader model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!\Yii::$app->user->can('Create Daily Clean')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to create a daily clean.');
        }     
        $model = new Salesorderheader();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sales_order_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Salesorderheader model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (!\Yii::$app->user->can('Update Daily Clean')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to update a daily clean.');
        } 
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sales_order_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Salesorderheader model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (!\Yii::$app->user->can('Delete Daily Clean')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to delete a daily clean.');
        }        
        try{
	    $this->findModel($id)->delete();
            return $this->redirect(['index']);
	} catch(IntegrityException $e) {
              //Yii::warning('Delete cleans first under this clean.'); 
              throw new \yii\web\HttpException(404, 'You have individual cleans which you must delete first. Click on cleans and delete all of the individual cleans.');
        }
    }
    
  public function actionCopyticked($id)
   {
      if (!\Yii::$app->user->can('Update Daily Clean')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to copy the ticked step.');
      }
      $keylist = Yii::$app->request->get('keylist');
      foreach ($keylist as $key => $value)
      {
       //find the record of the $value checked item
       $model2 = Salesorderheader::findOne($value);
       $salesorderdetails = $model2->salesorderdetails;
       $model = new Salesorderheader();
       $model->status = $model2->status;
       $model->statusfile = $model2->statusfile;
       $model->employee_id = $model2->employee_id;
        if ($id == 1) { $model->clean_date = date('Y-m-d');}
        if ($id == 2)
        { 
            $date = $model2->clean_date;
            $addeddate = date('Y-m-d', strtotime($date. ' + 31 days'));
            $model->clean_date = $addeddate;
        }
        if ($id == 3)
        { 
            $date = $model2->clean_date;
            $addeddate = date('Y-m-d', strtotime($date. ' + 14 days'));
            $model->clean_date = $addeddate;
        }
        if ($id == 4)
        { 
            $date = $model2->clean_date;
            $addeddate = date('Y-m-d', strtotime($date. ' + 60 days'));
            $model->clean_date = $addeddate;
        }
        if ($id == 5)
        { 
            $date = $model2->clean_date;
            $addeddate = date('Y-m-d', strtotime($date. ' + 7 days'));
            $model->clean_date = $addeddate;
        }
       $model->sub_total = 0;
       $model->tax_amt=0;
       $model->total_due=0;
       //save the record to generate a new sales order id
       $model->save();
       //find the last record's sales_order_id just saved
       //Yii::$app->session['salesoid'] = $model->sales_order_id; 
       foreach ($salesorderdetails as $key => $value)
       {
           $model3= new Salesorderdetail();
           $model3->sales_order_id = $model->sales_order_id;
           $model3->cleaned = "Not Cleaned";
           $product_id = $salesorderdetails[$key]['product_id'];
           $found = Product::find()->where(['id'=>$product_id])->one();
           if ($found->frequency == "Weekly")
            {
                    $date = strtotime("+7 day");
                    $addeddate = date("Y-m-d" , $date);
                    $model3->nextclean_date = $addeddate;
            };
            if ($found->frequency == "Monthly")
                {
                   $date = strtotime("+30 day");
                   $addeddate = date("Y-m-d" , $date);
                   $model3->nextclean_date = $addeddate;
                };
            if ($found->frequency == "Fortnightly")
                {
                   $date = strtotime("+15 day");
                   $addeddate = date("Y-m-d" , $date);
                   $model3->nextclean_date = $addeddate;
                };
            if ($found->frequency == "Every two months")
                {
                   $date = strtotime("+60 day");
                   $addeddate = date("Y-m-d" , $date);
                   $model3->nextclean_date = $addeddate;
                }; 
           if ($found->frequency == "Not applicable")
                {
                   $model3->nextclean_date = date("Y-m-d"); 
                };          
           $model3->productcategory_id = $salesorderdetails[$key]['productcategory_id'];
           $model3->productsubcategory_id =$salesorderdetails[$key]['productsubcategory_id'];
           $model3->product_id =$salesorderdetails[$key]['product_id'];
           $model3->unit_price =$salesorderdetails[$key]['unit_price'];
           $model3->paid =0;
           $model3->save();
       }       
     };
     Yii::$app->session->setFlash('success',"Those daily cleans that were checked or ticked have been copied. Modify the date as necessary.");
     //return $this->render('index');
   }
    //public function actionAllmonthsrevenue()
    public function actionTotalannualrevenue($id)
    {
        if (!\Yii::$app->user->can('Update Daily Clean')) {
            throw new \yii\web\ForbiddenHttpException('You do not have permission to copy the ticked step.');
        }
        $sorderyear = $id;
        $months =[];
        $grandduetotal = 0.00;
        $grandpaidtotal = 0.00;
        $grandtipstotal = 0.00;
        $grandadvtotal = 0.00;
        $grandpretotal = 0.00;
        $grandtotal = 0.00;
        //             Month               Due              Paid            Tips        Advpyt       Prepyt        Total
        $months[0][0]= "Jan";$months[0][1]= 0;$months[0][2]= 0;$months[0][3]= 0;$months[0][4]= 0;$months[0][5]= 0;$months[0][6]= 0;
        $months[1][0]= "Feb";$months[1][1]= 0;$months[1][2]=0;$months[1][3]= 0;$months[1][4]= 0;$months[1][5]= 0;$months[1][6]= 0;
        $months[2][0]= "March";$months[2][1]= 0;$months[2][2]= 0;$months[2][3]= 0;$months[2][4]= 0;$months[2][5]= 0;$months[2][6]= 0;
        $months[3][0]= "April";$months[3][1]= 0;$months[3][2]= 0;$months[3][3]= 0;$months[3][4]= 0;$months[3][5]= 0;$months[3][6]= 0;
        $months[4][0]= "May";$months[4][1]= 0;$months[4][2]= 0;$months[4][3]= 0;$months[4][4]= 0;$months[4][5]= 0;$months[4][6]= 0;
        $months[5][0]= "June";$months[5][1]= 0;$months[5][2]= 0;$months[5][3]= 0;$months[5][4]= 0;$months[5][5]= 0;$months[5][6]= 0;
        $months[6][0]= "July";$months[6][1]= 0;$months[6][2]= 0;$months[6][3]= 0;$months[6][4]= 0;$months[6][5]= 0;$months[6][6]= 0;
        $months[7][0]= "August";$months[7][1]= 0;$months[7][2]= 0;$months[7][3]= 0;$months[7][4]= 0;$months[7][5]= 0;$months[7][6]= 0;
        $months[8][0]= "September";$months[8][1]= 0;$months[8][2]= 0;$months[8][3]= 0;$months[8][4]= 0;$months[8][5]= 0;$months[8][6]= 0;
        $months[9][0]= "October";$months[9][1]= 0;$months[9][2]= 0;$months[9][3]= 0;$months[9][4]= 0;$months[9][5]= 0;$months[9][6]= 0;
        $months[10][0]= "November";$months[10][1]= 0;$months[10][2]= 0;$months[10][3]= 0;$months[10][4]= 0;$months[10][5]= 0;$months[10][6]= 0;
        $months[11][0]= "December";$months[11][1]= 0;$months[11][2]= 0;$months[11][3]= 0;$months[11][4]= 0;$months[11][5]= 0;$months[11][6]= 0;
        $months[12][0]= "Total";$months[12][1]= 0;$months[12][2]= 0;$months[12][3]= 0;$months[12][4]= 0;$months[12][5]= 0;$months[12][6]= 0;
        $i=0;
        $j=$i+1;
        while ($i <= 11){
                   $monthlycleans = Salesorderheader::find()
                   ->where(['<=','clean_date',"$sorderyear"."-".$j."-"."31"])
                   ->andFilterWhere(['>=','clean_date',"$sorderyear"."-".$j."-"."01"])
                   ->orderBy('clean_date')
                   ->all();
                   $totalamount = 0.00;
                   $totalpaid = 0.00;
                   $totaltips = 0.00;
                   $totaladvpyts = 0.00;
                   $totalprepyts = 0.00;
                   $totalall = 0.00;
                   $totalamount = number_format($totalamount,2);
                   $totalpaid = number_format($totalpaid,2);
                   $totaltips = number_format($totaltips,2);
                   $totaladvpyts = number_format($totaladvpyts,2);
                   $totalprepyts = number_format($totalprepyts,2);
                   $totalall = number_format($totalall,2);
                   foreach ($monthlycleans as $key)
                  {
                                $result = [];
                                $result = Salesorderdetail::find()->where(['sales_order_id'=>$key['sales_order_id']])->all();
                                foreach ($result as $key => $value)
                                {
                                   $totalpaid = $totalpaid + $result[$key]['paid'];
                                   $totalamount = $totalamount + $result[$key]['unit_price'];
                                   $totaltips = $totaltips + $result[$key]['tip'];
                                   $totaladvpyts = $totaladvpyts + $result[$key]['advance_payment'];
                                   $totalprepyts = $totalprepyts + $result[$key]['pre_payment'];
                                }
                                $totalall = $totalpaid  + $totaltips + $totaladvpyts + $totalprepyts;
                  }
                    //total due row
                    $months[$i][1] = number_format($totalamount,2);
                    //total paid row
                    $months[$i][2] = number_format($totalpaid,2);
                    //total tips row
                    $months[$i][3] = number_format($totaltips,2);
                    //total advance payments row
                    $months[$i][4] = number_format($totaladvpyts,2);
                    //total pre payment row
                    $months[$i][5] = number_format($totalprepyts,2);
                    
                    //fill last row 6 at bottom of table with monthly totals
                    $months[$i][6] = number_format($totalall,2);
                    $i++;
                    $j=$i+1;
                    $grandduetotal = $grandduetotal + $totalamount;
                    $grandpaidtotal = $grandpaidtotal + $totalpaid;
                    $grandtipstotal = $grandtipstotal + $totaltips;
                    $grandadvtotal = $grandadvtotal + $totaladvpyts;
                    $grandpretotal = $grandpretotal + $totalprepyts;
                    $grandtotal = $grandpaidtotal+$grandtipstotal+$grandadvtotal+$grandpretotal;
                    
        }
        //total column at far right of table
        $months[12][1] = number_format($grandduetotal,2);
        $months[12][2] = number_format($grandpaidtotal,2);
        $months[12][3] = number_format($grandtipstotal,2);
        $months[12][4] = number_format($grandadvtotal,2);
        $months[12][5] = number_format($grandpretotal,2);
        $months[12][6] = number_format($grandtotal,2);
        return $this->render('totalannualrevenue',['months'=>$months,'year'=>$sorderyear]);
    }
    public function actionTotalmonthlyrevenue()
    {
       $sordermonth = Yii::$app->request->get('sordermonth');
       $sorderyear = Yii::$app->request->get('sorderyear');
       $sorderyearcompare = $sorderyear;
       $monthadd = $sordermonth +1;
       If ($monthadd === 13) {
          $monthadd = 1;
           $sorderyearcompare = $sorderyearcompare + 1;
       } 
       
       //filter the dates out for the month selected
       $monthlycleans = Salesorderheader::find()
       ->where(['<=','clean_date',"$sorderyearcompare"."-".$monthadd."-"."01"])
       ->andFilterWhere(['>=','clean_date',"$sorderyear"."-".$sordermonth."-"."01"])
       ->orderBy('clean_date')
       ->all();
       $totalamount = 0.00;
       $totalpaid = 0.00;
       $totalamount = number_format($totalamount,2);
       $totalpaid = number_format($totalpaid,2);
       foreach ($monthlycleans as $key)
      {
                    $result = [];
                    $result = Salesorderdetail::find()->where(['sales_order_id'=>$key['sales_order_id']])->all();
                    foreach ($result as $key => $value)
                    {
                       $totalpaid = $totalpaid + $result[$key]['paid'];
                       $totalamount = $totalamount + $result[$key]['unit_price'];
                    }
      }
      Yii::$app->session->setFlash('success', "Revenue  $sordermonth/$sorderyear: Amount ".number_format($totalamount,2). " Received: ".number_format($totalpaid,2));
      //return $this->render('index');
    }

    /**
     * Finds the Salesorderheader model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Salesorderheader the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    public function actionFilterpaid()
    {
        $saretheypaid = Yii::$app->request->get('checkbox1');
        Yii::$app->session->setFlash('success', "Checkbox1: $saretheypaid");
        return $this->render('index');
    }
    
    
    
    protected function findModel($id)
    {
        if (($model = Salesorderheader::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
   
    
    
    
    
    
    
    
    
    
}
