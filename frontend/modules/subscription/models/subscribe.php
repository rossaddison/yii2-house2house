<?php

namespace frontend\modules\subscription\models;

use Yii;
use Yii\helpers\Url;

class subscribe extends \yii\base\Model
{
    
    public $plan_name = 'Subscription Monthly';
    public $plan_description = 'Monthly Subscription Plan';
    public $plan_type = 'FIXED'; 
    public $plan_state = 'ACTIVE'; 
    
    public $payment_definition_name = 'Regular Payments';
    public $payment_definition_type = 'REGULAR';
    public $payment_definition_frequency = 'MONTH';
    public $payment_definition_frequency_interval = 1;
    public $payment_definition_cycle = 12;
    public $payment_definition_amount_value = 5;
    public $payment_definition_amount_currency = 'GBP';
    
    public $charge_model_type = 'SHIPPING';
    public $charge_model_amount_value = 0;
    public $charge_model_amount_currency = 'GBP';
    
    public $merchant_preference_returnurl =  \Yii::$app->getUrlManager()->getBaseUrl().'/subscription/subscription/success';
    public $merchant_preference_cancelurl = \Yii::$app->getUrlManager()->getBaseUrl().'/subscription/subscription/cancel';
    
    public $autobillamount = 'yes';
    public $initial_fail_amount_action = 'CONTINUE';
    public $max_fail_attempts = 0;
    public $setupfee_value = 0;
    public $setupfee_currency = 'GBP';
    
    public $patch_options = 'replace';
    public $status = '{"state":"ACTIVE"}';
    
    public $agreement_name = 'Subscription Monthly';
    public $agreement_description = 'Monthly Subscription Plan';
    
    public $shipping_address_line1 = '111 Able Street';
    public $shipping_address_city = 'City';
    public $shipping_address_state = 'Region';
    public $shipping_address_postcode = 'P01 1CD';
    public $shipping_address_countrycode = 'GB';
        
    public function rules()
    {
        return [
            [
                [
                    'plan_name',
                    'plan_description',
                    'plan_type',
                    'plan_state',
                    'payment_definition_name',
                    'payment_definition_type',
                    'payment_definition_frequency',
                    'payment_definition_frequency_interval',
                    'payment_definition_cycle',
                    'payment_definition_amount_value',
                    'payment_definition_amount_currency',
                    'charge_model_type',
                    'charge_model_amount_currency',
                    'charge_model_amount_value',
                    'merchant_preference_returnurl',
                    'merchant_preference_cancelurl',
                    'autobillamount',
                    'initial_fail_amount_action',
                    'max_fail_attempts',
                    'setupfee_value',
                    'setupfee_currency',
                    'patch_options',
                    'status',
                    'agreement_name',
                    'agreement_description',
                    'shipping_address_line1',
                    'shipping_address_city',
                    'shipping_address_state',
                    'shipping_address_postcode',
                    'shipping_address_countrycode',
                ],
                'required',
            ],
            [
                [
                    'plan_name',
                    'plan_description',
                    'plan_type',
                    'plan_state',
                    'payment_definition_name',
                    'payment_definition_type',
                    'payment_definition_frequency',
                    'payment_definition_amount_currency',
                    'charge_model_type',
                    'charge_model_amount_currency',
                    'merchant_preference_returnurl',
                    'merchant_preference_cancelurl',
                    'autobillamount',
                    'initial_fail_amount_action',
                    'setupfee_currency',
                    'patch_options',
                    'status',
                    'agreement_name',
                    'agreement_description',
                    'shipping_address_line1',
                    'shipping_address_city',
                    'shipping_address_state',
                    'shipping_address_postcode',
                    'shipping_address_countrycode',
                ],
                'string',
            ],
            [
              [
                    'setupfee_value', 'max_fail_attempts',
                    'charge_model_amount_value', 'payment_definition_amount_value',
                    'payment_definition_frequency_interval',
                    'payment_definition_cycle',
              ],
              'number',
            ],           
        ];
    }
    
    public function attributeLabels()
    {
        return [ 
                    'plan_name' => 'A name for your plan eg. Plan A',
                    'plan_description' => 'A description for your plan eg. Monthly Subscription Plan',
                    'plan_type' => 'Plan Type: FIXED for subscriptions , INFINITE otherwise.',
                    'plan_state' => 'Plan State: (default: ACTIVE)',
                    'payment_definition_name' => 'Name eg. Regular Payments',
                    'payment_definition_type' => 'Type eg. REGULAR',
                    'payment_definition_frequency' => 'Frequency eg. MONTH',
                    'payment_definition_frequency_interval' => 'Frequency Interval eg. 1',
                    'payment_definition_cycle' => 'Cycle eg. 12',
                    'payment_definition_amount_value' => 'Amount - Value eg. 5',
                    'payment_definition_amount_currency' => 'Amount - Currency eg. GBP',
                    'charge_model_type' => 'Type eg. SHIPPING',
                    'charge_model_amount_value' => 'Amount - value eg. 0',
                    'charge_model_amount_currency' => 'Amount - currency eg. GBP', 'merchant_preference_returnurl' => 'Return Url',
                    'merchant_preference_returnurl' => 'Return Url',
                    'merchant_preference_cancelurl' => 'Cancel Url',
                    'autobillamount' => 'Automatically  Bill this Amount eg. yes/no',
                    'initial_fail_amount_action' => 'Action to take if fail occurs eg. CONTINUE',
                    'max_fail_attempts' => 'Number of failed attempts eg. 0',
                    'setupfee_value' => 'Value of Setup Fee eg. 0',
                    'setupfee_currency' => 'Currency of Setup Fee eg. GBP',
                    'status' => 'Status (default) ACTIVE Cannot be made INACTIVE if agreements exist against the Plan',
                    'agreement_name' => 'Business Subscription Monthly',
                    'agreement_description'  => 'Monthly Subscription',
                    'shipping_address_line1' => 'Line 1',
                    'shipping_address_city' => 'City',
                    'shipping_address_state' => 'County',
                    'shipping_address_postcode' => 'Postcode',
                    'shipping_address_countrycode' => 'Countrycode according to ISO3166-1. Error 400 if incorrect.',
        ];
    }
}
?>
