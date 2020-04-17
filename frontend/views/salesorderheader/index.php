<?php
use yii\helpers\Url;
use yii\helpers\Html;
use \kartik\grid\GridView;
use kartik\grid\ExpandRowColumn;
use \kartik\datecontrol\DateControl;
use yii\helpers\Json;
use yii\widgets\Pjax;
use frontend\models\Salesorderdetail;
use frontend\models\Salesorderheader;
use yii\bootstrap4\breadcrumbs;
use yii\helpers\ArrayHelper;
use kartik\icons\FontAwesomeAsset;
FontAwesomeAsset::register($this);
$this->title = 'Daily Cleans';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['salesorderheader/index'], ];
$viewMsg = 'View';
$deleteMsg = 'Delete';
$updateMsg = 'Update';
$yearOnly = date('Y', strtotime(Date('Y-m-d')));
?>
<?php
//echo Breadcrumbs::widget([
//    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
//    'links' => [
//        [
//            'label' => 'Post Category',
//            'url' => ['post-category/view', 'id' => 10],
//            'template' => "<li><b>{link}</b></li>\n", // template for this link only
//        ],
//        ['label' => 'Sample Post', 'url' => ['post/edit', 'id' => 1]],
//        'Edit',
//    ],
//]);
?>





<div class="salesorderheader-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p> 
    <?php if (Yii::$app->user->can('Manage Admin')){ ?>    
        <?= Html::a('Create Daily Clean', ['create'], ['class' => 'btn btn-success btn-lg','data-toggle'=>'tooltip','title'=>'Click here to create a shell consisting of the clean date and a job code which is the name of your run. Copy houses from House to this clean date. To replicate this clean date in the future use the Ticked copy button. More than one job code or clean date can be ticked and copied into a new clean date if you are planning to do more than one run on the same day. ']) ?>
        <?= Html::a('Copy Houses to Daily Clean', ['product/index'], ['class' => 'btn btn-success btn-lg','data-toggle'=>'tooltip','title'=>'This will take you to House. Once you have entered your details for the householder you can copy the house across to your clean date.']) ?>
        <div class="dropdown">
            <button id="w25" class = "btn btn-danger dropdown-toggle btn-lg" type="button" data-toggle="dropdown" >(Ticked) Copy <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li class = "btn btn-danger btn-lg" onclick="js:getCopyitbybimonthly()" data-toggle="tooltip" title="If you tick one of the previous cleans, the detail will be copied to a date roughly two months ahead of its date. Adjust the date once copied to get a more realistic date.">+ 2 month</li>    
                    <li class = "btn btn-danger btn-lg" onclick="js:getCopyitbyfrequency()" data-toggle="tooltip" title="If you tick one of the previous cleans, the detail will be copied to a date roughly one month ahead of its date. Adjust the date once copied to get a more realistic date.">+ 1 month</li>    
                    <li class = "btn btn-danger btn-lg" onclick="js:getCopyitbyfortnight()" data-toggle="tooltip" title="If you tick one of the previous cleans, the detail will be copied to a date roughly two weeks ahead of its date. Adjust the date once copied to get a more realistic date.">+ fortnight / + 2 weeks</li> 
                    <li class = "btn btn-danger btn-lg" onclick="js:getCopyitbyweek()" data-toggle="tooltip" title="If you tick one of the previous cleans, the detail will be copied to a date roughly one week ahead of its date. Adjust the date once copied to get a more realistic date.">+ 1 week</li> 
                    <li class = "btn btn-danger btn-lg" onclick="js:getCopyitbytodaysdate()" data-toggle="tooltip" title="If you tick one of the previous cleans, the detail will be copied to a date identical to today's date.">Using today's date</li>
                </ul>
        </div>
        <div>
            <!--<Hr style = "border-top: 3px double #8c8b8b">-->   
            <!--<button id="w95" class = "btn btn-success" onclick="js:getYearmonth()">Revenue:</button>-->
            <?php //Html::dropDownList('sorderyear','',[$yearOnly+1=>$yearOnly+1,$yearOnly=>$yearOnly,$yearOnly-1=>$yearOnly-1,$yearOnly-2=>$yearOnly-2] ,['prompt' => 'Year','class'=>'btn btn-success','id'=>'w79']) ?>
            <?php //Html::dropDownList('sordermonth','',[1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December'] ,['prompt' => 'Month','class'=>'btn btn-success','id'=>'w89']) ?>  
            <!--<Hr style = "border-top: 3px double #8c8b8b">-->     
        </div>
        <Hr style = "border-top: 3px double #8c8b8b">
        <div>
       
        <?= Html::label('Revenue'); ?> 
        <?= Html::a(($yearOnly-3), ['salesorderheader/totalannualrevenue/'.($yearOnly-3)], ['class' => 'btn btn-success btn-lg']) ?>
        <?= Html::a(($yearOnly-2), ['salesorderheader/totalannualrevenue/'.($yearOnly-2)], ['class' => 'btn btn-success btn-lg']) ?>
        <?= Html::a(($yearOnly-1), ['salesorderheader/totalannualrevenue/'.($yearOnly-1)], ['class' => 'btn btn-success btn-lg']) ?>
        <?= Html::a($yearOnly, ['salesorderheader/totalannualrevenue/'.$yearOnly], ['class' => 'btn btn-success btn-lg']) ?>
        <?= Html::a(($yearOnly+1), ['salesorderheader/totalannualrevenue/'.($yearOnly+1)], ['class' => 'btn btn-success btn-lg']) ?>
            <Hr style = "border-top: 3px double #8c8b8b">      
        </div>
    <?php } ?>    
    </p>
<?php 
use kartik\slider\Slider;
echo Html::label('Font Size Adjuster:<br>');
echo Slider::widget([
    'name' => 'sliderfont',
    'value'=>Yii::$app->session['sliderfont'],
    'options' => [
                   'id'=>'w88',
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
]). '<button id="w54" class = "btn btn-info btn-lg" onclick="js:getSlider()" title="Adjust to the required font." data-toggle="tooltip">Adjust font</button><br><br>';
   
?> 
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
    ['class' => 'kartik\grid\DataColumn',
     'attribute'=> 'sales_order_id',
     'filterInputOptions' => [
                  'class'       => 'form-control=lg',
                  'placeholder' => 'Id...'
                ],
    ],
    [
    'class' => 'kartik\grid\ExpandRowColumn',
    'width' => '300px',
    'value' => function ($model, $key, $index, $column) {
        return GridView::ROW_COLLAPSED;
    },
    'detail' => function ($model, $key, $index, $column) {
        return Yii::$app->controller->renderPartial('_expandableview', ['model' => $model]);
    },
    'disabled'=> function ($data, $key, $index, $column) {
                    $rows  = $data->salesorderdetails;
                    if (!empty($rows)) { return false;} else { return true;}
    },    
    'headerOptions' => ['class' => 'kartik-sheet-style'], 
    'expandOneOnly' => true,
    ],
    [
                    'class' => 'kartik\grid\ActionColumn',
                    'template' => '{link}',
                    'header'=>'Cleans',
                    'visible'=> Yii::$app->user->can('Manage Admin'),
                    'buttons' => [
                            'link' => function ($url, $model,$key) {
                                            return Html::a('Cleans', $url);
                                },
                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                            if ($action === 'link') {
                                $url =Url::toRoute(['/salesorderdetail/index', 'id' => $model->sales_order_id]);
                                Yii::$app->session['sales_order_id'] = $model->sales_order_id;
                                Url::remember();
                                return $url;
                            }
                    }
    ],
    [
            'class'=>'kartik\grid\DataColumn',
            'attribute' => 'status',
            'value' => 'status',
            'options' => [ 'class'=> 'form=control-lg'],
            'filter'=> Html::activeDropDownList($searchModel,'status',ArrayHelper::map(Salesorderheader::find()->orderBy('status')->asArray()->all(),'status','status'),[ 'options' => [ 'class'=> 'form=control-lg'],'prompt'=>'Job Code...']),
    ],
    //[
    //        'class' => 'kartik\grid\DataColumn', // can be omitted, as it is the default
    //        'header'=>'Employee',
    //        'value' => function ($data) {
    //             $url = "tel:/".$data->employee->contact_telno;
    //             //there are no names under employee ..frontend/migrations/mass
    //             $name = $data->employee->title;
    //             $mobile = $data->employee->contact_telno;
    //             $name_and_mobile = $name."  ".$mobile;
    //             $button_or_nobutton = ['class' => 'btn btn-info'];   
    //             return Html::a($name_and_mobile,$url,$button_or_nobutton);            
    //        },
    //],
    [
    'class' => 'kartik\grid\EditableColumn',
    'header' => 'Clean Date',
    'attribute' =>  'clean_date',
    'filter'=> Html::activeDropDownList($searchModel,'clean_date',ArrayHelper::map(Salesorderheader::find()->orderBy(['clean_date'=>SORT_DESC])->asArray()->all(),'clean_date','clean_date'),
    [
        'class'=> 'form=control-lg',
        //'options' => ['style' => 'font-size:18px;'],
        'prompt'=>'From Date...'
    ]),
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
    ['class'=>'kartik\grid\DataColumn',
             'header'=>'Total Due',
             'hAlign'=>'right',
             'visible' => Yii::$app->user->can('See Prices'),
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
             'visible' => Yii::$app->user->can('See Prices'),
             'format'=>['decimal', 2], 
             'value'=> function($data){
                $subtotal = 0.00;
                $subtotal =  number_format($subtotal,2);
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
   [
    'class' => 'kartik\grid\ActionColumn',
    'dropdown' => true,
    'visible' => Yii::$app->user->can('Create Daily Clean'),
    'dropdownOptions' => ['class' => 'pull-right'],
    'template'=> '{view} {update}',

    //'urlCreator' => function($action, $model, $key, $index) {
    ////                    return $action."?id=".$model->sales_order_id;
    //                   
    //                },
    'viewOptions' => ['title' => $viewMsg, 'data-toggle' => 'tooltip'],
    'updateOptions' => ['title' => $updateMsg, 'data-toggle' => 'tooltip'],
    //'deleteOptions' => ['title' => $deleteMsg,'data-toggle' => 'tooltip','data-method'=>'post','data-confirm'=>'Are you sure you want to delete this item?',],
    //'deleteOptions'=>['title' => $deleteMsg,'data-toggle' => 'tooltip','params' => ['id' => $model->sales_order_id, 'salesorderdelete' => true],'url'=>['delete', 'id' => $model->sales_order_id],],                    
    'headerOptions' => ['class' => 'kartik-sheet-style'],
    ], 
               
   //['class' => 'kartik\grid\ActionColumn',
   //  'dropdown' => false,
   //  'header'=>'View',
   //  'vAlign'=>'middle',
   //  'viewOptions'=>['title'=>$viewMsg, 'data-toggle'=>'tooltip'],
   //  'template'=> '{view}',
   //],
             
   ];
   if ((empty(Yii::$app->session['sliderfont'])) && (!isset(Yii::$app->session['sliderfont']))){Yii::$app->session['sliderfont'] = 18;}
   echo kartik\grid\GridView::widget([
      'dataProvider' => $dataProvider,
      'options' => ['style'=> 'font-size:'.Yii::$app->session['sliderfont'].'px'],
      'rowOptions'=>function($model){
            if($model->clean_date == date('Y-m-d')){
                
                 return ['style'=>'background-color: #ffffff;'];
            }
            if($model->clean_date == date('Y-m-d',strtotime("-1 day"))){
                
                 return ['style'=>'background-color: #ffcccc;'];
            }
            if($model->clean_date == date('Y-m-d',strtotime("-2 day"))){
                
                 return ['style'=>'background-color:  #ffb3b3;'];
            }
            if($model->clean_date == date('Y-m-d',strtotime("-3 day"))){
                
                 return ['style'=>'background-color:   #ff9999;'];
            }
            if($model->clean_date == date('Y-m-d',strtotime("-4 day"))){
                
                 return ['style'=>'background-color:   #ff8080;'];
            }
            if($model->clean_date == date('Y-m-d',strtotime("+1 day"))){
                
                 return ['style'=>'background-color:    #e6ffe6;'];
            }
            if($model->clean_date == date('Y-m-d',strtotime("+2 day"))){
                
                 return ['style'=>'background-color:  #ccffcc;'];
            }
            if($model->clean_date == date('Y-m-d',strtotime("+3 day"))){
                
                 return ['style'=>'background-color:   #b3ffb3;'];
            }
            if($model->clean_date == date('Y-m-d',strtotime("+4 day"))){
                
                 return ['style'=>'background-color:   #99ff99;'];
            }
       },
      'filterModel' => $searchModel,
      'columns' => $gridColumns,
      'bootstrap'=>'true',
      'containerOptions' => ['style'=>'overflow: auto'], 
      'pjax' => true,
      'pjaxSettings' =>['neverTimeout'=>true,
      ////Using Pjax in YII2 for updating a div
                      'options'=>['id'=>'kv-unique-id-0','linkSelector' => '#w25 button'],                      
                     ], 
      'responsiveWrap'=>true,
      'bordered' => true,
      'striped' => true,
      'condensed' => false,
      'toolbar' => [
          ['content'=>Html::a('<i class="fas fa-redo"></i>',['salesorderheader/index',
            // 'id' => ??
          ],
          ['data-pjax'=>0,'class'=> 'btn btn-danger btn-lg',
          'title'=>'Refresh Grid if data entered not displaying.'])
         ],
       ],
      'responsive' => true,
      'hover' => true,
      'floatHeader' => false,
      'showPageSummary' => true,
      'export'=>false,
      'panel' => [
        'type' => GridView::TYPE_PRIMARY
      ],
      
   ]); 
?>

</div>
