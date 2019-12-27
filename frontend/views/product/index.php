<?php
use yii\helpers\Html;
use \kartik\grid\GridView;
use \kartik\editable\Editable; 
use kartik\dialog\Dialog;
use yii\widgets\ListView;
use common\widgets\Alert;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\JqueryAsset;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use frontend\models\Company;
use frontend\models\Product;
use frontend\models\Productcategory;
use frontend\models\Productsubcategory;
use frontend\models\Salesorderheader;
use yii\bootstrap\ButtonDropdown;
use yii\data\ActiveDataProvider;
use kartik\icons\Icon;
use yii\db\connection;
use kartik\icons\FontAwesomeAsset;
FontAwesomeAsset::register($this);
//$this->registerJsFile('@web/js/scripts2.js',['depends' => [\yii\web\JqueryAsset::className()]]);
//$this->title = 'Houses Search';
$this->params['breadcrumbs'][] = ['label' => 'Houses', 'url' => ['product/index']];
$this->params['breadcrumbs'][] = $this->title;
if (Company::find()->count() == 0) {$comptel = 'Company Name and Mobile Number';} else {$comptel = Company::findOne(1)->name . " - " . Company::findOne(1)->telephone;};
$pdfHeader = [
  'L' => [
    'content' => $comptel ,
  ],
  'C' => [
    'content' => 'House',
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
    'content' => 'Filename: Houses_Printed_'.date('d-M-Y-h-s'),
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
        'title' => $comptel,
        'subject' => 'Houses',
        'keywords' => 'Houses'
      ],
    ];
$viewMsg = 'View';
$deleteMsg = 'Delete';
$updateMsg = 'Update';
$tooltipfrequency = Html::tag('span', 'Frequency', ['title'=>'If empty ...Create House and set frequency eg. monthly, weekly of the individual house.','data-toggle'=>'tooltip','style'=>'text-decoration: underline: cursor:pointer;']);
$tooltipgocardlesscustomer = Html::tag('span', 'Gocardless Mandate Approved Customers', ['title'=>'This customer number appears on Gocardless and indicates that the customer has approved the mandate that you sent to them.','data-toggle'=>'tooltip','style'=>'text-decoration: underline: cursor:pointer;']);
?>

<div class="product-index">
<h1><?= Html::encode($this->title) ?></h1>
<?php 
    ///echo $this->render('_search', ['model' => $searchModel]); 
?>
<?= Html::a('Create House', ['create'], ['class' => 'btn btn-success','title'=>'Have you setup your Postcode and street?','data-toggle'=>'tooltip']) ?>
       
   <button id="w5" class = "btn btn-success" onclick="js:getKeys()" title="Have you created your Daily Clean?" data-toggle="tooltip">Copy Selected to: </button>
   <?= Html::label('Daily Cleans Date: ') ?>
   <?= Html::dropDownList('sorder','', ArrayHelper::map(Salesorderheader::find()->orderBy('status')->all(),'sales_order_id','clean_date','status'),['prompt' => '--- select ---','id'=>'w9']) ?>
   <?= Html::a('Back', Url::previous(), ['class' => 'btn btn-success']) ?>    
        <Hr style = "border-top: 3px double #8c8b8b">
   <?php if (Yii::$app->user->can('Create Gocardlesscustomer')) { ?>
   <button id="w65" class = "btn btn-info" onclick="js:getCreategocardlesscustomer()" title="Clicking here will send an email to this customer, that you have ticked, with a link to the direct debit mandate created by the Gocardless API. The customer must approve this mandate within 30 minutes otherwise you will have to resend. The email will have a link to the Gocardless website. Once the customer has entered their bank details on the Gocardless website they will be redirected to this website to a Thank you for approval message. You will then have to acknowledge this mandate by pressing the button above House on the main menu.  Only then will you be able to send Payment Requests via email with the adjacent button: An email will be sent to the customer with a breakdown of the payment. This email will be followed up with an email from Gocardless. " data-toggle="tooltip">Email Direct Debit Mandate Link to Customer for their approval. (tick)</button>
   <button id="w665" class = "btn btn-info" onclick="js:getRequestgocardlesspayment()" title="Clicking here will send an email to this customer, that you have ticked, informing them that you are requesting payment. Payment amounts must not be less than &pound 1." data-toggle="tooltip">Email Payment Request to Customer. (tick)</button>
   <Hr style = "border-top: 3px double #8c8b8b">     
   <?php } ?>
   <?php if (!Yii::$app->user->can('Create Gocardlesscustomer')) { ?>
   <button id="w65" class = "btn btn-info" onclick="js:getCreategocardlesscustomer()" disabled = "disabled" title="Enable in Company Settings. Signup with Gocardless  under your company name and get an Access token from Gocardless. Enter this access token under Company...Gocardless Access Token. Change Sandbox to Live under Company settings. Once setup, clicking on this button will send an email to this customer, that you have ticked, with a link to the direct debit mandate created by the Gocardless API. The email will have a link to the Gocardless website. Once the customer has entered their bank details on the Gocardless website a confirmation of approval email will be sent by Gocardless to Company...email. Only then will you be able to issue a payment request by pressing the adjacent button. Your payment request total must exceed 100. Also make sure you have setup the Customer Email Address by clicking on the view button below." data-toggle="tooltip">Email Direct Debit Mandate Link to Customer for their approval. (tick)</button>
   <button id="w665" class = "btn btn-info" onclick="js:getRequestgocardlesspayment()" disabled = "disabled" title="Clicking here will send an email to this customer, that you have ticked, informing them that you are requesting payment. Payment amounts must not be less than &pound 1." data-toggle="tooltip">Email Payment Request to Customer. (tick)</button>
   <Hr style = "border-top: 3px double #8c8b8b">     
   <?php } ?>   

       <div class="info">
        <?=          
           Alert::widget()
        ?>
      
       </div>
<?php
    $gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    ['class' => 'kartik\grid\CheckboxColumn',
            'name'=>'selection',
            'multiple'=>true,
            'checkboxOptions'=>function ($dataProvider, $key, $index){
            return ['id'=>$dataProvider->id,'value' => $dataProvider->id];
            }
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
     'header'=>'Update',
     'vAlign'=>'middle',
     'updateOptions'=>['title'=>$updateMsg, 'data-toggle'=>'tooltip'],
     'template'=> '{update}',
    ],    
    ['class' => '\kartik\grid\EditableColumn',
                'attribute' =>'productnumber',
                'hAlign' => 'right', 
                'vAlign' => 'middle',
                'width' => '7%',
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
                'attribute' =>'contactmobile',
                'hAlign' => 'right', 
                'vAlign' => 'middle',
                'width' => '7%',
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
            'class' => 'kartik\grid\ActionColumn',
            'template' => '{link}',// can be omitted, as it is the default
            'header'=>'Call',
            'visible'=> Yii::$app->user->isGuest ? false : true,
            'buttons' => ['link' => function ($url, $dataProvider,$key) {
                           if (strlen($dataProvider->contactmobile)===11){
                           return Html::a($dataProvider->contactmobile,$url);}
                           else return '';
                }
             ],
            'urlCreator' => function ($action, $dataProvider, $key, $index) {
                         if (($action === 'link') ) {
                             $url = "tel:/".$dataProvider->contactmobile;
                             return $url;
                         }
             }                
     ],
     [  'class' => '\kartik\grid\EditableColumn',
        'attribute' =>'specialrequest',
        'hAlign' => 'left', 
        'vAlign' => 'middle',
        'width' => '7%',
        'refreshGrid'=>true,
        'headerOptions' => ['class' => 'kv-sticky-column'],
        'contentOptions' => [
                      'class' => 'kv-sticky-column',
                      'style'=>'max-width: 200px; overflow: auto; word-wrap: break-word;'
        ],
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
            'class'=>'kartik\grid\DataColumn',
            'header'=>$tooltipfrequency,
            'attribute'=>'frequency',
            'value' => function ($dataProvider) {
                    return $dataProvider->frequency; 
            },
             'filter'=> Html::activeDropDownList($searchModel,'frequency',ArrayHelper::map(Product::find()->orderBy('frequency')->asArray()->all(),'frequency','frequency'),['class'=>'form-control','prompt'=>'Please Select']), 
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
    [
            'class'=>'kartik\grid\DataColumn',
            'header'=>'Street',      
            'attribute'=>'productsubcategory_id', 
            'value' => function ($dataProvider) {
                       return $dataProvider->productsubcategory->name; 
             },
            'filter'=> Html::activeDropDownList($searchModel,'productsubcategory_id',ArrayHelper::map(Productsubcategory::find()->where(['productcategory_id'=>$searchModel])->orderBy('name')->asArray()->all(),'id','name'),['class'=>'form-control','prompt'=>'Please Select']),            
    ],
    [
    'class' => 'kartik\grid\EditableColumn',
    'header' => 'First Clean Date',
    'attribute' =>  'sellstartdate',
    'filter'=> Html::activeDropDownList($searchModel,'sellstartdate',ArrayHelper::map(Product::find()->orderBy('sellstartdate')->asArray()->all(),'sellstartdate','sellstartdate'),['class'=>'form-control','prompt'=>'From']),      
    'hAlign' => 'center',
    'vAlign' => 'middle',
    'width' => '9%',
    'format' => ['date', 'php:Y-m-d'],
    'refreshGrid'=>true,
    /**
     * @var string the cell format for EXCEL exported content.
     * @see http://cosicimiento.blogspot.in/2008/11/styling-excel-cells-with-mso-number.html
     */
    //'xlFormat' => "mmm\\-dd\\, \\-yyyy",
    //'xlFormat'=> 'yyyy-MM-dd',
    'headerOptions' => ['class' => 'kv-sticky-column'],
    'contentOptions' => ['class' => 'kv-sticky-column'],
    'readonly' => false,
    'editableOptions' => [
        'asPopover' => false,
        'size' => 'sm',
        'inputType' => \kartik\editable\Editable::INPUT_WIDGET,
        'widgetClass' =>  'kartik\datecontrol\DateControl',
        'options' => [
            'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
            //'displayFormat' => 'yyyy-MM-dd',
            //'displayFormat' => 'php:d-m-Y',
            'displayFormat' => 'php:Y-m-d',
            'saveFormat' => 'php:Y-m-d',
            'options' => [
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]
        ]
    ],
    ],                  
    'name',
    'surname',
    ['class' => '\kartik\grid\EditableColumn',
                'attribute' => 'listprice',
                'hAlign' => 'right', 
                'vAlign' => 'middle',
                'width' => '7%',
                'format' => ['decimal', 2],
                'pageSummary' => true,
                'refreshGrid'=>true,
                'editableOptions' => [
                'asPopover' => false,  
                'header' => 'Hrs', 
                'inputType' => \kartik\editable\Editable::INPUT_SPIN,
                    'options' => [
                        'pluginOptions' => ['min' => 1, 'max' =>1000],                        
                    ]
                ],                    
     ], 
     [
    'class' => 'kartik\grid\ExpandRowColumn',
    'header'=>'Debt',
    'expandTitle'=> 'Debt',
    'width' => '300px',
    'expandIcon' => Icon::show('balance-scale', ['framework' => Icon::FAS]),
    //'expandIcon' => Icon::show('thumbs-down', ['framework' => Icon::FAS]),  
    'value' => function ($dataProvider, $key, $index, $column) {
         return GridView::ROW_COLLAPSED;
    },
    'disabled'=> function ($dataProvider, $key, $index, $column) {
                    $rows  = $dataProvider->salesorderdetails;
                    $subtotal = 0.00;
                    foreach ($rows as $key => $value)
                             {
                               if ($rows[$key]['paid'] < $rows[$key]['unit_price'])
                               {
                                   $subtotal += $rows[$key]['unit_price']; 
                                   //$subtotal -= $rows[$key]['paid']; 
                               }
                             }
                    $subtotal = Yii::$app->formatter->asDecimal($subtotal, 2); 
                    if ($subtotal > 0.00) { return false;} else { return true;}
    },
    'detail' => function ($dataProvider, $key, $index, $column) {
        return Yii::$app->controller->renderPartial('_expandableviewdebtsheet', ['model' => $dataProvider]);
    },
    'headerOptions' => ['class' => 'kartik-sheet-style'], 
    'expandOneOnly' => true,
    ],
    [
    'class' => 'kartik\grid\DataColumn', 
    'format'=>'raw',
    'value' => function ($dataProvider, $key, $index, $column) {
                    $rows  = $dataProvider->salesorderdetails;
                    $subtotal = 0.00;
                    foreach ($rows as $key => $value)
                             {
                               if ($rows[$key]['paid'] < $rows[$key]['unit_price'])
                               {
                                   $subtotal += $rows[$key]['unit_price']; 
                                   //customers do not always pay full amount $subtotal -= $rows[$key]['paid'];
                               }
                             }
                    $subtotal = Yii::$app->formatter->asDecimal($subtotal, 2); 
                    if ($subtotal > 0.00) return $subtotal;
                        //." ". Icon::show('thumbs-down', ['framework' => Icon::FAS]);
                    else  return '';
                    //$subtotal." ". Icon::show('thumbs-up', ['framework' => Icon::FAS]);
     }
     ],
     [
            'class'=>'kartik\grid\DataColumn',
            'header'=>$tooltipgocardlesscustomer,
            'attribute'=>'gc_number',
            'value' => function ($dataProvider) {
                    return $dataProvider->gc_number; 
            },
            'filter'=> Html::activeDropDownList($searchModel,'gc_number',ArrayHelper::map(Product::find()->orderBy('gc_number')->asArray()->all(),'gc_number','gc_number'),['class'=>'form-control','prompt'=>'Please Select']), 
     ],    
];
echo kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'containerOptions' => ['style'=>'overflow: auto'], 
    'pjax' => true,
    'pjaxSettings' =>['neverTimeout'=>false,
                      'options'=>['id'=>'kv-unique-id-7'],                      
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
    'heading'=> $comptel ,
    

    ],
    'exportConfig' => [
                   GridView::CSV => ['label' => 'Export as CSV','config' => $config_array, 'filename' => 'Houses_Printed_'.date('d-M-Y')],
                   GridView::HTML => ['label' => 'Export as HTML','config' => $config_array, 'filename' => 'Houses_Printed_'.date('d-M-Y')],
                   GridView::PDF => [ 'label' => 'Export as PDF','config' => $config_array, 'filename' => 'Houses_Printed_'.date('d-M-Y')], 
                   GridView::EXCEL=> ['label' => 'Export as EXCEL', 'filename' => 'Houses_Printed_'.date('d-M-Y')],
                   GridView::TEXT=> ['label' => 'Export as TEXT', 'filename' => 'Houses_Printed_'.date('d-M-Y')],
                ],
  
]);
?> 
</div>

