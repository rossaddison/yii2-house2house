<?php
Namespace frontend\components;
    
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use frontend\models\Productcategory;
use frontend\models\Productsubcategory;
use frontend\models\Product;
use frontend\models\Sessiondetail;
use frontend\models\Salesorderdetail;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;
use frontend\modules\subscription\models\paypalagreement;
use frontend\modules\subscription\components\Configpaypal;
    
class Utilities extends Component
{

public static function delete_records()
{
    Carousal::deleteAll();
    Salesorderdetail::deleteAll(); 
    Salesorderheader::deleteAll();
    Product::deleteAll();
    Productsubcategory::deleteAll(); 
    Productcategory::deleteAll(); 
    
    Costdetail::deleteAll(); 
    Costheader::deleteAll(); 
    Cost::deleteAll();
    Costsubcategory::deleteAll(); 
    Costcategory::deleteAll();
    Quicknote::deleteAll(); 
    Messaging::deleteAll(); 
}

public static function create_demotimestamp_directory()
{
    $basepath = \Yii::getAlias('@webroot');
    $date=date_create();
    Yii::$app->session['demo_image_timestamp_directory'] = date_timestamp_get($date);
    $dir = $basepath . "/images/demo/".Yii::$app->session['demo_image_timestamp_directory'];
    if (!is_dir($dir)){FileHelper::createDirectory($dir,0775,true);}
}

public static function delete_demotimestamp_directory()
{
    $basepath = \Yii::getAlias('@webroot');
    $dir = $basepath . "/images/demo/".Yii::$app->session['demo_image_timestamp_directory'];
    $options = [];
    Carousal::deleteAll();
    if (is_dir($dir)){FileHelper::removeDirectory($dir,$options);}
}	
	
public static function SubCatListb($postalcode_id) {
       //find all the streets in the postal area 
        $data=Productsubcategory::find()
       ->where(['productcategory_id'=>$postalcode_id])
       ->select(['id','name','lat_start','lng_start','lat_finish','lng_finish'])->asArray()->all();
       return $data;
       
}
	
public static function Street_map($map,$array,$key,$value)
{
        
        $start = new LatLng(['lat' => $array[$key]['lat_start'], 'lng' => $array[$key]['lng_start']]);
        $finish = new LatLng(['lat' => $array[$key]['lat_finish'], 'lng' => $array[$key]['lng_finish']]);
        $directionsRequest = new DirectionsRequest([
              'origin' => $start,
              'destination' => $finish,
              //'waypoints' => $waypoints,
              'travelMode' => TravelMode::DRIVING
        ]);
        $directionsRenderer = new DirectionsRenderer([
                'map' => $map->getName(),
                'polylineOptions' => $polylineOptions
        ]);                
        $directionsService = new DirectionsService([
              'directionsRenderer' => $directionsRenderer,
              'directionsRequest' => $directionsRequest
        ]);
        $map->appendScript($directionsService->getJs());
        
         // Display the map -finally :)
        if (!empty($array[$key]['lat_start']) && !empty($array[$key]['lng_start']) && !empty($array[$key]['lat_finish']) && !empty($array[$key]['lng_finish']))
            {
              return $map;
            }
}

public static function ProdListc($cat_id, $subcat_id) {
        //find all the houses in the street
        $data = 0;
        $data=\frontend\models\Product::find()
       ->where(['productcategory_id'=>$cat_id])
       ->andWhere(['productsubcategory_id'=>$subcat_id])      
       ->select(['id'])->count();
       return $data;
       
}

public static function productsubcategoryarray()
{
  $productcategory_id = ArrayHelper::map(Productcategory::find()->all(), 'id','id'); 
	$productcategory_name = ArrayHelper::map(Productcategory::find()->all(), 'id','name'); 
	//$productcategory_fkid = ArrayHelper::map(Productcategory::find()->all(), 'id','productsubcategory_id'); 
	$productsubcategory_id = ArrayHelper::map(Productsubcategory::find()->all(), 'id','id'); 
	$productsubcategory_name = ArrayHelper::map(Productsubcategory::find()->all(), 'id','name'); 
	$productsubcategory_fkid = ArrayHelper::map(Productsubcategory::find()->all(), 'id','productcategory_id'); 
	$arr=array();
	$i = 0;$j = 1;
	
        //go through each product category id
	foreach ($productcategory_id as $id_productcategory){
                            //assign the product name to i
		            $i= $productcategory_name[$id_productcategory];
                            //assign this product name to the array
		            $arr[$i][$j] = $productcategory_name[$id_productcategory];
                            //find each productsubcategory whose foreign key points to the productcategory
		            foreach ($productsubcategory_id as $id_productsubcategory)
		            {
		                //the foreign key psg points to pg
                                //
                                if ($productsubcategory_fkid[$id_productsubcategory] == $id_productcategory) {
		                    //echo  $id_productsubcategory . "\n";
		                    //echo  $productsubcategory_name[$id_productsubcategory] . "\n";
		                    $arr[$i][$j] = $productsubcategory_name[$id_productsubcategory]; 
		                    //echo "<br>";
		                    $j = $j+1;
		                }
		            }
		   }
	 return $arr;
}

public static function weeklycleansoverdueexample()
   {
      $dateminus = strtotime("-7 day");
      $comparedate = date("Y-m-d", $dateminus);
      $weekly = Salesorderdetail::find()
     ->joinWith('product',true)
     ->joinWith('salesOrder',true)
     ->andFilterWhere(['works_product.frequency'=>'Weekly'])
     ->andFilterWhere(['<','works_salesorderheader.clean_date',$comparedate])
     ->all();
     return var_dump($weekly); 
   }

//$transid is value passed from dropdownbox on salesorderdetail/index 'transadv'
public static function soi2soi($prodid,$transid,$amounttotransfer)
{
   $arr = Product::find()->where(['id'=>$prodid])->one();
   $allsales = $arr->salesorderdetails;
   foreach ($allsales as $key => $value)
   {
       if (($value['sales_order_id']) == $transid)
       {
           $sid = $value['sales_order_detail_id'];
           $model2 = Salesorderdetail::findOne($sid);
           $model2->pre_payment = $amounttotransfer;
           $model2->save();
       };
   }
   
}

public static function check_for_mandates_approved()
{
    //query sessiondetails using the current user_id
    $db = Utilities::userdb_database_code();
    $all = Sessiondetail::find()->where(['=','user_id',Yii::$app->user->id])
                                ->Andwhere(['=','customer_approved',1])
                                ->Andwhere(['=','db',$db])
                                ->Andwhere(['=','administrator_acknowledged',0])
                                ->count();
    return $all;    
}

public static function check_for_mandates_to_acknowledge()
{
    //query sessiondetails using the current user_id
    $db = Utilities::userdb_database_code();
    $all = Sessiondetail::find()->where(['=','user_id',Yii::$app->user->id])
                                ->Andwhere(['=','customer_approved',1])
                                ->Andwhere(['=','db',$db])
                                ->Andwhere(['=','administrator_acknowledged',0])
                                ->all();
    return $all;    
}

public static function userLogin_set_database()
{
                if ( \Yii::$app->user->can('Access demo')){
                    return \Yii::$app->demo;
                    exit;
                }
	        else if (\Yii::$app->user->can('Access db')) {
                    return \Yii::$app->db; 
                    exit;
                }
                else if (\Yii::$app->user->can('Access db1')) {
                    return \Yii::$app->db1; 
                    exit;
                }
                else if (\Yii::$app->user->can('Access db2')) {
                    return \Yii::$app->db2; 
                    exit;
                }
                else if (\Yii::$app->user->can('Access db3')) {
                    return \Yii::$app->db3;
                    exit;
                }
                else if (\Yii::$app->user->can('Access db4')) {
                    return \Yii::$app->db4; 
                    exit;
                }
                else if ( \Yii::$app->user->can('Access db5')){
                    return \Yii::$app->db5; 
                    exit;
                }
                else if ( \Yii::$app->user->can('Access db6')){
                    return \Yii::$app->db6; 
                    exit;
                }
                else if ( \Yii::$app->user->can('Access db7')){
                    return \Yii::$app->db7; 
                    exit;
                }
                else if ( \Yii::$app->user->can('Access db8')){
                    return \Yii::$app->db8; 
                    exit;
                }
                else if ( \Yii::$app->user->can('Access db9')){
                    return \Yii::$app->db9; 
                    exit;
                }
                else if ( \Yii::$app->user->can('Access db10')){
                    return \Yii::$app->db10; 
                    exit;
                }
}

//use by every model
public static function userdb(){
      return Yii::$app->session['currentdatabase'];
}

public static function userdb_database_code(){
    
 $dbase = '';
 if ( \Yii::$app->user->can('Access demo')){ $dbase = 'demo';}
 if ( \Yii::$app->user->can('Access db')){ $dbase = 'db';}	
 if ( \Yii::$app->user->can('Access db1')){ $dbase = 'db1';}
 if ( \Yii::$app->user->can('Access db2')){ $dbase = 'db2';}
 if ( \Yii::$app->user->can('Access db3')){ $dbase = 'db3';}
 if ( \Yii::$app->user->can('Access db4')){ $dbase = 'db4';}
 if ( \Yii::$app->user->can('Access db5')){ $dbase = 'db5';}
 if ( \Yii::$app->user->can('Access db6')){ $dbase = 'db6';}
 if ( \Yii::$app->user->can('Access db7')){ $dbase = 'db7';}
 if ( \Yii::$app->user->can('Access db8')){ $dbase = 'db8';}
 if ( \Yii::$app->user->can('Access db9')){ $dbase = 'db9';}
 if ( \Yii::$app->user->can('Access db10')){ $dbase = 'db10';}
 return $dbase;
}

public static function subscription_exist()
{
    $one = paypalagreement::find()
    ->where(['=','user_id',Yii::$app->user->id]) 
    //the subscription has not been terminated
    ->Andwhere(['=','terminated_at',null])
    //the subscription has been created
    ->Andwhere(['<>','created_at',null])
    //the subscription has been approved by user and redirected to us
    ->Andwhere(['<>','executed_at',null])    
    //->Andwhere(['>','end_at',date('Y-m-d H:i:s', time())])
    ->one();
    if (!empty($one->agreement_id)) {
        $agreement_id = $one->agreement_id;
        //use the api to determine if subscription exists with paypal
        $newapicontext = new Configpaypal();
        $apiContext = $newapicontext->paypalconfig(); 
        $agreement = \PayPal\Api\Agreement::get($agreement_id, $apiContext);
        $status = displayRecursiveResults($agreement,'status');
        if ($status === 'verified') return true; else return false;
    }
    else return false;
    
}

public static function displayRecursiveResults($arrayObject,$searchkey) {
    foreach($arrayObject as $key => $data) {
        if(is_array($data)) {
            \frontend\components\Utilities::displayRecursiveResults($data,$searchkey);
        } elseif(is_object($data)) {
            \frontend\components\Utilities::displayRecursiveResults($data,$searchkey);
        } else {
            if ($key === $searchkey)
            return $data;
        }
    }
}
}
?>
