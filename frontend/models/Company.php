<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "works_company".
 *
 * @property int $id
 * @property string $name
 * @property string $address_street
 * @property string $address_area1
 * @property string $address_area2
 * @property string $address_areacode
 * @property string $telephone
 * @property string $external_website_url
 * @property string $email
 * @property string $twilio_telephone
 * @property string $fax
 * @property string $finyear_start_date
 * @property string $finyear_end_date
 * @property string $corp_tax_duedate
 * @property string $company_regno
 * @property string $vat_no
 * @property string $alt_reg_name
 * @property string $alt_reg_no
 * @property string $alt_expiry_date
 * @property string $alt2_reg_name
 * @property string $alt2_reg_no
 * @property string $alt2_expiry_date
 * @property string $sic_name
 * @property string $sic_code
 * @property string $sic2_name
 * @property string $sic2_code
 * @property int $salesorderheader_excludefullypaid
 * @property int $costheader_excludefullypaid
 * @property string $homepage
 * @property string $gc_accesstoken
 * @property string $gc_live_or_sandbox
 * @property string $smtp_transport_host
 * @property string $smtp_transport_username
 * @property string $smtp_transport_password
 * @property int $smtp_transport_port
 * @property string $smtp_transport_encryption
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
     public static function getDb()
   {
       return \frontend\components\Utilities::userdb();
   }  
    
    
    
    
    public static function tableName()
    {
        return 'works_company';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
   

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['salesorderheader_excludefullypaid', 'costheader_excludefullypaid', 'smtp_transport_port'], 'integer'],
            [['gc_live_or_sandbox', 'smtp_transport_encryption'], 'string'],
            [['name', 'external_website_url', 'sic_name', 'sic2_name'], 'string', 'max' => 100],
            [['address_street', 'address_area1', 'address_area2', 'gc_accesstoken', 'smtp_transport_host', 'smtp_transport_username', 'smtp_transport_password'], 'string', 'max' => 50],
            [['address_areacode'], 'string', 'max' => 9],
            [['telephone', 'twilio_telephone'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 128],
            [['fax', 'corp_tax_duedate'], 'string', 'max' => 11],
            [['finyear_start_date', 'finyear_end_date', 'alt_expiry_date', 'alt2_expiry_date'], 'string', 'max' => 20],
            [['company_regno'], 'string', 'max' => 8],
            [['vat_no', 'alt_reg_no', 'alt2_reg_no', 'sic_code', 'sic2_code'], 'string', 'max' => 10],
            [['alt_reg_name', 'alt2_reg_name'], 'string', 'max' => 25],
            [['homepage'], 'string', 'max' => 10000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address_street' => 'Address Street',
            'address_area1' => 'Address Area1 eg. Glasgow',
            'address_area2' => 'Address Area2 eg. Lanarkshire',
            'address_areacode' => 'Address Postcode',
            'telephone' => 'Telephone',
            'external_website_url' => 'External Website Url',
            'email' => 'Email',
            'twilio_telephone' => 'Twilio Telephone eg. eg. "+441315103755" if in the UK. The zero is dropped between the second 4 and the 1',
            'fax' => 'Fax',
            'finyear_start_date' => 'Financial Year Start Date',
            'finyear_end_date' => 'Financial Year End Date',
            'corp_tax_duedate' => 'Corporation Tax Due Date',
            'company_regno' => 'Company Registration Number',
            'vat_no' => 'Vat No',
            'alt_reg_name' => 'Alternative Registration Name',
            'alt_reg_no' => 'Alternative Registration No.',
            'alt_expiry_date' => 'Alt Expiry Date',
            'alt2_reg_name' => 'Alt2 Registration Name',
            'alt2_reg_no' => 'Alt2 Registration No',
            'alt2_expiry_date' => 'Alt2 Expiry Date',
            'sic_name' => 'Sic Name',
            'sic_code' => 'Sic Code',
            'sic2_name' => 'Sic2 Name',
            'sic2_code' => 'Sic2 Code',
            'salesorderheader_excludefullypaid' => 'Exclude Fully Paid Daily Cleans from List',
            'costheader_excludefullypaid' => 'Exclude Fully Paid Daily Costs from List',
            'homepage' => 'Notes visible on Home Page when worker is logged in.',
            'gc_accesstoken' => 'Gocardless Accesstoken',
            'gc_live_or_sandbox' => 'Gocardless Live Or Sandbox eg. Live',
            'smtp_transport_host' => 'Smtp Transport Host eg. send.one.com',
            'smtp_transport_username' => 'Smtp Transport Username',
            'smtp_transport_password' => 'Smtp Transport Password',
            'smtp_transport_port' => 'Smtp Transport Port',
            'smtp_transport_encryption' => 'Smtp Transport Encryption',
        ];
    }
}
