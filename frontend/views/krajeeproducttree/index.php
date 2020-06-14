<?php
use yii\helpers\Html;
use kartik\tree\TreeView;
use frontend\models\KrajeeProductTree;

$this->title = Yii::t('app','Houses');
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Index'), 'url' => ['krajeeproducttree/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Refresh Database with active houses'), 'url' => ['krajeeproducttree/create']];
?>
<div class="krajeeproducttree-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
<?php  
    echo TreeView::widget([
        // single query fetch to render the tree
        'query' => KrajeeProductTree::find()->addOrderBy('root, lft'), 
        'headingOptions' => ['label' => 'Categories'],
        'fontAwesome' => false,      // optional
        'isAdmin' => true,         // optional (toggle to enable admin mode)
        'displayValue' => 1,        // initial display value
        'softDelete' => true,       // defaults to true
        'cacheSettings' => [        
            'enableCache' => true   // defaults to true
        ],
        'hideTopRoot'=>true,
        'treeOptions' => ['style' => 'height:1000px width:900px' ]
    ]); 
?>
</div>
