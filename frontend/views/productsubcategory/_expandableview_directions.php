<?php
use yii\helpers\Html;
use frontend\models\Productsubcategory;
use frontend\models\Productcategory;
use frontend\models\Product;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\Size;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;
use frontend\components\Utilities;
?>
<div class="productsubcategory-expandable-view-directions">
    <table border="0" class="table transparent">
    <?php
       echo $directions;
     ?>                  
    </table>
</div>
