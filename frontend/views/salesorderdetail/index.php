<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use \kartik\grid\GridView;
use \kartik\helpers;
use yii\helpers\Json;
use yii\web\JsExpression;
use frontend\models\Salesorderheader;
use frontend\models\Salesorderdetail;
use frontend\models\Company;
use frontend\models\Product;
use frontend\models\Instruction;
use frontend\components\Utilities;
use frontend\models\Messaging;
use yii\db\Query;
use yii\data\Sort;
use kartik\Editable\Editable;
use yii\bootstrap4\breadcrumbs;
use kartik\icons\Icon;
use kartik\icons\FontAwesomeAsset;
FontAwesomeAsset::register($this);
//use frontend\assets\AppAsset;
//use frontend\assets\ThemeAsset;
//AppAsset::register($this);
//ThemeAsset::register($this);
$this->title = 'Houses to clean';
$clean_date = DateTime::createFromFormat("Y-m-d", Salesorderheader::findOne($id=Yii::$app->session['sales_order_id'])->clean_date)->format("l, d F Y");
$clean_date_this = Salesorderheader::findOne($id=Yii::$app->session['sales_order_id'])->clean_date;
$status = Salesorderheader::findOne($id=Yii::$app->session['sales_order_id'])->status;
$pdfHeader = [
  'L' => [
    'content' => Company::findOne(1)->name . " - " . Company::findOne(1)->telephone . " - " . DateTime::createFromFormat("Y-m-d", Salesorderheader::findOne($id=Yii::$app->session['sales_order_id'])->clean_date)->format("l, d F Y"),
  ],
  'C' => [
    'content' => 'Daily Cleans',
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
    'content' => 'Filename: Clean_date-'.$clean_date.'_Printed_'.date('d-M-Y'),
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
        'title' => Company::findOne(1)->name . " - " . Company::findOne(1)->telephone . " - " . DateTime::createFromFormat("Y-m-d", Salesorderheader::findOne($id=Yii::$app->session['sales_order_id'])->clean_date)->format("l, d F Y"),
        'subject' => 'Daily Cleans',
        'keywords' => 'daily, clean, daily clean'
      ],
    ];
$this->params['breadcrumbs'][] = ['label' => 'Daily Cleans', 'url' => ['salesorderheader/index']];
$this->params['breadcrumbs'][] = ['label' => $clean_date];
$this->params['breadcrumbs'][] = $this->title;
$viewMsg = 'View';
$arr2 = Arrayhelper::map(Instruction::find()->orderBy('id')->asArray()->all(),'id','code');
$deleteMsg = 'Delete';
$updateMsg = 'Update';
$tooltiptextpaid = Html::tag('span', 'Text Paid', ['title'=>'Inform Boss of payment by text','data-toggle'=>'tooltip','style'=>'text-decoration: underline: cursor:pointer;']);
$tooltipunitprice = Html::tag('span', 'Unit Price', ['title'=>'Price charged per clean','data-toggle'=>'tooltip','style'=>'text-decoration: underline: cursor:pointer;']);
$tooltipprepyt = Html::tag('span', 'PrePyt', ['title'=>'Prepayment from a previous date. This cannot be edited since it is transferred from a previous date.','data-toggle'=>'tooltip','style'=>'text-decoration: underline: cursor:pointer;']);
$tooltipadvpyt = Html::tag('span', 'AdvPyt', ['title'=>'Cash received today for future clean date. Transfer to future date using button above.','data-toggle'=>'tooltip','style'=>'text-decoration: underline: cursor:pointer;']);
$tooltiptips = Html::tag('span', 'Tips', ['title'=>'All tips.','data-toggle'=>'tooltip','style'=>'text-decoration: underline: cursor:pointer;']);
$tooltipwhat = Html::tag('span', 'Do', ['title'=>'What is to be done. Load your codes under main menu instructions.','data-toggle'=>'tooltip','style'=>'text-decoration: underline: cursor:pointer;']);
$tooltiptotalowed = Html::tag('span', 'Debt', ['title'=>'Debt from previous cleans not including the current clean.','data-toggle'=>'tooltip','style'=>'text-decoration: underline: cursor:pointer;']);
$tooltipaddress = Html::tag('span', '', ['title'=>'Address','data-toggle'=>'tooltip','style'=>'text-decoration: underline: cursor:pointer;']);
$tooltiphousenumbermobile = Html::tag('span', 'Hse-Mbl', ['title'=>'Use this number to text your customer.','data-toggle'=>'tooltip','style'=>'text-decoration: underline: cursor:pointer;']);
?>
<div class="info">
<?php if(Yii::$app->session->hasFlash('success')){echo Yii::$app->session->getFlash('success');}?>
</div>
<div class="salesorderdetail-index">
<h1><?= Html::encode($this->title) ?></h1>

<?php 
   //although the search model is not used keep it since it affects "unpaid ticked" javascript
   //hide the fields within the search if you are not going to use it the actual search model itself.
   //echo $this->render('_search', ['model' => $searchModel]); 
?>
<p>
    <button id="w13" class = "btn btn-info btn-lg" onclick="js:getCleanedticks()" datatoggle="tooltip" title="Use the checkbox column to select all the houses that have been cleaned. All houses are assumed cleaned by default.">Cleaned (ticked)</button>
    <button id="w14" class = "btn btn-danger btn-lg" onclick="js:getMissedticks()">Missed (ticked)</button>
    <button id="w15" class = "btn btn-danger btn-lg" onclick="js:getNotcleanedticks()" datatoggle="tooltip" title="Use the checkbox column to select all the houses that have not been cleaned. All houses are assumed cleaned by default.">Not Cleaned (ticked)</button>
    <?php if (Yii::$app->user->can('Update Daily Job Sheet')) { ?>
    <button id="w10" class = "btn btn-success btn-lg" onclick="js:getPaidticks()">Paid (ticked)</button>
    <button id="w11" class = "btn btn-danger btn-lg" onclick="js:getUnpaidticks()">Unpaid (ticked)</button>
    <Hr style = "border-top: 3px double #8c8b8b">   
    <button id="w23" class = "btn btn-danger btn-lg" onclick="js:getAddpretopaid()">Add pre payment (ticked) to Paid</button>  
    <Hr style = "border-top: 3px double #8c8b8b">   
    <button id="w22" class = "btn btn-danger btn-lg" onclick="js:getTransferticks()">Transfer advance payments (ticked) to future pre-payment: </button> 
    <?= 
    Html::dropDownList('transadv','', ArrayHelper::map(Salesorderheader::find()->where(['>','clean_date',$clean_date_this])->andWhere(['status'=>$status])->orderBy('status')->all(),'sales_order_id','clean_date','status'),['prompt' => '--- select ---','id'=>'w61','class'=>'btn btn-danger  btn-lg','style'=>'width: 200px']) ?>
    
        
    <?php } ?>
    
    <button id="w33" class = "btn btn-danger dropdown-toggle btn-lg" type="button" data-toggle="dropdown" >Create Future Clean<span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><button id="w35" class = "btn btn-danger btn-lg" onclick="js:getCopyitbytodaysdatesalesorderdetail()">Today's date</button></li>  
                    <li><button id="w36" class = "btn btn-danger btn-lg" onclick="js:getCopyitbyfrequencysalesorderdetail()">+1 Month</button></li>    
                </ul>
    <br>
     <?php if (Yii::$app->user->can('Update Daily Job Sheet')) { ?>
    <div>
    <Hr style = "border-top: 3px double #8c8b8b">   
    <button id="w21" class = "btn btn-danger btn-lg" onclick="js:getGocardlesspayticks()" disabled="disabled" datatoggle="tooltip" title="This feature is currently disabled: Customers can be sent a direct debit variable mandate to consent to each time you need payment from them. ">Gocardless One-off (ticked)</button>
         <?= Html::a('Add House', ['product/index'], ['class' => 'btn btn-warning btn-lg','datatoggle'=>'tooltip', 'title'=> '"This button will take you to Houses to create one. You will then be able to transfer the house through to the list of houses that are part of the daily clean.']) ?>
         <?= Html::a('Back', ['salesorderheader/index'], ['class' => 'btn btn-success btn-lg']) ?>
        <Hr style = "border-top: 3px double #8c8b8b">
        <button id="w16" class = "btn btn-success btn-lg" onclick="js:getOwingticks()" disabled="disabled" datatoggle ="tooltip" title="Different message types can be sent to your customer using Twilio, a service that requires a subscription">SMS-(ticked)</button>
        <div>
           <br>
           <?= Html::label('Message: ') ?>
            <br>
           <?= Html::dropDownList('sdmessage','', ArrayHelper::map(Messaging::find()->all(),'id','message'),['prompt' => 'Message...','id'=>'w33','class'=>'btn btn-success btn-lg','disabled'=>'disabled' ,'style'=>'width: 200px']) ?>
        </div>
        <Hr style = "border-top: 3px double #8c8b8b">
    </div>
    <?php } ?>
    </br>
</p>

<?php 
use kartik\slider\Slider;
echo Html::label('Font Size Adjuster:<br>');
echo Slider::widget([
    'name' => 'sliderfontsalesdetail',
    'value'=> Yii::$app->session['sliderfontsalesdetail'],
    'options' => [
                   'id'=>'w528',
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
]). '<button id="w654" class = "btn btn-info btn-lg" onclick="js:getSlidersalesdetail()" title="Adjust to the required font." data-toggle="tooltip">Adjust font</button><br><br>';
   
?> 
<?php
    Yii::$app->formatter->nullDisplay = ''; 
    $gridColumns = [
    //['class' => 'kartik\grid\SerialColumn',      
    //],
    //'sales_order_id',
    //'sales_order_detail_id',
    [
            'class' => 'kartik\grid\CheckboxColumn',
            'name'=>'selection',
            'multiple'=>true,
            'checkboxOptions'=>function ($dataProvider, $key, $index){
            return ['id'=>$dataProvider->sales_order_detail_id,'value' => $dataProvider->sales_order_detail_id];
            }
    ],             
    [
            'class' => 'kartik\grid\DataColumn', // can be omitted, as it is the default
            'header'=>'Cleaned',
            'options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfontsalesdetail'].'px'],
            'value' => function ($dataProvider) {
                return $dataProvider->cleaned; // $data['name'] for array data, e.g. using SqlDataProvider.
            },
    ],
    [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'instruction_id',
            'value' => function ($dataProvider) {
                return $dataProvider->instructioncode->code; 
            },
            'header'=>$tooltipwhat,
            'hAlign' => 'right', 
            'vAlign' => 'middle',
            'width' => '7%',
            'pageSummary' => false,
            'refreshGrid'=>true,
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>Arrayhelper::map(Instruction::find()->orderBy('id')->asArray()->all(),'id','code'),
            'filterWidgetOptions'=>[
                   'pluginOptions'=>['allowClear'=>true],
            ],
            
            'editableOptions' => function ($dataProvider,$key,$index,$widget)
            {
                    $arr = Arrayhelper::map(Instruction::find()->where(['include'=>1])->orderBy('id')->asArray()->all(),'id','code','code_meaning');
                    return ['header'=>'Code',
                            'attribute'=>'instruction_id',
                            'size' => 'sm',
                            'format' =>Editable::FORMAT_BUTTON,
                            'inputType' => Editable::INPUT_DROPDOWN_LIST,
                                'options' => [
                                  'pluginOptions' => 
                                  [
                                    'autoclose' => true,
                                  ],
                                ],
                            'data'=>$arr,
                            'displayValueConfig'=>$arr,
                            ];
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
    'header'=>$tooltipaddress,  
    'expandTitle'=> 'Postcode and Street',
    'width' => '300px',
    'value' => function ($dataProvider, $key, $index, $column) {
        return GridView::ROW_COLLAPSED;
    },
    'detail' => function ($dataProvider, $key, $index, $column) {
        return Yii::$app->controller->renderPartial('_expandableview', ['postcode_id'=>$dataProvider->productcategory_id,'street_id'=>$dataProvider->productsubcategory_id]);
    },
    'headerOptions' => ['class' => 'kartik-sheet-style'], 
    'expandOneOnly' => true,
    ],      
            //[
            //'class' => 'kartik\grid\DataColumn', // can be omitted, as it is the default
            //'header'=>'Postcode',
            //'group'=>true,
            //'value' => function ($data) {
            //    return $data->productcategory->name; // $data['name'] for array data, e.g. using SqlDataProvider.
            //},
            //],
            //[
            //'class' => 'kartik\grid\DataColumn', // can be omitted, as it is the default
            //'header'=>'Street',
            //'group'=>true,  
            //'value' => function ($data) {
            //    return $data->productsubcategory->name; // $data['name'] for array data, e.g. using SqlDataProvider.
            //},
            //],    
            [
            'class' => 'kartik\grid\DataColumn', // can be omitted, as it is the default
            'options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfontsalesdetail'].'px'],    
            'header'=> 'Firstname',
            'value' => function ($dataProvider) {
                return $dataProvider->product->name; // $data['name'] for array data, e.g. using SqlDataProvider.
            },
            ],
            [
            'class' => 'kartik\grid\DataColumn',
            'options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfontsalesdetail'].'px'],     // can be omitted, as it is the default
            'header'=> 'Surname',
            'value' => function ($dataProvider) {
                return $dataProvider->product->surname; // $data['name'] for array data, e.g. using SqlDataProvider.
            },
            ],    
            [
            'class' => 'kartik\grid\ActionColumn',
            'template' => '{link}',// can be omitted, as it is the default
            'header'=>$tooltiphousenumbermobile,
            'visible'=> !Yii::$app->user->can('Update Daily Job Sheet') ? false : true,
            'buttons' => ['link' => function ($url, $dataProvider,$key) {
                           if (strlen($dataProvider->product->contactmobile)===11){
                           return $dataProvider->product->productnumber." ".Html::a($dataProvider->product->contactmobile,$url);}
                           else return $dataProvider->product->productnumber;
                }
                ],
            'urlCreator' => function ($action, $dataProvider, $key, $index) {
                         if (($action === 'link') ) {
                             $url = "tel:/".$dataProvider->product->contactmobile;
                             return $url;
                         }
                }                
            ],
            [
            'class' => 'kartik\grid\ActionColumn',
            'template' => '{link}',// can be omitted, as it is the default
            'header'=>'<',
            'visible'=> !Yii::$app->user->can('Update Daily Job Sheet') ? false : true,
            'buttons' => ['link' => function ($url, $dataProvider,$key) {
                           return Html::a("<",$url,['class' => 'btn btn-success']);
                }
                ],
            'urlCreator' => function ($action, $dataProvider, $key, $index) {
                         if (($action === 'link') ) {
                             $url = Url::toRoute(['salesorderheader/index']);
                             return $url;
                         }
                }                
            ],
            [
            'class' => 'kartik\grid\ActionColumn',
            'template' => '{link}',// can be omitted, as it is the default
            'header'=> $tooltiptextpaid,
            'visible'=> !Yii::$app->user->can('Update Daily Job Sheet') ? false : true,
            'buttons' => ['link' => function ($url, $dataProvider,$key) {
                           return Html::tag('span',Html::a("SMS",$url),['class' => 'btn btn-warning'],['title'=>$dataProvider->productsubcategory->name." paid ".$dataProvider->paid,'data-toggle'=>'tooltip',
                                                                 'style'=>'text-decoration: underline; cursor:pointer;'
                                                                    ]);
                }
                ],
            'urlCreator' => function ($action, $dataProvider, $key, $index) {
                         if (($action === 'link') ) {
                             $url = "tel:/".preg_replace("/[^0-9]/", "",Company::findOne(1)->telephone);
                             return $url;
                         }
                }             
            ], 
            [
            'class' => 'kartik\grid\DataColumn', // can be omitted, as it is the default
            'options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfontsalesdetail'].'px'],     
            'header'=>'Remind',
            'value' => function ($dataProvider) {
                return $dataProvider->product->specialrequest; // $data['name'] for array data, e.g. using SqlDataProvider.
            },
            ],      
            [
                //refer to additional code in controller
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'unit_price',
                'filterInputOptions' => [
                  //'options' => ['style' => 'font-size:18px;'],
                  'options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfontsalesdetail'].'px'], 
                  //'class'=> 'form=control-lg',
                  'placeholder' => 'Unit Price...'
                ],
                'header'=>$tooltipunitprice,
                'hAlign' => 'right', 
                'vAlign' => 'middle',
                'width' => '7%',
                'format' => ['decimal', 2],
                'pageSummary' => true,
                'refreshGrid'=>true,
                'editableOptions' => [
                'asPopover' => false, 
                'header' => 'Tip: Reduce to 0 if customer cancels', 
                'inputType' => kartik\editable\Editable::INPUT_SPIN,
                    'options' => [
                        'pluginOptions' => ['min' => 0.00, 'max' =>10000.00],                        
                    ]
                ],               
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'paid',
                'filterInputOptions' => ['class'=> 'input',
                  'options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfontsalesdetail'].'px'], 
                  'placeholder' => 'Paid...'
                ],
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
            [
            'class' => 'kartik\grid\DataColumn', // can be omitted, as it is the default
                'header'=>$tooltipprepyt,
                'options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfontsalesdetail'].'px'], 
                'hAlign' => 'right', 
                'vAlign' => 'middle',
                'width' => '7%',  
                'value' => function ($dataProvider) {
                     return $dataProvider->pre_payment; // $data['name'] for array data, e.g. using SqlDataProvider.
                },
            ],    
            [
               'class' => 'kartik\grid\ExpandRowColumn',
               'header'=>$tooltiptotalowed,                
               'expandTitle'=> 'Debt that has accumulated from previous cleans not including the current clean.',
               'expandIcon' => Icon::show('balance-scale', ['framework' => Icon::FAS]),
               'hAlign' => 'right', 
               'vAlign' => 'middle',
               'width' => '300px',
               'value' => function ($dataProvider, $key, $index, $column) {
                   return GridView::ROW_COLLAPSED;
               },
               'detail' => function ($dataProvider, $key, $index, $column) {
                   return Yii::$app->controller->renderPartial('_expandableviewdebtsheet', ['model' => $dataProvider]);
               },
               'disabled'=> function ($dataProvider, $key, $index, $column) {   
                                $q = new Query;
                                $rows = $q->select('unit_price')
                                ->from('works_salesorderdetail')
                                ->where(['and','product_id='.$dataProvider->product_id,'paid=0'])
                                ->andWhere('unit_price>0')
                                ->andWhere('sales_order_detail_id<'.$dataProvider->sales_order_detail_id)
                                ->all(); 
                                $subtotal = 0.00;
                                $i = 0;
                                foreach ($rows as $key => $value)
                                {
                                  $subtotal += $rows[$key]['unit_price']; 
                                  //$subtotal -= $rows[$key]['paid']; 
                                  $i = $i+1;
                                }
                                $subtotal = Yii::$app->formatter->asDecimal($subtotal, 2);; // $dat   
                                if ($subtotal > 0.00) { return false;} else { return true;}
                 },  
                'headerOptions' => ['class' => 'kartik-sheet-style'], 
                'expandOneOnly' => true,
            ], 
            [
               'class'=>'kartik\grid\DataColumn',
               'header'=>$tooltiptotalowed,
               'options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfontsalesdetail'].'px'], 
               'hAlign' => 'right', 
               'format'=>'raw',
               'vAlign' => 'middle',
               'width' => '7%',  
               'value' => function ($dataProvider) {
                            $q = new Query;
                            $rows = $q->select('unit_price')
                            ->from('works_salesorderdetail')
                            ->where(['and','product_id='.$dataProvider->product_id,'paid=0'])
                            ->andWhere('unit_price>0')
                            ->andWhere('sales_order_detail_id<'.$dataProvider->sales_order_detail_id)
                            ->all(); 
                            $subtotal = 0.00;
                            $i = 0;
                             foreach ($rows as $key => $value)
                             {
                               $subtotal += $rows[$key]['unit_price']; 
                               //$subtotal -= $rows[$key]['paid']; 
                               $i = $i+1;
                             }
                     $subtotal = Yii::$app->formatter->asDecimal($subtotal, 2);; // $data['name'] for array data, e.g. using SqlDataProvider.
                        if ($subtotal > 0.00) return $subtotal ." ". Icon::show('thumbs-down', ['framework' => Icon::FAS]);
                            else  
                                //return $subtotal." ". Icon::show('thumbs-up', ['framework' => Icon::FAS]);
                                return " ";
                     
                        },
            ],  
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'advance_payment',
                'header'=>$tooltipadvpyt,
                'hAlign' => 'right', 
                'vAlign' => 'middle',
                'width' => '7%',
                'format' => ['decimal', 2],
                'pageSummary' => true,
                'refreshGrid'=>true,
                'editableOptions' => [
                'header' => 'AdvPyt',
                'asPopover' => false,
                'inputType' => kartik\editable\Editable::INPUT_SPIN,
                    'options' => [
                        'pluginOptions' => ['min' => 0.00, 'max' =>10000.00],                        
                    ]
                ],               
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'tip',
                'header'=>$tooltiptips,
                //'visible'=> !Yii::$app->user->can('Update Daily Job Sheet') ? false : true,
                'hAlign' => 'right', 
                'vAlign' => 'middle',
                'width' => '7%',
                'format' => ['decimal', 2],
                'pageSummary' => true,
                'refreshGrid'=> true,
                'editableOptions' => [
                'asPopover' => false,  
                'header' => 'Tips',  
                'inputType' => kartik\editable\Editable::INPUT_SPIN,
                'options' => ['pluginOptions' => ['min' => 0.00, 'max' =>10000.00],]
                ],               
            ], 
];
  if ((empty(Yii::$app->session['sliderfontsalesdetail'])) && (!isset(Yii::$app->session['sliderfontsalesdetail']))){Yii::$app->session['sliderfontsalesdetail'] = 18;}                      
                        
echo kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfontsalesdetail'].'px'], 
    'columns' => $gridColumns,
     // the id for the container ie. W1 is autogenerated. Refer to vendor/kartik-v/yii2-grid\gridview
    'containerOptions' => ['style'=>'overflow: auto'], 
    'pjax' => true,
    'pjaxSettings' =>['neverTimeout'=>false,
                      'options'=>['id'=>'kv-unique-id-1'],                      
                     ], 
    'responsiveWrap'=>true,
    'bordered' => true,
    'bootstrap'=>true,
    'striped' => true,
    'condensed' => false,
    'toolbar' => [
          ['content'=>Html::a('<i class="fas fa-redo"></i>',['salesorderdetail/index', 'id' => Yii::$app->session['sales_order_id']],['data-pjax'=>0,'class'=> 'btn btn-danger','title'=>'Refresh Grid if data entered not displaying.'])
         ],
    ],
    'responsive' => true,
    'export'=>false,
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
    'heading'=> Company::findOne(1)->name . " - " . Company::findOne(1)->telephone . " - " . DateTime::createFromFormat("Y-m-d", Salesorderheader::findOne($id=Yii::$app->session['sales_order_id'])->clean_date)->format("l, d F Y"),

    ],
    'exportConfig' => [
                   GridView::CSV => ['label' => 'Export as CSV','config' => $config_array, 'filename' => 'Clean_date-'.$clean_date.'_Printed_'.date('d-M-Y')],
                   GridView::HTML => ['label' => 'Export as HTML','config' => $config_array, 'filename' => 'Clean_date-'.$clean_date.'_Printed_'.date('d-M-Y')],
                   GridView::PDF => [ 'label' => 'Export as PDF','config' => $config_array, 'filename' => 'Clean_date-'.$clean_date.'_Printed_'.date('d-M-Y')], 
                   GridView::EXCEL=> ['label' => 'Export as EXCEL', 'filename' => 'Clean_date-'.$clean_date.'_Printed_'.date('d-M-Y')],
                   GridView::TEXT=> ['label' => 'Export as TEXT', 'filename' => 'Clean_date-'.$clean_date.'_Printed_'.date('d-M-Y')],
                ],
    
]);
?>
</div>