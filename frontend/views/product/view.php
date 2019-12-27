<?php
use yii\helpers\Html;
use yii\helpers\Json;
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use frontend\models\Productcategory;
use frontend\models\Productsubcategory;
use frontend\models\Salesorderheader;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
$this->title='View House'; 
$this->params['breadcrumbs'][]=['label'=>'Houses', 'url'=>['index']];
$this->params['breadcrumbs'][]=$this->title;
$attributes=[
    [
        'attribute'=>'id', 
        'format'=>'raw', 
        'value'=>'<kbd>'.$model->id.'</kbd>', 
        'displayOnly'=>true
    ],
    'name',
    'surname',
    'email:email',
    'productnumber',
    'postcodefirsthalf',
    'postcodesecondhalf',
    [
     'attribute'=>'productcategory_id',
     'type'=>  DetailView::INPUT_DROPDOWN_LIST,
      'items'=>ArrayHelper::map(Productcategory::find()->orderBy('name')->asArray()->all(),'id','name'), 
      'options'=> ['id'=>'cat_id'],
      'value'=>$model->productcategory->name, 
      
    ],
    [ 
      'attribute'=>'productsubcategory_id',
      'type'=>  DetailView::INPUT_DEPDROP,
      'value'=>$model->productsubcategory->name, 
      'widgetOptions'=>[
            'options'=>['id'=>'subcat_id'],
            'pluginOptions'=>[
                    'depends'=>['cat_id'],  
                    'url'=>Url::to(['/site/subcat']),
              
            ],
      ],
    ],
    'contactmobile',
    'specialrequest',
    [
       'attribute'=>'frequency',
       'type' => DetailView::INPUT_DROPDOWN_LIST,
       'items'=> ['Weekly'=>'Weekly','Fortnightly'=>'Fortnightly','Monthly'=>'Monthly','Every two months'=>'Every two months','Not applicable'=>'Not applicable'],
       //'items'=> ArrayHelper::map(['Monthly'=>'Monthly','Weekly'=>'Weekly'],'id','frequency'),
       'value'=>$model->frequency, 
       'inputWidth'=>'40%'
    ],
    'listprice',
    [
        'attribute'=>'sellstartdate', 
        'type'=>DetailView::INPUT_DATE,
        'format'=>'date',
        'widgetOptions'=>[
            'pluginOptions'=>['format'=>'yyyy-mm-dd']
        ],
        'inputWidth'=>'40%'
    ],
    [
        'attribute'=>'sellenddate', 
        'type'=>DetailView::INPUT_DATE,
        'format'=>'date',
        'widgetOptions'=>[
            'pluginOptions'=>['format'=>'yyyy-mm-dd']
        ],
        'inputWidth'=>'40%'
    ],
    ////[
    /////    'attribute'=>'discontinueddate', 
    ////    'type'=>DetailView::INPUT_DATE,
    ////   'format'=>'date',
   /// ////    'type'=>DetailView::INPUT_DATE,
    ////////    'widgetOptions'=>[
  ////          'pluginOptions'=>['format'=>'yyyy-mm-dd']
   ////     ],
  ////      'inputWidth'=>'40%'
 ////   ],
    [
        'attribute'=>'isactive', 
        'type'=>DetailView::INPUT_CHECKBOX,
        'format'=>'boolean',
        'type'=>DetailView::INPUT_CHECKBOX,
        'inputWidth'=>'40%'
    ],
    'jobcode',
    'mandate',
    'gc_number',
];

echo DetailView::widget([
    'model'=>$model,
    'condensed'=>true,
    'attributes'=>$attributes,
    'hover'=>true,
    'mode'=>DetailView::MODE_VIEW,
    'panel'=>[
        'heading'=>'House # ' . $model->id,
        'type'=>DetailView::TYPE_INFO,
    ],
    'deleteOptions'=>['params' => ['id' => $model->id, 'housedelete' => true],'url'=>['delete', 'id' => $model->id],],
    
]);?>