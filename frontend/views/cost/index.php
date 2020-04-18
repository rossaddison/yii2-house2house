<?php
use yii\helpers\Html;
use \kartik\grid\GridView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use frontend\models\Company;
use frontend\models\Costheader;
use frontend\models\Costcategory;
use frontend\models\Costsubcategory;
use frontend\models\Cost;
use kartik\icons\FontAwesomeAsset;
FontAwesomeAsset::register($this);
//$this->registerJsFile('@web/js/scripts2.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->title = 'Costs';
$this->params['breadcrumbs'][] = ['label' => 'Costs', 'url' => ['cost/index']];
$this->params['breadcrumbs'][] = $this->title;
$pdfHeader = [
  'L' => [
    //'content' => Company::findOne(1)->name . " - " . Company::findOne(1)->telephone,
    'content'=>  Yii::$app->session['sliderfontcost'],
  ],
  'C' => [
    'content' => 'Costs',
    'font-size' => 10,
    'font-style' => 'B',
    'font-family' => 'arial',
    'color' => '#333333'
  ],
  'R' => [
    'content' => '',
  ],
  'line' => true,
];
$pdfFooter = [
  'L' => [
    'content' => 'Filename: Costs_Printed_'.date('d-M-Y-h-s'),
    'font-size' => 10,
    'color' => '#333333',
    'font-family' => 'arial',
  ],
  'C' => [
    'content' => 'Printed: ' .date('d-M-Y'),
  ],
  'R' => [
    'content' => '',
    'font-size' => 10,
    'color' => '#333333',
    'font-family' => 'arial',
  ],
  'line' => true,
];
$config_array = [
      'methods' => [
        'SetHeader' => [
          ['odd' => $pdfHeader, 'even' => $pdfHeader]
        ],
        'SetFooter' => [
          ['odd' => $pdfFooter, 'even' => $pdfFooter]
        ],
      ],
      'options' => [
        'title' => Company::findOne(1)->name . " - " . Company::findOne(1)->telephone,
        'subject' => 'Costs',
        'keywords' => 'Costs'
      ],
    ];
$viewMsg = 'View';
$deleteMsg = 'Delete';
$updateMsg = 'Update';
?>

<div class="cost-index">
<h1><?= Html::encode($this->title) ?></h1>
<?php 
    //echo $this->render('_search', ['model' => $searchModel]); 
?>
<p><?= Html::a('Create Cost', ['create'], ['class' => 'btn btn-success']) ?>
        <Hr style = "border-top: 3px double #8c8b8b">
       <button id="w75" class = "btn btn-success" onclick="js:getKeyscost()">Copy Selected to: </button>
   <?= Html::label('Daily Costs Date: ') ?>
   <?= Html::dropDownList('ccost','', ArrayHelper::map(Costheader::find()->orderBy(['cost_date'=>SORT_DESC])->all(),'cost_header_id','status','cost_date'),['prompt' => '--- select ---','id'=>'w59']) ?>
   <?= Html::a('Back', Url::previous(), ['class' => 'btn btn-success']) ?>    
        <Hr style = "border-top: 3px double #8c8b8b">
   
</div>       
</p>
<?php 
use kartik\slider\Slider;
echo Html::label('Font Size Adjuster:<br>');
echo Slider::widget([
    'name' => 'sliderfontcost',
    'options' => [
                   'id'=>'w928',
                 ],
    'sliderColor' => Slider::TYPE_INFO,
    'handleColor' => Slider::TYPE_INFO,
    'pluginOptions' => [
        'orientation' => 'horizontal',
        'handle' => 'round',
        'min' => 1,
        'max' => 32,
        'step' => 1,
        'tooltip'=>'Adjust to change the font size.',
    ],
]);   
?> 

<button id="w954" class = "btn btn-info btn-lg" onclick="js:getSlidercost()" title="Double-click to Adjust font." data-toggle="tooltip">Adjust font</button><br><br>';
<?php
    Yii::$app->formatter->nullDisplay = '';
    $gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    ['class' => 'kartik\grid\CheckboxColumn',
            'name'=>'selection',
            'multiple'=>true,
            'checkboxOptions'=>function ($model, $key, $index){
            return ['id'=>$model->id,'value' => $model->id];
            }
    ],
    ['class' => 'kartik\grid\ActionColumn',
     'dropdown' => false,
     'header'=>'View',
     'vAlign'=>'middle',
     'viewOptions'=>['title'=>$viewMsg, 'data-toggle'=>'tooltip'],
     'updateOptions'=>['title'=>$updateMsg, 'data-toggle'=>'tooltip'],
     'deleteOptions'=>['title'=>$deleteMsg, 'data-toggle'=>'tooltip'],
     'template'=> '{view}',
    ], 
    [
            'class'=>'kartik\grid\DataColumn',
            'header'=>'Frequency',
            'attribute'=>'frequency',
            'value' => function ($data) {
                    return $data->frequency; 
            },
            'filter'=> Html::activeDropDownList($searchModel,'frequency',ArrayHelper::map(Cost::find()->orderBy('frequency')->asArray()->all(),'frequency','frequency'),['options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfontcost'].'px'],'prompt'=>'Frequency...']), 
    ],     
    [
            'header'=>'Category',
            'attribute'=>'costcategory_id', 
            'value' => function ($data) {
            return $data->costcategory->name; 
            },
             'filter'=> Html::activeDropDownList($searchModel,'costcategory_id',ArrayHelper::map(Costcategory::find()->orderBy('name')->asArray()->all(),'id','name'),['options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfontcost'].'px'],'prompt'=>'Category...']),     
    ],    
    [
        'header'=>'Subcategory',
        'attribute'=>'costsubcategory_id',
        'filterInputOptions' => [
                     'options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfontcost'].'px'],
                     'placeholder' => 'Surname...'
        ],   
        'value' => function ($data) {
                   return $data->costsubcategory->name; 
               },
        'filter'=> Html::activeDropDownList($searchModel,'costsubcategory_id',ArrayHelper::map(Costsubcategory::find()->where(['costcategory_id'=>$searchModel])->orderBy('name')->asArray()->all(),'id','name'),['options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfontcost'].'px'],'prompt'=>'Subcategory...']),                       
    ],
    ['class'=>'kartik\grid\DataColumn',
     'options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfontcost'].'px'],   
     'attribute'=>'description',
     'filterInputOptions' => [
                  'options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfontcost'].'px'],
                  'placeholder' => 'Cost Description...'
                ],
    ],
    [
     'header'=>'List Price',
     'options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfontcost'].'px'],   
     'value' => 'listprice',
     'hAlign'=>'right',
     'format'=>['decimal', 2],
     'pageSummary'=>true
    ],
     
     //'sellstartdate',
];
            
if ((empty(Yii::$app->session['sliderfontcost'])) && (!isset(Yii::$app->session['sliderfontcost']))){Yii::$app->session['sliderfontcost'] = 18;}           
            
echo kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfontcost'].'px'],
    'containerOptions' => ['style'=>'overflow: auto'], 
    'pjax' => true,
    'pjaxSettings' =>[
                      'neverTimeout'=>true,
                      'options'=>['id'=>'kv-unique-id-47'],                      
                     ], 
    'bordered' => true,
    'striped' => true,
    'condensed' => false,
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
    'heading'=> Company::findOne(1)->name . " - " . Company::findOne(1)->telephone ,
    ],
    'exportConfig' => [
                   GridView::CSV => ['label' => 'Export as CSV','config' => $config_array, 'filename' => 'Costs_Printed_'.date('d-M-Y')],
                   GridView::HTML => ['label' => 'Export as HTML','config' => $config_array, 'filename' => 'Costs_Printed_'.date('d-M-Y')],
                   GridView::PDF => [ 'label' => 'Export as PDF','config' => $config_array, 'filename' => 'Costs_Printed_'.date('d-M-Y')], 
                   GridView::EXCEL=> ['label' => 'Export as EXCEL', 'filename' => 'Costs_Printed_'.date('d-M-Y')],
                   GridView::TEXT=> ['label' => 'Export as TEXT', 'filename' => 'Costs_Printed_'.date('d-M-Y')],
                ],
  
]);
?> 

</div>
