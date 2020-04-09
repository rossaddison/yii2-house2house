<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use \kartik\helpers;
use \kartik\grid\GridView;
use yii\web\JqueryAsset;
use yii\helpers\Json;
use yii\web\JsExpression;
use frontend\models\Costheader;
use frontend\models\Company;
use frontend\models\Messaging;
use yii\db\Query;
use yii\data\Sort;
use kartik\icons\Icon;
use yii\bootstrap4\breadcrumbs;
use kartik\icons\FontAwesomeAsset;
FontAwesomeAsset::register($this);

$this->registerJsFile('@web/js/scripts2.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->title = 'Costs to include';
$cost_date = DateTime::createFromFormat("Y-m-d", Costheader::findOne($id=Yii::$app->session['cost_header_id'])->cost_date)->format("l, d F Y");
$pdfHeader = [
  'L' => [
    'content' => Company::findOne(1)->name . " - " . Company::findOne(1)->telephone . " - " . DateTime::createFromFormat("Y-m-d", Costheader::findOne($id=Yii::$app->session['cost_header_id'])->cost_date)->format("l, d F Y"),
  ],
  'C' => [
    'content' => 'Daily Costs',
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
    'content' => 'Filename: Clean_date-'.$cost_date.'_Printed_'.date('d-M-Y'),
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
        'title' => Company::findOne(1)->name . " - " . Company::findOne(1)->telephone . " - " . DateTime::createFromFormat("Y-m-d", Costheader::findOne($id=Yii::$app->session['cost_header_id'])->cost_date)->format("l, d F Y"),
        'subject' => 'Daily Costs',
        'keywords' => 'daily, cost, daily cost'
      ],
    ];
$this->params['breadcrumbs'][] = ['label' => 'Daily Costs', 'url' => ['costheader/index']];
$this->params['breadcrumbs'][] = ['label' => $cost_date];
$this->params['breadcrumbs'][] = $this->title;
$viewMsg = 'View';
$deleteMsg = 'Delete';
$updateMsg = 'Update';
$tooltipcatandsubcat = Html::tag('span', '', ['title'=>'Cost category and subcategory','data-toggle'=>'tooltip','style'=>'text-decoration: underline: cursor:pointer;']);
?>
<div class="info">
<?php if(Yii::$app->session->hasFlash('success')){echo Yii::$app->session->getFlash('success');}?>
</div>
<div class="costdetail-index">
<h1><?= Html::encode($this->title) ?></h1>

<?php 
    $this->render('_search', ['model' => $searchModel]); 
?>
<p>
    <button id="w110" class = "btn btn-success" onclick="js:getPaidcostticks()">Paid (ticked)</button>
    <button id="w111" class = "btn btn-danger" onclick="js:getUnpaidcostticks()">Unpaid (ticked)</button>
    
    <?= Html::a('Add Cost', ['cost/index'], ['class' => 'btn btn-warning']) ?>
    <?= Html::a('Back', ['costheader/index'], ['class' => 'btn btn-success']) ?>
    <br>
    </br>
</p>

<?php
    $gridColumns = [
    ['class' => 'kartik\grid\SerialColumn',      
    ],
    ['class' => 'kartik\grid\CheckboxColumn',
            'name'=>'selection',
            'multiple'=>true,
            'checkboxOptions'=>function ($model, $key, $index){
            return ['id'=>$model->cost_detail_id,'value' => $model->cost_detail_id];
            }
    ],
    ['class' => 'kartik\grid\ActionColumn',
     'dropdown' => false,
     'header'=>'Vw',
     'vAlign'=>'middle',
     'viewOptions'=>['title'=>$viewMsg, 'data-toggle'=>'tooltip'],
     'template'=> '{view}',
    ],
    [
    'class' => 'kartik\grid\ExpandRowColumn',
    'header'=>$tooltipcatandsubcat,  
    'expandTitle'=> 'Cost category and Subcategory',
    'width' => '300px',
    'value' => function ($model, $key, $index, $column) {
        return GridView::ROW_COLLAPSED;
    },
    'detail' => function ($model, $key, $index, $column) {
        return Yii::$app->controller->renderPartial('_expandableview', ['costcode_id'=>$model->costcategory_id,'costsubcode_id'=>$model->costsubcategory_id]);
    },
    'headerOptions' => ['class' => 'kartik-sheet-style'], 
    'expandOneOnly' => true,
    ],       
            
            [
            'class' => 'kartik\grid\DataColumn', // can be omitted, as it is the default
            'header'=> 'Description',
            'value' => function ($data) {
                return $data->cost->description; // $data['name'] for array data, e.g. using SqlDataProvider.
            },
            ], 
            [
            'class' => 'kartik\grid\ActionColumn',
            'template' => '{link}',// can be omitted, as it is the default
            'header'=>'Carousal File',
            'visible'=> Yii::$app->user->isGuest ? false : true,
            'buttons' => ['link' => function ($url, $data,$key) {
                           return Html::a($data->carousal->image_source_filename,$url,['class' => 'btn btn-success']);
                }
                ],
            'urlCreator' => function ($action, $data, $key, $index) {
                         if (($action === 'link') ) {
                             $url = Url::toRoute(['carousal/view/'.$data->carousal->id]);
                             return $url;
                         }
                }                
            ],  
            [
            'class' => 'kartik\grid\ActionColumn',
            'template' => '{link}',// can be omitted, as it is the default
            'header'=>'<',
            'visible'=> Yii::$app->user->isGuest ? false : true,
            'buttons' => ['link' => function ($url, $model,$key) {
                           return Html::a("<",$url,['class' => 'btn btn-success']);
                }
                ],
            'urlCreator' => function ($action, $model, $key, $index) {
                         if (($action === 'link') ) {
                             $url = Url::toRoute(['costheader/index']);
                             return $url;
                         }
                }                
            ],  
            [
                //refer to additional code in controller
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'unit_price',
                'hAlign' => 'right', 
                'vAlign' => 'middle',
                'width' => '7%',
                'format' => ['decimal', 2],
                'pageSummary' => true,
                'refreshGrid'=>true,
                'editableOptions' => [
                'asPopover' => false,      
                'header' => 'Unit Price', 
                'inputType' => kartik\editable\Editable::INPUT_SPIN,
                    'options' => [
                        'pluginOptions' => ['min' => 0.00, 'max' =>10000.00],                        
                    ]
                ],               
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'paid',
                'hAlign' => 'right', 
                'vAlign' => 'middle',
                'width' => '7%',
                'format' => ['decimal', 2],
                'pageSummary' => true,
                'refreshGrid'=>true,
                'editableOptions' => [
                'asPopover' => false, 
                'header' => 'Paid', 
                'inputType' => kartik\editable\Editable::INPUT_SPIN,
                    'options' => [
                        'pluginOptions' => ['min' => 0.00, 'max' =>10000.00],                        
                    ]
                ],               
            ], 
                  
];
echo kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'options' => ['style' => 'font-size:18px;'],
     // the id for the container ie. W1 is autogenerated. Refer to vendor/kartik-v/yii2-grid\gridview
    'containerOptions' => ['style'=>'overflow: auto'], 
    'pjax' => true,
    'pjaxSettings' =>['neverTimeout'=>false,
                      'options'=>['id'=>'kv-unique-id-1'],                      
                     ], 
    'bordered' => true,
    'striped' => true,
    'condensed' => false,
    'toolbar' => [
          ['content'=>Html::a('<i class="glyphicon glyphicon-repeat"></i>',['salesorderdetail/index', 'id' => Yii::$app->session['sales_order_id']],['data-pjax'=>0,'class'=> 'btn-default','title'=>'Reset Grid'])
          ],
          
    ],
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
    'heading'=> Company::findOne(1)->name . " - " . Company::findOne(1)->telephone . " - " . DateTime::createFromFormat("Y-m-d", Costheader::findOne($id=Yii::$app->session['cost_header_id'])->cost_date)->format("l, d F Y"),
    

    ],
    'exportConfig' => [
                   GridView::CSV => ['label' => 'Export as CSV','config' => $config_array, 'filename' => 'Cost_date-'.$cost_date.'_Printed_'.date('d-M-Y')],
                   GridView::HTML => ['label' => 'Export as HTML','config' => $config_array, 'filename' => 'Cost_date-'.$cost_date.'_Printed_'.date('d-M-Y')],
                   GridView::PDF => [ 'label' => 'Export as PDF','config' => $config_array, 'filename' => 'Cost_date-'.$cost_date.'_Printed_'.date('d-M-Y')], 
                   GridView::EXCEL=> ['label' => 'Export as EXCEL', 'filename' => 'Cost_date-'.$cost_date.'_Printed_'.date('d-M-Y')],
                   GridView::TEXT=> ['label' => 'Export as TEXT', 'filename' => 'Cost_date-'.$cost_date.'_Printed_'.date('d-M-Y')],
                ],
    
]);
?>

</div>   