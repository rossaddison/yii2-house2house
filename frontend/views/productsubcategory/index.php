<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\helpers\Arrayhelper;
use frontend\components\Utilities;
use frontend\models\product;
use frontend\models\productcategory;
use frontend\models\productsubcategory;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\Size;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;
use kartik\grid\Gridview;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProductsubcategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Street';
$this->params['breadcrumbs'][] = $this->title;
$viewMsg = 'View';
$deleteMsg = 'Delete';
$updateMsg = 'Update';
$tooltipsortorder = Html::tag('span', 'Order', ['title'=>'This is the order in which jobs will be completed.','data-toggle'=>'tooltip','style'=>'text-decoration: underline: cursor:pointer;']);
?>
<div class="productsubcategory-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Street', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Postcode Finder', "http://pcf.raggedred.net/", ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    ['class' => 'kartik\grid\ActionColumn',
     'dropdown' => false,
     'header'=>'View',
     'vAlign'=>'middle',
     'viewOptions'=>['title'=>$viewMsg, 'data-toggle'=>'tooltip'],
     'template'=> '{view}',
    ], 
    ['class' => 'kartik\grid\ActionColumn',
     'dropdown' => false,
     'header'=>'Update',
     'vAlign'=>'middle',
     'updateOptions'=>['title'=>$updateMsg, 'data-toggle'=>'tooltip'],
     'template'=> '{update}',
    ],   
    [
            'class'=>'kartik\grid\DataColumn',
            'header'=>'Area Code',
            'attribute'=>'productcategory_id',
            'value' => function ($dataProvider) {
                    return $dataProvider->productcategory->name; 
            },
            'filter'=> Html::activeDropDownList($searchModel,'productcategory_id',ArrayHelper::map(Productcategory::find()->orderBy('name')->asArray()->all(),'id','name'),['class'=>'form-control','prompt'=>'Please Select']), 
    ],           
    'name',
    [
    'class' => 'kartik\grid\ExpandRowColumn',
    'header'=>'Map',  
    'expandTitle'=> 'Postcode and Street',
    'width' => '300px',
    'value' => function ($dataProvider, $key, $index, $column) {
        return GridView::ROW_COLLAPSED;
    },
    'detail' => function ($dataProvider, $key, $index, $column) {
        return Yii::$app->controller->renderPartial('_expandableview', ['postcode_id'=>$dataProvider->productcategory_id,'street_id'=>$dataProvider->id,'street_name'=>$dataProvider->name]);
    },
    'disabled'=> function ($dataProvider, $key, $index, $column) {
                    if (!empty($dataProvider->id)) { return false;} else { return true;}
    },      
    'headerOptions' => ['class' => 'kartik-sheet-style'], 
    'expandOneOnly' => true,
    ], 
    [
            'class' => 'kartik\grid\ActionColumn',
            'template' => '{link}',// can be omitted, as it is the default
            'header'=>'Google',
            'visible'=> Yii::$app->user->isGuest ? false : true,
            'buttons' => ['link' => function ($url, $dataProvider,$key) {
               $url3 = $dataProvider->name." ".$dataProvider->productcategory->name;   
               return Html::a($url3,$url,['class' => 'btn btn-success','data-toggle'=>'tooltip','title'=>'Goto Google maps using this address.']);
             }
             ],
            'urlCreator' => function ($action, $dataProvider, $key, $index) {
                         if (($action === 'link') ) {
                             $url = "https://maps.google.com/maps?q=".$dataProvider->name." ".$dataProvider->productcategory->name;
                             return $url;
                         }
             }                
     ],           
    ['class' => '\kartik\grid\EditableColumn',
               // 'filter'=> Html::activeDropDownList($searchModel,'sort_order',ArrayHelper::map(Productsubcategory::find()->orderBy('sort_order')->asArray()->all(),'sort_order','sort_order'),['class'=>'form-control','prompt'=>'From']),      
                'header'=>$tooltipsortorder,
                'attribute' => 'sort_order',
                'hAlign' => 'right', 
                'vAlign' => 'middle',
                'width' => '7%',
                'format' => ['decimal',0],
                'refreshGrid'=>true,
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'readonly' => false,
                'editableOptions' => [
                    'asPopover' => false,
                    'header' => 'Sequence', 
                    'inputType' => \kartik\editable\Editable::INPUT_SPIN,
                    'options' => [
                        'pluginOptions' => ['autoclose' => true],                        
                     ]
                ],                    
     ],  
     ['class' => '\kartik\grid\EditableColumn',
               // 'filter'=> Html::activeDropDownList($searchModel,'sort_order',ArrayHelper::map(Productsubcategory::find()->orderBy('sort_order')->asArray()->all(),'sort_order','sort_order'),['class'=>'form-control','prompt'=>'From']),      
                //'header'=>$tooltipsortorder,
                'attribute' =>'lat_start',
                'hAlign' => 'right', 
                'vAlign' => 'middle',
                'width' => '7%',
                'format' => ['decimal',7],
                'refreshGrid'=>true,
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'readonly' => false,
                'editableOptions' => [
                    'asPopover' => false,
                    //'header' => 'Active', 
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                    'options' => [
                        'pluginOptions' => ['autoclose' => true],                        
                     ]
                ],                    
     ],   
    ['class' => '\kartik\grid\EditableColumn',
               // 'filter'=> Html::activeDropDownList($searchModel,'sort_order',ArrayHelper::map(Productsubcategory::find()->orderBy('sort_order')->asArray()->all(),'sort_order','sort_order'),['class'=>'form-control','prompt'=>'From']),      
                //'header'=>$tooltipsortorder,
                'attribute' =>'lng_start',
                'hAlign' => 'right', 
                'vAlign' => 'middle',
                'width' => '7%',
                'format' => ['decimal',7],
                'refreshGrid'=>true,
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'readonly' => false,
                'editableOptions' => [
                    'asPopover' => false,
                    //'header' => 'Active', 
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                    'options' => [
                        'pluginOptions' => ['autoclose' => true],                        
                     ]
                ],                    
     ],    
    ['class' => '\kartik\grid\EditableColumn',
                'attribute' =>'lat_finish',
                'hAlign' => 'right', 
                'vAlign' => 'middle',
                'width' => '7%',
                'format' => ['decimal',7],
                'refreshGrid'=>true,
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'readonly' => false,
                'editableOptions' => [
                    'asPopover' => false,
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                    'options' => [
                        'pluginOptions' => ['autoclose' => true],                        
                     ]
                ],                    
     ], 
    ['class' => '\kartik\grid\EditableColumn',
                'attribute' =>'lng_finish',
                'hAlign' => 'right', 
                'vAlign' => 'middle',
                'width' => '7%',
                'format' => ['decimal',7],
                'refreshGrid'=>true,
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'readonly' => false,
                'editableOptions' => [
                    'asPopover' => false,
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                    'options' => [
                        'pluginOptions' => ['autoclose' => true],                        
                     ]
                ],                    
     ],  
    [
    'class' => 'kartik\grid\ExpandRowColumn',
    'header'=>'Directions to next clean',  
    'expandTitle'=> 'Directions to next clean',
    'width' => '300px',
    'value' => function ($dataProvider, $key, $index, $column) {
        return GridView::ROW_COLLAPSED;
    },
    'detail' => function ($dataProvider, $key, $index, $column) {
        return Yii::$app->controller->renderPartial('_expandableview_directions', ['directions'=>$dataProvider->directions_to_next_productsubcategory]);
    },
    'disabled'=> function ($data, $key, $index, $column) {
                    if (!empty($data)) { return false;} else { return true;}
    },        
    'headerOptions' => ['class' => 'kartik-sheet-style'], 
    'expandOneOnly' => true,
    ],     
    ['class' => '\kartik\grid\EditableColumn',
                'attribute' => 'isactive',
                'hAlign' => 'right', 
                'vAlign' => 'middle',
                'width' => '7%',
                'refreshGrid'=>true,
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'readonly' => false,
                'editableOptions' => [
                    'asPopover' => false,
                    'header' => 'Active',                    
                    'displayValueConfig' => [0 => 'Inactive', 1 => 'Active'],
                    'inputType' => \kartik\editable\Editable::INPUT_CHECKBOX,
                    'options' => [
                        'pluginOptions' => ['autoclose' => true],                        
                     ]
                ],                    
     ],    
];
echo kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'containerOptions' => ['style'=>'overflow: auto'], 
    'pjax' => true,
    'pjaxSettings' =>['neverTimeout'=>false,
                      'options'=>['id'=>'kv-unique-id-8'],                      
                     ], 
    'responsiveWrap'=>true,
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
    'floatHeader' => false,
    'showPageSummary' => true,
    'panel' => [
    /**
     * @var array the panel settings for displaying the grid view within a bootstrap styled panel. This property is
     * therefore applicable only if [[bootstrap]] property is `true`. The following array keys can be configured:
     * - `type`: _string_, the panel contextual type. Set it to one of the TYPE constants. If not set, will default to
     *   [[TYPE_DEFAULT]].
     * - `heading`: `string`|`boolean`, the panel heading. If set to `false`, will not be displayed.
     * - `headingOptions`: _array_, HTML attributes for the panel heading container. Defaults to
     *   `['class'=>'panel-heading']`.
     * - `footer`: `string`|`boolean`, the panel footer. If set to `false` will not be displayed.
     * - `footerOptions`: _array_, HTML attributes for the panel footer container. Defaults to
     *   `['class'=>'panel-footer']`.
     * - 'before': `string`|`boolean`, content to be placed before/above the grid (after the header). To not display
     *   this section, set this to `false`.
     * - `beforeOptions`: _array_, HTML attributes for the `before` text. If the `class` is not set, it will default to
     *   `kv-panel-before`.
     * - 'after': `string`|`boolean`, any content to be placed after/below the grid (before the footer). To not
     *   display this section, set this to `false`.
     * - `afterOptions`: _array_, HTML attributes for the `after` text. If the `class` is not set, it will default to
     *   `kv-panel-after`.
     */  
    'type' => GridView::TYPE_PRIMARY,
    'heading'=> '' ,

    ],
]);
?> 

</div>
