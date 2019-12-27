<?php
use yii\helpers\Url;
use yii\helpers\Html;
use \kartik\grid\GridView;
use yii\helpers\Json;
use yii\frontend\model\Salesorderdetails;
use yii\web\JqueryAsset;
\yii\web\JqueryAsset::register($this);
$this->registerJsFile('@web/js/scripts2.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->title = 'Daily Cleans';
$this->params['breadcrumbs'][] = $this->title;
$viewMsg = 'View';
$deleteMsg = 'Delete';
$updateMsg = 'Update';
$yearOnly = date('Y', strtotime(Date('Y-m-d')));

?>

<div class="salesorderheader-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Daily Clean', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Copy Houses to Daily Clean', ['product/index'], ['class' => 'btn btn-success']) ?>
        
        <button id="w25" class = "btn btn-success" onclick="js:getCopyit()">(Ticked) Copy</button>
        <Hr style = "border-top: 3px double #8c8b8b">   
        <button id="w95" class = "btn btn-success" onclick="js:getYearmonth()">Revenue:</button>
        <?= Html::dropDownList('sorderyear','',[$yearOnly+1=>$yearOnly+1,$yearOnly=>$yearOnly,$yearOnly-1=>$yearOnly-1,$yearOnly-2=>$yearOnly-2] ,['prompt' => 'Year','id'=>'w79']) ?>
        <?= Html::dropDownList('sordermonth','',['01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December'] ,['prompt' => 'Month','id'=>'w89']) ?>          
        <Hr style = "border-top: 3px double #8c8b8b">        
    </p>
<?php 
   //although the search model is not used keep it since it affects "unpaid ticked" javascript
   //echo $this->render('_search', ['model' => $searchModel]); 
?> 
    
<?php
   $gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    ['class' => 'kartik\grid\CheckboxColumn',
            'name'=>'selection',
            'multiple'=>true,
            'checkboxOptions'=>function ($model, $key, $index){
            return ['id'=>$model->sales_order_id,'value' => $model->sales_order_id];
            }
    ],  
    'sales_order_id',
    [
                    'class' => 'kartik\grid\ActionColumn',
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
                                Url::remember();
                                return $url;
                            }
                    }
    ], 
    'status',
    [
            'class' => 'kartik\grid\DataColumn', // can be omitted, as it is the default
            'header'=>'Employee',
            'value' => function ($data) {
                return $data->employee->title; 
                // $data['name'] for array data, e.g. using SqlDataProvider.
            },
    ], 
    [
      'class'=>'kartik\grid\DataColumn',
      'header'=>'Date',
      'value'=>'clean_date',
      'group'=>true,
    ],
    ['class'=>'kartik\grid\DataColumn',
             'header'=>'Total Due',
             'hAlign'=>'right',
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
             },
             'pageSummary'=>true,
             'pageSummaryFunc'=>Gridview::F_SUM,
   ],
   ['class'=>'kartik\grid\DataColumn',
             'header'=>'Paid to date',
             'hAlign'=>'right',
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
             },
             'pageSummary'=>true,
             'pageSummaryFunc'=>Gridview::F_SUM,    
   ],
   ['class' => 'kartik\grid\ActionColumn',
     'dropdown' => false,
     'header'=>'View',
     'vAlign'=>'middle',
     'viewOptions'=>['title'=>$viewMsg, 'data-toggle'=>'tooltip'],
     'template'=> '{view}',
   ],
   ['class' => 'kartik\grid\ActionColumn',
     'dropdown' => false,
     'header'=>'Delete',
     'vAlign'=>'middle',
     'deleteOptions'=>['title'=>$deleteMsg, 'data-toggle'=>'tooltip'],
     'template'=> '{delete}',
   ], 
   ['class' => 'kartik\grid\ActionColumn',
     'dropdown' => false,
     'header'=>'Edit',
     'vAlign'=>'middle',
     'updateOptions'=>['title'=>$updateMsg, 'data-toggle'=>'tooltip'],
     'template'=> '{update}',
   ],             
   ];
   echo kartik\grid\GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => $gridColumns,
      'containerOptions' => ['style'=>'overflow: auto'], 
      'pjax' => true,
      'pjaxSettings' =>['neverTimeout'=>false,
                      'options'=>['id'=>'kv-unique-id-0'],                      
                     ], 
      'bordered' => true,
      'striped' => true,
      'condensed' => false,
      'responsive' => true,
      'hover' => true,
      'floatHeader' => false,
      'showPageSummary' => true,
      'panel' => [
      'type' => GridView::TYPE_PRIMARY
    ],
   ]); 
?>
  
</div>