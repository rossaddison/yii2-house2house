<button id="click-btn">Click Me!</button>
<?php
use yii\web\View;
$this->registerJs("$('#click-btn').click(function() {
jQuery.ajax('/index.php/ajax/json', {
'dataType':'json',
'method':'get',
'success':function(result) {
$('#updateTitle').html(result.title);
$('#updateContent').html(result.content);
},
'cache':false,
});
});", \yii\web\View::POS_READY);
?>
