<?php
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\components\Utilities;
use kartik\icons\FontAwesomeAsset;
use sjaakp\pluto\models\User;
use Yii;
$iduser = Yii::$app->user->id;
$user = User::findOne($iduser);
$tooltipcarousal = Yii::t('app','Include snap shots, pdf, xlsx, ods file types from your phone here. These can be selected as a dropdown list under Daily Cleans or under Daily Costs.');
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
    $brandlabel = Yii::t('app','House 2 house'). '<i class="fas fa-chevron-right fa-1x"></i>'.'<i class="fas fa-chevron-right fa-1x"></i>'.'<i class="fas fa-chevron-right fa-1x"></i>';
    NavBar::begin([
        'brandLabel' => $brandlabel,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
              'class' => 'navbar navbar-dark bg-dark',
        ],
    ]);
    $check_howmany_mandates = 0;
    $mandates_available = [];
    //paypal subscription is inactive === 2
    if (((!Yii::$app->user->isGuest) && (Yii::$app->session['sub'] < 2)) || (!Yii::$app->user->isGuest && Yii::$app->user->can('Subscription Free Privilege'))){
         if (Yii::$app->user->can('Manage Basic')){
             $check_howmany_mandates = Utilities::check_for_mandates_approved();             
         } // Yii::$app->user->can('Manage Admin'))
         if ((Yii::$app->session['sub'] === 1) || (Yii::$app->user->can('Subscription Free Privilege')))
         {
         $menuItems = [    
                ['label' => Html::button(Yii::t('app','Secure'),['class'=>'btn btn-success btn-lg']),'url'=> '','visible'=>Yii::$app->user->can('Manage Basic'),
                 'items' => [
                         ['label' => Html::button(Yii::t('app','Company'),['class'=>'btn btn-info btn-lg']), 'url' => ['/company/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => Html::button(Yii::t('app','Texting - Messages'),['class'=>'btn btn-info btn-lg']), 'url' => ['/messaging/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => Html::button(Yii::t('app','Message Log'), ['class'=>'btn btn-info btn-lg']),'url' => ['/messagelog/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => Html::button(Yii::t('app','Employee'),['class'=>'btn btn-info btn-lg']), 'url' => ['/employee/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => Html::button(Yii::t('app','Tax Codes'),['class'=>'btn btn-info btn-lg','title'=>Yii::t('app','Used to categorize revenue and expenses. These codes are NOT used in any VAT calculations. In fact there are no vat calculations therefore figures that you enter eg. under Daily Cleans or House must be inclusive of vat.'),'data-toggle'=>'tooltip']), 'url' => ['/tax/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => Html::button(Yii::t('app','Images / Files Upload'),['class'=>'btn btn-info btn-lg','datatoggle'=>'tooltip', 'title'=> $tooltipcarousal]), 'url' => ['/carousal/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => Html::button(Yii::t('app','Instruction'),['class'=>'btn btn-info btn-lg']), 'url' => ['/instruction/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => Html::button(Yii::t('app','Postcode'),['class'=>'btn btn-success btn-lg']), 'url' => ['/productcategory/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => '&nbsp;' .'&nbsp;'.Html::button(Yii::t('app','Street'),['class'=>'btn btn-success btn-lg']), 'url' => ['/productsubcategory/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => '&nbsp;' .'&nbsp;' .'&nbsp;'.Html::button(Yii::t('app','Quick Build'),['class'=>'btn btn-danger btn-lg']), 'url' => ['/easy/initialize'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => '&nbsp;' .'&nbsp;' .'&nbsp;'.'&nbsp;' .'&nbsp;'.Html::button(Yii::t('app','House'),['class'=>'btn btn-success btn-lg']), 'url' => ['/product/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => Html::button(Yii::t('app','Acknowledge Mandates (').$check_howmany_mandates.')',['class'=>'btn btn-danger btn-lg']), 'url' => ['/product/acknowledge_mandates'],'visible'=>($check_howmany_mandates > 0)],
                         ['label' => '&nbsp;' .'&nbsp;'.'&nbsp;' .'&nbsp;'.'&nbsp;' .'&nbsp;'.Html::button(Yii::t('app','Daily Cleans'),['class'=>'btn btn-success btn-lg']), 'url' => ['/salesorderheader/index'],'visible'=>Yii::$app->user->can('Manage Basic')],
                         ['label' => Html::button(Yii::t('app','Costcode'),['class'=>'btn btn-warning btn-lg']), 'url' => ['/costcategory/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => '&nbsp;' .'&nbsp;'.Html::button(Yii::t('app','Costsubcode'),['class'=>'btn btn-warning btn-lg']), 'url' => ['/costsubcategory/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => '&nbsp;' .'&nbsp;'.'&nbsp;' .'&nbsp;'.Html::button(Yii::t('app','Cost'),['class'=>'btn btn-warning btn-lg']), 'url' => ['/cost/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => '&nbsp;' .'&nbsp;'.'&nbsp;' .'&nbsp;'.'&nbsp;' .'&nbsp;'.Html::button(Yii::t('app','Daily Costs'),['class'=>'btn btn-warning btn-lg']), 'url' => ['/costheader/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         ['label' => Html::button(Yii::t('app','Import Houses'),['class'=>'btn btn-danger btn-lg']), 'url' => ['/importhouses/index'],'visible'=>Yii::$app->user->can('Manage Admin')],
                         //the admin role does not inherit the support role. The installer controller under rules rejects those that do not hava the support role so admin is rejected. Only managers db1 upwards will get this ability.
                         ['label' => Html::button(Yii::t('app','Install database'),['class'=>'btn btn-danger btn-lg','title'=>Yii::t('app','Non-administrators ie. managers can install their own database once they have logged in.'),'data-toggle'=>'tooltip']), 'url' => ['/installer/installer/'],'visible'=>Yii::$app->user->can('Manage Admin') && Yii::$app->user->can('Migrate Works Database')],
                         ['label' => Html::button(Yii::t('app','Backup database'),['class'=>'btn btn-danger btn-lg','title'=>Yii::t('app','Users with the Backup database permission can backup their own database.'),'data-toggle'=>'tooltip']), 'url' => ['/backuper/backuper/'],'visible'=>Yii::$app->user->can('Manage Admin') && Yii::$app->user->can('Backup Database') ],
                  ],
                ],
                ['label' => Html::button(Yii::t('app','Admin'),['class'=>'btn btn-success btn-lg']),'url'=> '', 'visible'=>Yii::$app->user->can('manageRoles'),
                 'items' => [
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button(Yii::t('app','Role Management (Admin)'),['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/role'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.'&nbsp;'.'&nbsp;'.Html::button(Yii::t('app','Update Admin'),['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/role/update/admin'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button(Yii::t('app','Permission Management (Admin)'),['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/permission'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button(Yii::t('app','Conditions/Rules Management (Admin)'),['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/rule/index'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button(Yii::t('app','User Management (Support and Admin)'),['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/user'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button(Yii::t('app','Delete a User'),['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/delete'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button(Yii::t('app','Download User Data'),['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/download'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button(Yii::t('app','Change User Name or Email Address'), ['class'=>'btn btn-info btn-lg']),'url' => ['/libra/settings'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button(Yii::t('app','User forgot their password'),['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/forgot'],'visible'=>Yii::$app->user->can('manageRoles')],
                            ['label' => '&nbsp;' .'&nbsp;'.Html::button(Yii::t('app','Signup a User'),['class'=>'btn btn-info btn-lg']), 'url' => ['/libra/signup'],'visible'=>Yii::$app->user->can('manageRoles')],
                  ],
                ],
                ['label' => Html::button(Yii::t('app','Quick Note'),['class'=>'btn btn-danger btn-lg']),'url'=> '/quicknote/create', 'visible'=>Yii::$app->user->can('Manage Basic'),
                 'items' => [                        
                ],
                ],
             ];
          } // (Yii::$app->session['sub'] === 1)
    } //!Yii::$app->user->isGuest) && (Yii::$app->session['sub'] < 2))
    //user is signed up and user is subscribed and user has no free privilege    
    if ((!Yii::$app->user->isGuest) && (Yii::$app->session['sub'] === 1) && (!Yii::$app->user->can('Subscription Free Privilege'))) {
                $menuItems[] = ['label' => Html::button(Yii::t('app','Monthly').' Paypal'.Yii::t('app',' Subscription Active'),['class'=>'btn btn-success btn-lg','title'=>'Watch this button change when your subscription is overdue.','data-toggle'=>'tooltip']),
                            'items' => [
                                   ['label' => Html::button('Paypal'. Yii::t('app',' Subscription Details'),
                                   ['class'=>'btn btn-info btn-lg',
                                    'title'=>Yii::t('app','Details of your Agreement including cycles, left, balance.'),
                                    'data-toggle'=>'tooltip',
                                   ]),
                                   'url' => ['/subscription/subscription/agreementdetails']],
                            ],
                       ];
    }//((!Yii::$app->user->isGuest) && (Yii::$app->session['sub'] === 1))
    //subscribed but not assigned a database role
    if ((!Yii::$app->user->isGuest) && (empty(Yii::$app->session['currentdatabase'])) && ((Yii::$app->session['sub'] === 1)||(Yii::$app->session['sub'] === 0))) 
         {
            $menuItems[] = ['label' => Html::button(Yii::t('app','Contact Support to setup an account either Manager or Employee.'),['class'=>'btn btn-success btn-lg','title'=>Yii::t('app','Support will assign a role and database to you.'),'data-toggle'=>'tooltip']), 'url' => "tel:/07777777777",
                            'items' => [
                           ],
                       ]; 
    }
    //subscription suspended
    if ((!Yii::$app->user->isGuest) && (Yii::$app->session['sub'] === 0))
         {
            $menuItems[] = ['label' => Html::button(Yii::t('app','Monthly'). 'Paypal' .Yii::t('app',' Subscription Suspended'),['class'=>'btn btn-success btn-lg','title'=>Yii::t('app','Re-activate your subscription by clicking the button below.'),'data-toggle'=>'tooltip']),
                            'items' => [
                                   ['label' => Html::button(Yii::t('app','Reactivate Paypal Subscription'),['class'=>'btn btn-info btn-lg','title'=>Yii::t('app','Reactivating your subscription with ').'Paypal'. Yii::t('app', ' will allow you access to your data again.'),'data-toggle'=>'tooltip']), 'url' => ['/subscription/subscription/reactivate']],
                           ],
                       ];
    }// ((!Yii::$app->user->isGuest) && (Yii::$app->session['sub'] === 0))
    //signed up and not subscribed yet and no free privilege therefore no roles assigned yet    
    if ((!Yii::$app->user->isGuest) && (Yii::$app->session['sub'] === 2) && (!Yii::$app->user->can('Subscription Free Privilege')))  {
          $menuItems[] = ['label' => Html::button('<img src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_subscribeCC_LG.gif">',['class'=>'btn btn-success btn-lg','title'=>'Activate Monthly Paypal Subscription for 12 months paying 5 GBP per month. Must be reactivated after 12 months. You can cancel at any stage. ','data-toggle'=>'tooltip']), 'url' => ['/subscription/subscription/subscribe'],];
    }
    
    if (Yii::$app->user->isGuest) {
             $menuItems[] = ['label' => Html::button(Yii::t('app','Home'),['class'=>'btn btn-success btn-lg','title'=>Yii::t('app','Home'),'data-toggle'=>'tooltip']), 'url' => ['/site/index'],];
             $menuItems[] = ['label' => Html::button(Yii::t('app','Login'),['class'=>'btn btn-success btn-lg','title'=>Yii::t('app','Login'),'data-toggle'=>'tooltip']), 'url' => ['/libra/login']];
             $menuItems[] = ['label' => Html::button(Yii::t('app','Forum'),['class'=>'btn btn-success btn-lg','title'=>Yii::t('app','Forum'),'data-toggle'=>'tooltip']), 'url' => ['/flarum/public']];
    } else {
             $menuItems[] = '<li>'
            . Html::beginForm(['/libra/logout'], 'post')
            . Html::submitButton(
                Yii::t('app','Logout (') . Yii::$app->user->identity->attributes['name'].')',
                ['class' => 'btn btn-success logout btn-lg']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        //'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels'=> false,
        //'options' => ['class' => 'navpills'],
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
            <p class="center">&copy; <?php echo date('Y');?><?php echo Yii::t('app','House 2 house  - All rights reserved') ?> </p>
            <p class="center"><?php echo Yii::t('app','Online ~ Regular Services Management Software') ?></p>
      </div> 
 </div>
</footer> 
<?= \bizley\cookiemonster\CookieMonster::widget([
        'content' => [
            'buttonMessage' => Yii::t('app','OK. Got it'), // instead of default 'I understand'
            'mainMessage'=> Yii::t('app','We use cookies on this website to help us offer you the best online experience. By continuing to use our website, you are agreeing to our use of cookies and to our privacy policy.')
                     ],
        'mode' => 'bottom'
    ]) ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
