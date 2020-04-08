<?php

namespace frontend\models;
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\models\Employee;
use Yii;

/**
 * This is the model class for table "works_salesorderheader".
 *
 * @property integer $sales_order_id
 * @property string $status
 * @property string $statusfile
 * @property integer $employee_id
 * @property integer $jobfrequency_id
 * @property integer $user_id
 * @property string $clean_date
 * @property string $sub_total
 * @property string $tax_amt
 * @property string $total_due
 * @property string $modified_date
 *
 * @property WorksSalesorderdetail[] $worksSalesorderdetails
 * @property WorksEmployee $employee
 * @property User $user
 */
class Salesorderheader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     public static function getDb()
   {
       return \frontend\components\Utilities::userdb();
   }
       
    public static function tableName()
    {
        return 'works_salesorderheader';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status','employee_id'], 'required'],
            [['status'], 'string','max'=>20],
            [['employee_id','carousal_id'], 'integer'],
            [['modified_date','clean_date'], 'safe'],
            [['hoursworked','sub_total', 'tax_amt', 'total_due'],'number'],
            [['clean_date'],'default','value'=> date("Y-m-d H:i:s")],
            [['sub_total', 'tax_amt', 'total_due'],'default','value'=>0],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
            
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sales_order_id' => 'No.',
            'status' => 'Job Code eg. BL',
            'statusfile' => 'Job Code Suffix',
            'employee_id' => 'Employee ID',
            'carousal_id' => 'Carousal ID',
            'clean_date' => 'Clean Date',
            'sub_total' => 'Sub Total',
            'tax_amt' => 'Tax Amt',
            'total_due' => 'Total Due',
            'hoursworked' =>'Hrs',
            'income_per_hour' => 'Income hr',
            'modified_date' => 'Modified Date',
        ];
    }
    
    public function getSalesorderdetailsLink() {

       $url = Url::to(['/salesorderdetail/index', 'id'=>$this->sales_order_id]); // your url code to retrieve the profile view

       $options = []; // any HTML attributes for your link

    return Html::a('MyLink', $url, $options); // assuming you have a relation called profile

}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalesorderdetails()
    {
        return $this->hasMany(Salesorderdetail::className(), ['sales_order_id' => 'sales_order_id']);
    }
    
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }
    
    public function getCarousalimage()
    {
        return $this->hasOne(Carousal::className(), ['id' => 'carousal_id']);
    }
    
}
