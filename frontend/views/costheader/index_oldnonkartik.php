<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\frontend\model\Salesorderdetails;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SalesorderheaderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daily Cleans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salesorderheader-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Daily Clean', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'sales_order_id',
            [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{link}',
                    'header'=>'Cleans',
                    'visible'=> Yii::$app->user->isGuest ? false : true,
                    'buttons' => [
                            'link' => function ($url, $model,$key) {
                                            return Html::a('Cleans', $url);
                                },
                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                            if ($action === 'link') {
                                $url =Url::toRoute(['salesorderdetail/index', 'id' => $model->sales_order_id]);
                                Yii::$app->session['sales_order_id'] = $model->sales_order_id;
                             return $url;
                            }
                    }
            ],
            'status',
            'statusfile',
            //'employee_id',
            //['attribute'=>'employee_id','header'=>'Employee','value'=>$dataProvider->Employee->title],
            [
            'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
            'header'=>'Employee',
            'value' => function ($data) {
                return $data->employee->title; 
                // $data['name'] for array data, e.g. using SqlDataProvider.
            },
            ],        
            'clean_date',
            //'sub_total',
            //'tax_amt',
            ['class'=>'yii\grid\DataColumn',
             'header'=>'Total Due',
             'format'=>['decimal', 2],  
             'value'=> function($data){
                $subtotal = 0.00;
                $subtotal = number_format($subtotal,2);
                $array = $data->salesorderdetails;
                foreach ($array as $key => $value)
                {
                   $subtotal += $array[$key]['unit_price']; 
                }
                return $subtotal;
             }
            ],
            ['class'=>'yii\grid\DataColumn',
             'header'=>'Paid to date',
             'format'=>['decimal', 2], 
             'value'=> function($data){
                $subtotal = 0.00;
                $subtotal = number_format($subtotal,2);
                $array = $data->salesorderdetails;
                foreach ($array as $key => $value)
                {
                   $subtotal += $array[$key]['paid']; 
                }
                return $subtotal;
             }
            ],    
            [
              'class' => 'yii\grid\ActionColumn', 
              'header'=>'Actions',
            ],
            
                  
        ],
    ]); ?>
</div>