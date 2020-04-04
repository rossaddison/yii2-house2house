<?php
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
//use yii\widgets\Breadcrumbs;
use yii\bootstrap4\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\models\Company;
use common\widgets\Alert;
use kartik\social\GoogleAnalytics;
use kartik\icons\Icon;
use yii\web\UrlManager;
////use frontend\modules\subscription\components\Tools;
////use frontend\modules\subscription\components\Configpaypal;
use frontend\components\Utilities;
use kartik\icons\FontAwesomeAsset;
use sjaakp\pluto\widgets\LoginMenu;
use sjaakp\pluto\models\User;
use Yii;

$iduser = Yii::$app->user->id;
$user = User::findOne($iduser);

$tooltipcarousal = 'Include snap shots, pdf, xlsx, ods file types from your phone here. These can be selected as a dropdown list under Daily Cleans or under Daily Costs.';
FontAwesomeAsset::register($this);
\yii\web\JqueryAsset::register($this);
AppAsset::register($this);
$js = <<< 'SCRIPT'
$(function () { 
    $("[data-toggle='tooltip']").tooltip(); 
});

$(function () { 
    $("[data-toggle='popover']").popover(); 
});
SCRIPT;
// Register tooltip/popover initialization javascript
$this->registerJs($js);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"> 
    <script src="https://kit.fontawesome.com/85ba10e8d4.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>    
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    
    <?php
    $brandlabel = "House-2-House ". '<i class="fas fa-chevron-right fa-1x"></i>'.'<i class="fas fa-chevron-right fa-1x"></i>'.'<i class="fas fa-chevron-right fa-1x"></i>';
    NavBar::begin([
        'brandLabel' => $brandlabel,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
              'class' => 'navbar navbar-dark bg-dark',
        ],
    ]);
    $check_howmany_mandates = 0;
    $mandates_available = [];
    if (!Yii::$app->user->isGuest){
         if (Yii::$app->user->can('Manage Basic')){
             $check_howmany_mandates = Utilities::check_for_mandates_approved();             
         } // Yii::$app->user->can('Manage Admin'))
         
         $menuItems = [    
                ['label' => Html::button('Secure',['class'=>'btn btn-success btn-lg']),'url'=> '','visible'=>Yii::$app->user->can('Manage Basic'),
                 'items' => [
                         ['label' => Html::button('Company',['class'=>'btn btn-info btn-lg']), 'url' => ['/company/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         //['label' => Html::button('Twilio Texting - Messages',['class'=>'btn btn-info']), 'url' => ['/messaging/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         //['label' => Html::button('Twilio Message Log', ['class'=>'btn btn-info']),'url' => ['/messagelog/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => Html::button('Employee',['class'=>'btn btn-info btn-lg']), 'url' => ['/employee/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => Html::button('Tax Codes',['class'=>'btn btn-info btn-lg','title'=>'Used to categorize revenue and expenses. These codes are NOT used in any VAT calculations. In fact there are no vat calculations therefore figures that you enter eg. under Daily Cleans or House must be inclusive of vat.','data-toggle'=>'tooltip']), 'url' => ['/tax/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => Html::button('Images/Files Upload',['class'=>'btn btn-info btn-lg','datatoggle'=>'tooltip', 'title'=> $tooltipcarousal]), 'url' => ['/carousal/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => Html::button('Instruction',['class'=>'btn btn-info btn-lg']), 'url' => ['/instruction/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => Html::button('Postcode',['class'=>'btn btn-success btn-lg']), 'url' => ['/productcategory/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => '&nbsp;' .'&nbsp;'.Html::button('Street',['class'=>'btn btn-success btn-lg']), 'url' => ['/productsubcategory/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => '&nbsp;' .'&nbsp;' .'&nbsp;'.Html::button('Quick Build',['class'=>'btn btn-danger btn-lg']), 'url' => ['/easy/initialize'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => '&nbsp;' .'&nbsp;' .'&nbsp;'.'&nbsp;' .'&nbsp;'.Html::button('House',['class'=>'btn btn-success btn-lg']), 'url' => ['/product/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => Html::button('Acknowledge Mandates ('.$check_howmany_mandates.')',['class'=>'btn btn-danger btn-lg']), 'url' => ['/product/acknowledge_mandates'],'visible'=>($check_howmany_mandates > 0)],
                         ['label' => '&nbsp;' .'&nbsp;'.'&nbsp;' .'&nbsp;'.'&nbsp;' .'&nbsp;'.Html::button('Daily Cleans',['class'=>'btn btn-success btn-lg']), 'url' => ['/salesorderheader/index'],'visible'=>Yii::$app->user->can('Manage Basic')],
                         ['label' => Html::button('Costcode',['class'=>'btn btn-warning btn-lg']), 'url' => ['/costcategory/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => '&nbsp;' .'&nbsp;'.Html::button('Costsubcode',['class'=>'btn btn-warning btn-lg']), 'url' => ['/costsubcategory/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => '&nbsp;' .'&nbsp;'.'&nbsp;' .'&nbsp;'.Html::button('Cost',['class'=>'btn btn-warning btn-lg']), 'url' => ['/cost/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => '&nbsp;' .'&nbsp;'.'&nbsp;' .'&nbsp;'.'&nbsp;' .'&nbsp;'.Html::button('Daily Costs',['class'=>'btn btn-warning btn-lg']), 'url' => ['/costheader/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => Html::button('Import Houses',['class'=>'btn btn-danger btn-lg']), 'url' => ['/importhouses/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         
                   ],
                ],
                ['label' => Html::button('Admin',['class'=>'btn btn-success btn-lg']),'url'=> '', 'visible'=>Yii::$app->user->can('manageRoles'),
                 'items' => [
                            ['label' => Html::button('Backup',['class'=>'btn btn-danger btn-lg']), 'url' => ['/backuper/backuper/index/'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button('Role Management (Admin)',['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/role'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.'&nbsp;'.'&nbsp;'.Html::button('Update Admin',['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/role/update/admin'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button('Permission Management (Admin)',['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/permission'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button('Conditions/Rules Management (Admin)',['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/rule/index'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button('User Management (Support and Admin)',['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/user'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button('Delete a User',['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/delete'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button('Download User Data',['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/download'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button('Change User Name or Email Address', ['class'=>'btn btn-info btn-lg']),'url' => ['/libra/settings'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button('User forgot their password',['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/forgot'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button('Signup a User',['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/signup'],'visible'=>Yii::$app->user->can('manageRoles')],                           
                 ],
                ],
                ['label' => Html::button('Quicknote',['class'=>'btn btn-danger btn-lg']),'url'=> '/quicknote/create', 'visible'=>Yii::$app->user->can('Manage Basic'),
                 'items' => [
                        
                ],
                ],
             ];
    }
    
    if (Yii::$app->user->isGuest) {
             $menuItems[] = ['label' => Html::button('Home',['class'=>'btn btn-success btn-lg','title'=>'Home','data-toggle'=>'tooltip']), 'url' => ['/site/index'],];
             $menuItems[] = ['label' => Html::button('Login',['class'=>'btn btn-success btn-lg','title'=>'Login','data-toggle'=>'tooltip']), 'url' => ['/libra/login']];
             $menuItems[] = ['label' => Html::button('Forum',['class'=>'btn btn-success btn-lg','title'=>'Forum','data-toggle'=>'tooltip']), 'url' => ['/flarum/public']];
        
    } else {
    
        $menuItems[] = '<li>'
            . Html::beginForm(['/libra/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->attributes['name'].')',
                ['class' => 'btn btn-success logout btn-lg']
            )
            . Html::endForm()
            . '</li>';
    }
    
   
    
    
    
    echo Nav::widget([
        'encodeLabels'=> false,
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    
    <div class="container-fluid" >
        
        <?= Breadcrumbs::widget([
            //an individual breadcrumb per page
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], 'activeItemTemplate' => "<li class=\"breadcrumb-item active\" aria-current=\"page\">{link}</li>\n"
        ]) 
            ;
        ?>
        <div class="info">
        <?=          
           Alert::widget()
        ?>
        </div>
        <?= $content ?>
    </div>
</div>
 
 <footer class="footer">
 <div class="container-fluid">    
     <div class="alert alert-success" role="alert" style ="background:lightcyan" align="center">
            <p class="center">&copy; <?php echo date('Y');?> Roundrunner  - All rights reserved </p>
            <p class="center">Online ~ Regular Services Management Software </p>
            <p class="center">Host with One.com and use our referral code at <?= Html::a('http://one.me/enahqymw','http://one.me/enahqymw'); ?> to get a &pound; 5.00 discount  </p>
      </div> 
 </div>
</footer> 
<?= \bizley\cookiemonster\CookieMonster::widget([
        'content' => [
            'buttonMessage' => 'OK. Got it', // instead of default 'I understand'
            'mainMessage'=> 'We use cookies on this website to help us offer you the best online experience. By continuing to use our website, you are agreeing to our use of cookies and to our privacy policy.'
                    ],
        'mode' => 'bottom'
    ]) ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>