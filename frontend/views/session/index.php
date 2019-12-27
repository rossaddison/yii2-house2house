<?php
use yii\helpers\Url;
use yii\helpers\Html;
use \kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sessions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="session-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    $gridColumns = [
      ['class' => 'yii\grid\ActionColumn'],
      ['class' => 'kartik\grid\SerialColumn'],
      [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{link}',
        'header'=>'Details',
        'visible'=> Yii::$app->user->can("Access Session") ? true : false,
        'buttons' => [ 
                'link' => function ($url, $model,$key) {
                                return Html::a('Details', $url);
                    },
        ],
        'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'link') {
                    $url =Url::toRoute(['sessiondetail/index', 'id' => $model->id]);
                    Yii::$app->session['sess_id'] = $model->id;
                    Url::remember();
                    return $url;
                }
        }
      ],
      'id',
      'expire',
      'data',
      'user_id',
    ];
   
   
    echo kartik\grid\GridView::widget([
      'dataProvider' => $dataProvider,
      //'filterModel' => $searchModel,
      'columns' => $gridColumns,
      //'bootstrap'=>'true',
      'containerOptions' => ['style'=>'overflow: auto'], 
      'pjax' => true,
      'pjaxSettings' =>['neverTimeout'=>true,
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
      //'export'=>false,
      'panel' => [
        'type' => GridView::TYPE_PRIMARY
      ],
      
   ]);  
   
 ?>
    
    

</div>
