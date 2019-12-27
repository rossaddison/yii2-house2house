<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use frontend\models\Productcategory;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductcategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Postcode (eg. N19 - Islington)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productcategory-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Postcode Finder', "http://pcf.raggedred.net/", ['class' => 'btn btn-success']) ?>
        <?= Html::a('Create Postcode eg. N19 - Islington', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout'=>"\n{items}{summary}\n{pager}",
        'pager' => [
            'firstPageLabel' => '<span class="page-link"><i class ="fa fa-chevron-left"></i></span>',
            'lastPageLabel' => '<span class="page-link"><i class ="fa fa-chevron-right"></i></span>',
            'prevPageLabel' => '<span class="page-link">Previous</span>',
            'nextPageLabel' => '<span class="page-link">Next</span>',
            'pageCssClass'=>'btn btn-light',
            'activePageCssClass' => 'active',  
            'maxButtonCount'=> 5,
            'options'=> ['class'=> 'pagination'], 
        ],
        'itemOptions' => ['class' => 'page-item'],
        'itemView' => function ($model, $key, $index, $widget) {
             return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
        },
    ]) ?>
    <?php
       //$products = [];
       //$products = Productcategory::find()->with('product','productsubcategories')->where(['id' => 4])->one();
       //var_dump($products['product']);
    ?>
</div>

