<?php
use yii\helpers\Html;
use yii\helpers\Json;
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use frontend\models\Costcategory;
use frontend\models\Costsubcategory;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;
$this->title='View Cost'; 
$this->params['breadcrumbs'][]=['label'=>'Costs', 'url'=>['index']];
$this->params['breadcrumbs'][]=$this->title;
$attributes=[
    [
        'attribute'=>'id', 
        'format'=>'raw', 
        'value'=>'<kbd>'.$model->id.'</kbd>', 
        'displayOnly'=>true
    ],
    'description',
    'costnumber',
    'costcodefirsthalf',
    'costcodesecondhalf',
    [
     'attribute'=>'costcategory_id',
     'type'=>  DetailView::INPUT_DROPDOWN_LIST,
      'items'=>ArrayHelper::map(Costcategory::find()->orderBy('name')->asArray()->all(),'id','name'), 
      'options'=> ['id'=>'cat_id'],
      'value'=>$model->costcategory->name, 
    ],
    [ 
      'attribute'=>'costsubcategory_id',
      'type'=>  DetailView::INPUT_DEPDROP,
      'value'=>$model->costsubcategory->name, 
      'widgetOptions'=>[
            'options'=>['id'=>'subcat_id'],
            'pluginOptions'=>[
                    'depends'=>['cat_id'],  
                    'url'=>Url::to(['/site/subcatcost']),
              
            ],
      ],
     
    ],
    [
       'attribute'=>'frequency',
       'type' => DetailView::INPUT_DROPDOWN_LIST,
       'items'=> ['Daily'=>'Daily','Weekly'=>'Weekly','Fortnightly'=>'Fortnightly','Monthly'=>'Monthly','Every two months'=>'Every two months','Other'=>'Other'],
       'value'=>$model->frequency, 
       'inputWidth'=>'40%'
    ],
    'listprice',
    [
        'attribute'=>'coststartdate', 
        'type'=>DetailView::INPUT_DATE,
        'format'=>'date',
        'widgetOptions'=>[
            'pluginOptions'=>['format'=>'yyyy-mm-dd']
        ],
        'inputWidth'=>'40%'
    ],
    [
        'attribute'=>'costenddate', 
        'type'=>DetailView::INPUT_DATE,
        'format'=>'date',
        'widgetOptions'=>[
            'pluginOptions'=>['format'=>'yyyy-mm-dd']
        ],
        'inputWidth'=>'40%'
    ],
    [
        'attribute'=>'discontinueddate', 
        'type'=>DetailView::INPUT_DATE,
        'format'=>'date',
        'type'=>DetailView::INPUT_DATE,
        'widgetOptions'=>[
            'pluginOptions'=>['format'=>'yyyy-mm-dd']
        ],
        'inputWidth'=>'40%'
    ],
   
   
];

echo DetailView::widget([
    'model'=>$model,
    'condensed'=>true,
    'attributes'=>$attributes,
    'hover'=>true,
    'mode'=>DetailView::MODE_VIEW,
    'panel'=>[
        'heading'=>'Cost # ' . $model->id,
        'type'=>DetailView::TYPE_INFO,
    ],
    'deleteOptions'=>['params' => ['id' => $model->id, 'costdelete' => true],'url'=>['delete', 'id' => $model->id],],
    
]);?>
