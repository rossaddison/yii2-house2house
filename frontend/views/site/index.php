<?php
use frontend\components\Utilities;
?>
<br>
<div class="site-index">
    <div class="body-content">
        <div class="container">
            <?php
              if (!Yii::$app->user->isGuest){
                Utilities::Home_tabs_service();
              }
            ?>
        </div>
    </div>
</div>
