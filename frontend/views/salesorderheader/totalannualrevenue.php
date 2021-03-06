<?php
  use yii\helpers\Html;
  use Yii;
?>
<?php $this->beginPage() ?>
<h1><?= Html::encode($this->title) ?></h1>
<table border="0" class="table transparent"> 
<?php
    echo Html::tag('div',
                Html::tag('tr',
                 '<td><b>'. $year
                 ."</td><td align='right'><b>". $months[0][0] . " "
                 ."</td><td align='right'><b>". $months[1][0] . " "
                 ."</td><td align='right'><b>". $months[2][0] . " "
                 ."</td><td align='right'><b>". $months[3][0] . " "
                 ."</td><td align='right'><b>". $months[4][0] . " "
                 ."</td><td align='right'><b>". $months[5][0] . " "
                 ."</td><td align='right'><b>". $months[6][0] . " "
                 ."</td><td align='right'><b>". $months[7][0] . " "
                 ."</td><td align='right'><b>". $months[8][0] . " "
                 ."</td><td align='right'><b>". $months[9][0] . " "
                 ."</td><td align='right'><b>". $months[10][0] . " "
                 ."</td><td align='right'><b>". $months[11][0] . " "
                 ."</td><td align='right'><b>". Yii::t('app','Total')   
              )             
           );
     echo Html::tag('div',
                Html::tag('tr',
                 '<td ><b>'. Yii::t('app','Owed')                 
                 ."</td><td align='right'><b>". $months[0][1] . " "
                 ."</td><td align='right'><b>". $months[1][1] . " "
                 ."</td><td align='right'><b>". $months[2][1] . " "
                 ."</td><td align='right'><b>". $months[3][1] . " "
                 ."</td><td align='right'><b>". $months[4][1] . " "
                 ."</td><td align='right'><b>". $months[5][1] . " "
                 ."</td><td align='right'><b>". $months[6][1] . " "
                 ."</td><td align='right'><b>". $months[7][1] . " "
                 ."</td><td align='right'><b>". $months[8][1] . " "
                 ."</td><td align='right'><b>". $months[9][1] . " "
                 ."</td><td align='right'><b>". $months[10][1] . " "
                 ."</td><td align='right'><b>". $months[11][1] . " "
                 ."</td><td align='right'><b>". $months[12][1] . " "
                
              )
           );
     echo Html::tag('div',
                Html::tag('tr',
                 '<td ><b>'. "    "
                 ."</td><td align='right'><b>"
                 ."</td><td align='right'><b>"
                 ."</td><td align='right'><b>"
                 ."</td><td align='right'><b>"
                 ."</td><td align='right'><b>"
                 ."</td><td align='right'><b>"
                 ."</td><td align='right'><b>"
                 ."</td><td align='right'><b>"
                 ."</td><td align='right'><b>"
                 ."</td><td align='right'><b>"
                 ."</td><td align='right'><b>"
                 ."</td><td align='right'><b>"
                 ."</td><td align='right'><b>"
             )
           );
     
     echo Html::tag('div',
                Html::tag('tr',
                 '<td ><b>'. Yii::t('app','Paid')
                 ."</td><td align='right'>". $months[0][2] . " "
                 ."</td><td align='right'>". $months[1][2] . " "
                 ."</td><td align='right'>". $months[2][2] . " "
                 ."</td><td align='right'>". $months[3][2] . " "
                 ."</td><td align='right'>". $months[4][2] . " "
                 ."</td><td align='right'>". $months[5][2] . " "
                 ."</td><td align='right'>". $months[6][2] . " "
                 ."</td><td align='right'>". $months[7][2] . " "
                 ."</td><td align='right'>". $months[8][2] . " "
                 ."</td><td align='right'>". $months[9][2] . " "
                 ."</td><td align='right'>". $months[10][2] . " "
                 ."</td><td align='right'>". $months[11][2] . " "
                 ."</td><td align='right'><b>". $months[12][2] . " "
              )
           );
     echo Html::tag('div',
                Html::tag('tr',
                 '<td ><b>'. Yii::t('app','Tips')
                 ."</td><td align='right'>". $months[0][3] . " "
                 ."</td><td align='right'>". $months[1][3] . " "
                 ."</td><td align='right'>". $months[2][3] . " "
                 ."</td><td align='right'>". $months[3][3] . " "
                 ."</td><td align='right'>". $months[4][3] . " "
                 ."</td><td align='right'>". $months[5][3] . " "
                 ."</td><td align='right'>". $months[6][3] . " "
                 ."</td><td align='right'>". $months[7][3] . " "
                 ."</td><td align='right'>". $months[8][3] . " "
                 ."</td><td align='right'>". $months[9][3] . " "
                 ."</td><td align='right'>". $months[10][3] . " "
                 ."</td><td align='right'>". $months[11][3] . " "
                 ."</td><td align='right'><b>".$months[12][3] . " "
              )
           );
     echo Html::tag('div',
                Html::tag('tr',
                 '<td ><b>'. Yii::t('app','Advance Payment')
                 ."</td><td align='right'>". $months[0][4] . " "
                 ."</td><td align='right'>". $months[1][4] . " "
                 ."</td><td align='right'>". $months[2][4] . " "
                 ."</td><td align='right'>". $months[3][4] . " "
                 ."</td><td align='right'>". $months[4][4] . " "
                 ."</td><td align='right'>". $months[5][4] . " "
                 ."</td><td align='right'>". $months[6][4] . " "
                 ."</td><td align='right'>". $months[7][4] . " "
                 ."</td><td align='right'>". $months[8][4] . " "
                 ."</td><td align='right'>". $months[9][4] . " "
                 ."</td><td align='right'>". $months[10][4] . " "
                 ."</td><td align='right'>". $months[11][4] . " "
                 ."</td><td align='right'><b>".$months[12][4] . " "
              )
           );
       
       echo Html::tag('div',
                Html::tag('tr',
                 '<td ><b>'. Yii::t('app','Previous Payment')
                 ."</td><td align='right'>". $months[0][5] . " "
                 ."</td><td align='right'>". $months[1][5] . " "
                 ."</td><td align='right'>". $months[2][5] . " "
                 ."</td><td align='right'>". $months[3][5] . " "
                 ."</td><td align='right'>". $months[4][5] . " "
                 ."</td><td align='right'>". $months[5][5] . " "
                 ."</td><td align='right'>". $months[6][5] . " "
                 ."</td><td align='right'>". $months[7][5] . " "
                 ."</td><td align='right'>". $months[8][5] . " "
                 ."</td><td align='right'>". $months[9][5] . " "
                 ."</td><td align='right'>". $months[10][5] . " "
                 ."</td><td align='right'>". $months[11][5] . " "
                 ."</td><td align='right'><b>".$months[12][5] . " "
              )
           );
       
       echo Html::tag('div',
                Html::tag('tr',
                 '<td ><b>'. Yii::t('app','Total')
                 ."</td><td align='right'><b>". $months[0][6] . " "
                 ."</td><td align='right'><b>". $months[1][6] . " "
                 ."</td><td align='right'><b>". $months[2][6] . " "
                 ."</td><td align='right'><b>". $months[3][6] . " "
                 ."</td><td align='right'><b>". $months[4][6] . " "
                 ."</td><td align='right'><b>". $months[5][6] . " "
                 ."</td><td align='right'><b>". $months[6][6] . " "
                 ."</td><td align='right'><b>". $months[7][6] . " "
                 ."</td><td align='right'><b>". $months[8][6] . " "
                 ."</td><td align='right'><b>". $months[9][6] . " "
                 ."</td><td align='right'><b>". $months[10][6] . " "
                 ."</td><td align='right'><b>". $months[11][6] . " "
                 ."</td><td align='right'><b>".$months[12][6] . " "
              )
           );
?>
</table>    
<?php $this->endPage() ?>