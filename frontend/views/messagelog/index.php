<?php
use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Messagelog';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messagelog-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Messagelog', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            ['class' => 'kartik\grid\CheckboxColumn',
                    'name'=>'selection',
                    'multiple'=>true,
                    'checkboxOptions'=>function ($model, $key, $index){
                    return ['id'=>$model->salesorderdetail_id,'value' => $model->salesorderdetail_id];
            }
            ],
            'message',
            'date',
            'phoneto',
            ['class' => 'kartik\grid\ActionColumn',
                    'template' => '{link}',
                    'header'=>'Clean',
                    'visible'=> Yii::$app->user->isGuest ? false : true,
                    'buttons'=>[
                        'link' => function ($url, $data,$key) {
                            return Html::a($data->product->name, $url);
                        }
                    ],
                    'urlCreator' => function ($action, $data, $key, $index) {
                           if ($action === 'link') {
                                   $url=Url::toRoute(['salesorderdetail/view', 'id' => $data->salesorderdetail->sales_order_detail_id]);
                                   Url::remember();
                                   return $url;
                           }
                    }
           ],
           ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
</div>
