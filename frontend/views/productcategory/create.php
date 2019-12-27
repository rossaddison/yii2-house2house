<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Productcategory */

$this->title = 'Create Postcodes';
$this->params['breadcrumbs'][] = ['label' => 'Postcodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['breadcrumbs'][] = ['label' => 'Find Postcode', 'url' => "http://pcf.raggedred.net/"];
?>
<div class="productcategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
