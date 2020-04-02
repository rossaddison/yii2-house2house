<?php
use yii\helpers\Html;
use frontend\modules\subscription\assets\SubscriptionAsset;
use yii\bootstrap4\Breadcrumbs;
/* @var $this \yii\web\View */
/* @var $content string */

SubscriptionAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>

<header>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="" class="logo" target="_blank">
                    <img src="" alt=""/>
                </a>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?= Breadcrumbs::widget([
            //an individual breadcrumb per page
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], 'activeItemTemplate' => "<li class=\"breadcrumb-item active\" aria-current=\"page\">{link}</li>\n"
              ]) 
                 ;
            ?>
            <div class="subscription-box">
                <?= $content ?>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="row">
            <br>
            <br>
            <div class="col-lg-3 col-md-3 col-sm-3">
             
            </div>
            <br>
            <br>
        </div> 
    </div>
</footer>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
