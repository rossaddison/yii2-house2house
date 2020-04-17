<?php
namespace console\migrations\auth;

use yii\db\Schema;
use yii\db\Migration;

class m200413_082835_auth_itemDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%auth_item}}',
                           ["name", "type", "description", "rule_name", "data", "created_at", "updated_at"],
                            [
    [
        'name' => 'Access db',
        'type' => '2',
        'description' => 'Access db',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1577737693',
        'updated_at' => '1577737693',
    ],
    [
        'name' => 'Access db1',
        'type' => '2',
        'description' => 'Access db1',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1577737634',
        'updated_at' => '1577737634',
    ],
    [
        'name' => 'Access db10',
        'type' => '2',
        'description' => 'Access db10',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1579035389',
        'updated_at' => '1579035389',
    ],
    [
        'name' => 'Access db2',
        'type' => '2',
        'description' => 'Access db2',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1578741528',
        'updated_at' => '1578741528',
    ],
    [
        'name' => 'Access db3',
        'type' => '2',
        'description' => 'Access db3',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1581581742',
        'updated_at' => '1581581762',
    ],
    [
        'name' => 'Access db4',
        'type' => '2',
        'description' => 'Access db4',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1581667052',
        'updated_at' => '1581667052',
    ],
    [
        'name' => 'Access db5',
        'type' => '2',
        'description' => 'Access db5',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1584401458',
        'updated_at' => '1584401458',
    ],
    [
        'name' => 'Access db6',
        'type' => '2',
        'description' => 'Access db6',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1584401458',
        'updated_at' => '1584401458',
    ],
    [
        'name' => 'Access db7',
        'type' => '2',
        'description' => 'Access db7',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1579035389',
        'updated_at' => '1579035389',
    ],
    [
        'name' => 'Access db8',
        'type' => '2',
        'description' => 'Access db8',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1579035389',
        'updated_at' => '1579035389',
    ],
    [
        'name' => 'Access db9',
        'type' => '2',
        'description' => 'Access db9',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1579035389',
        'updated_at' => '1579035389',
    ],
    [
        'name' => 'Access paypalagreement',
        'type' => '2',
        'description' => 'Access the Paypal Agreement',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1577804284',
        'updated_at' => '1577804284',
    ],
    [
        'name' => 'Access Session',
        'type' => '2',
        'description' => 'Access Session',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1565127671',
        'updated_at' => '1565209503',
    ],
    [
        'name' => 'Access Sessiondetail',
        'type' => '2',
        'description' => 'Access Sessiondetail',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1565127753',
        'updated_at' => '1565127753',
    ],
    [
        'name' => 'admin',
        'type' => '1',
        'description' => 'Administrator of the first database  which serves to record all user data of the site. Users that are allowed to signup are designated a Manager role manually. ',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1577666562',
        'updated_at' => '1584471479',
    ],
    [
        'name' => 'Create Carousal',
        'type' => '2',
        'description' => 'Create Carousal',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1544661317',
        'updated_at' => '1544661317',
    ],
    [
        'name' => 'Create Company',
        'type' => '2',
        'description' => 'Create Company',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856530',
        'updated_at' => '1549635086',
    ],
    [
        'name' => 'Create Daily Clean',
        'type' => '2',
        'description' => 'Create Daily Clean',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856530',
        'updated_at' => '1512856530',
    ],
    [
        'name' => 'Create Daily Job Sheet',
        'type' => '2',
        'description' => 'Create Daily Job Sheet',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856530',
        'updated_at' => '1512856530',
    ],
    [
        'name' => 'Create Employee',
        'type' => '2',
        'description' => 'Create Employee',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856530',
        'updated_at' => '1549631754',
    ],
    [
        'name' => 'Create Gocardlesscustomer',
        'type' => '2',
        'description' => 'Create Gocardlesscustomer',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1564057944',
        'updated_at' => '1564057944',
    ],
    [
        'name' => 'Create House',
        'type' => '2',
        'description' => 'Create House',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856530',
        'updated_at' => '1549631786',
    ],
    [
        'name' => 'Create Instruction',
        'type' => '2',
        'description' => 'Create Instruction',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1549631630',
        'updated_at' => '1549635056',
    ],
    [
        'name' => 'Create Legal',
        'type' => '2',
        'description' => 'Create Legal',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1563032629',
        'updated_at' => '1563032629',
    ],
    [
        'name' => 'Create Mandate',
        'type' => '2',
        'description' => 'Create Mandate',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1564647598',
        'updated_at' => '1564647598',
    ],
    [
        'name' => 'Create Messagelog',
        'type' => '2',
        'description' => 'Create Messagelog',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1544660727',
        'updated_at' => '1544660727',
    ],
    [
        'name' => 'Create Messaging',
        'type' => '2',
        'description' => 'Create Messaging',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1544659806',
        'updated_at' => '1544659991',
    ],
    [
        'name' => 'Create Postalcode',
        'type' => '2',
        'description' => 'Create Postalcode',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856531',
        'updated_at' => '1549634117',
    ],
    [
        'name' => 'Create Street',
        'type' => '2',
        'description' => 'Create Street',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856530',
        'updated_at' => '1512856530',
    ],
    [
        'name' => 'Create Tax',
        'type' => '2',
        'description' => 'Create Tax',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1544662943',
        'updated_at' => '1544662943',
    ],
    [
        'name' => 'createItem',
        'type' => '2',
        'description' => 'Create item',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1577666562',
        'updated_at' => '1577666562',
    ],
    [
        'name' => 'Delete Carousal',
        'type' => '2',
        'description' => 'Delete Carousal',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1544661364',
        'updated_at' => '1544661364',
    ],
    [
        'name' => 'Delete Company',
        'type' => '2',
        'description' => 'Delete Company',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856530',
        'updated_at' => '1512856530',
    ],
    [
        'name' => 'Delete Daily Clean',
        'type' => '2',
        'description' => 'Delete Daily Clean',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856530',
        'updated_at' => '1512856530',
    ],
    [
        'name' => 'Delete Daily Job Sheet',
        'type' => '2',
        'description' => 'Delete Daily Job Sheet',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856530',
        'updated_at' => '1512856530',
    ],
    [
        'name' => 'Delete Employee',
        'type' => '2',
        'description' => 'Delete Employee',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856530',
        'updated_at' => '1512856530',
    ],
    [
        'name' => 'Delete House',
        'type' => '2',
        'description' => 'Delete House',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856530',
        'updated_at' => '1512856530',
    ],
    [
        'name' => 'Delete Instruction',
        'type' => '2',
        'description' => 'Delete Instruction',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1549634229',
        'updated_at' => '1549634229',
    ],
    [
        'name' => 'Delete Mandate',
        'type' => '2',
        'description' => 'Delete Mandate',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1564647708',
        'updated_at' => '1564647708',
    ],
    [
        'name' => 'Delete Messagelog',
        'type' => '2',
        'description' => 'Delete Messagelog',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1544660767',
        'updated_at' => '1544660767',
    ],
    [
        'name' => 'Delete Messaging',
        'type' => '2',
        'description' => 'Delete Messaging',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1544660079',
        'updated_at' => '1544660079',
    ],
    [
        'name' => 'Delete Postalcode',
        'type' => '2',
        'description' => 'Delete Postalcode',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856531',
        'updated_at' => '1512856531',
    ],
    [
        'name' => 'Delete Street',
        'type' => '2',
        'description' => 'Delete Street',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856531',
        'updated_at' => '1549633538',
    ],
    [
        'name' => 'Delete Tax',
        'type' => '2',
        'description' => 'Delete Tax',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1544662983',
        'updated_at' => '1544662983',
    ],
    [
        'name' => 'deleteItem',
        'type' => '2',
        'description' => 'Delete item',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1577666562',
        'updated_at' => '1577666562',
    ],
    [
        'name' => 'demo',
        'type' => '1',
        'description' => 'demo',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1584405564',
        'updated_at' => '1584889800',
    ],
    [
        'name' => 'Import Houses',
        'type' => '2',
        'description' => 'Import Houses',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1573842472',
        'updated_at' => '1573842472',
    ],
    [
        'name' => 'Manage Admin',
        'type' => '2',
        'description' => 'Manage Admin',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1577744346',
        'updated_at' => '1577744346',
    ],
    [
        'name' => 'Manage Basic',
        'type' => '2',
        'description' => 'Perform Basic Tasks',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1578419959',
        'updated_at' => '1578419959',
    ],
    [
        'name' => 'Manage Money',
        'type' => '2',
        'description' => 'Manage Money',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1546700864',
        'updated_at' => '1546700864',
    ],
    [
        'name' => 'manageRoles',
        'type' => '2',
        'description' => 'Manage Roles and Permissions',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1577666562',
        'updated_at' => '1577666562',
    ],
    [
        'name' => 'manageUsers',
        'type' => '2',
        'description' => 'Manage Users',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1577666562',
        'updated_at' => '1577666562',
    ],
    [
        'name' => 'Mdb0',
        'type' => '1',
        'description' => 'Manager of db',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1577738006',
        'updated_at' => '1583578098',
    ],
    [
        'name' => 'Mdb1',
        'type' => '1',
        'description' => 'Manager of db1',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1577738006',
        'updated_at' => '1583578098',
    ],
    [
        'name' => 'Mdb10',
        'type' => '1',
        'description' => 'Manager of db10',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1579035344',
        'updated_at' => '1584471378',
    ],
    [
        'name' => 'Mdb2',
        'type' => '1',
        'description' => 'Manager of db2',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1578741488',
        'updated_at' => '1584409353',
    ],
    [
        'name' => 'Mdb3',
        'type' => '1',
        'description' => 'Manager of db3',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1581581720',
        'updated_at' => '1581666851',
    ],
    [
        'name' => 'Mdb4',
        'type' => '1',
        'description' => 'Manager of db4',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1581666990',
        'updated_at' => '1583577278',
    ],
    [
        'name' => 'Mdb5',
        'type' => '1',
        'description' => 'Manager of db5',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1584401245',
        'updated_at' => '1584471624',
    ],
    [
        'name' => 'Mdb6',
        'type' => '1',
        'description' => 'Manager of db6',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1584401245',
        'updated_at' => '1584471624',
    ],
    [
        'name' => 'Mdb7',
        'type' => '1',
        'description' => 'Manager of db7',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1579035344',
        'updated_at' => '1584471378',
    ],
    [
        'name' => 'Mdb8',
        'type' => '1',
        'description' => 'Manager of db8',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1579035344',
        'updated_at' => '1584471378',
    ],
    [
        'name' => 'Mdb9',
        'type' => '1',
        'description' => 'Manager of db9',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1579035344',
        'updated_at' => '1584471378',
    ],
    [
        'name' => 'See Prices',
        'type' => '2',
        'description' => 'See Prices',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1583610917',
        'updated_at' => '1583610917',
    ],
    [
        'name' => 'Subscription Free Privilege',
        'type' => '2',
        'description' => 'A Paypal Subscription is Not Necessary For This User',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1580914633',
        'updated_at' => '1580914876',
    ],
    [
        'name' => 'support',
        'type' => '1',
        'description' => 'Create, update, delete all company specific data specific to designated company database. Mdb roles subservient to support role. ',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1577666562',
        'updated_at' => '1584883604',
    ],
    [
        'name' => 'Udb0',
        'type' => '1',
        'description' => 'Subcontractor of db',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1583583080',
        'updated_at' => '1583583080',
    ],
    [
        'name' => 'Udb1',
        'type' => '1',
        'description' => 'Subcontractor of db1',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1583583080',
        'updated_at' => '1583583080',
    ],
    [
        'name' => 'Udb10',
        'type' => '1',
        'description' => 'Subcontractor of db10',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1584402344',
        'updated_at' => '1584471662',
    ],
    [
        'name' => 'Udb2',
        'type' => '1',
        'description' => 'Subcontractor of db2',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1583583080',
        'updated_at' => '1583583080',
    ],
    [
        'name' => 'Udb3',
        'type' => '1',
        'description' => 'Subcontractor of db3',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1583578326',
        'updated_at' => '1583580986',
    ],
    [
        'name' => 'Udb4',
        'type' => '1',
        'description' => 'Subcontractor of db4',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1583577262',
        'updated_at' => '1583581014',
    ],
    [
        'name' => 'Udb5',
        'type' => '1',
        'description' => 'Subcontractor of db5',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1584402344',
        'updated_at' => '1584471662',
    ],
    [
        'name' => 'Udb6',
        'type' => '1',
        'description' => 'Subcontractor of db6',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1584402344',
        'updated_at' => '1584471662',
    ],
    [
        'name' => 'Udb7',
        'type' => '1',
        'description' => 'Subcontractor of db7',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1584402344',
        'updated_at' => '1584471662',
    ],
    [
        'name' => 'Udb8',
        'type' => '1',
        'description' => 'Subcontractor of db8',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1584402344',
        'updated_at' => '1584471662',
    ],
    [
        'name' => 'Udb9',
        'type' => '1',
        'description' => 'Subcontractor of db9',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1584402344',
        'updated_at' => '1584471662',
    ],
    [
        'name' => 'Update Carousal',
        'type' => '2',
        'description' => 'Update Carousal',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1544661341',
        'updated_at' => '1544661341',
    ],
    [
        'name' => 'Update Company',
        'type' => '2',
        'description' => 'Update Company',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856530',
        'updated_at' => '1512856530',
    ],
    [
        'name' => 'Update Daily Clean',
        'type' => '2',
        'description' => 'Update Daily Clean',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856530',
        'updated_at' => '1512856530',
    ],
    [
        'name' => 'Update Daily Job Sheet',
        'type' => '2',
        'description' => 'Update Daily Job Sheet',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856530',
        'updated_at' => '1512856530',
    ],
    [
        'name' => 'Update Employee',
        'type' => '2',
        'description' => 'Update Employee',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856530',
        'updated_at' => '1512856530',
    ],
    [
        'name' => 'Update House',
        'type' => '2',
        'description' => 'Update House',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856530',
        'updated_at' => '1512856530',
    ],
    [
        'name' => 'Update Instruction',
        'type' => '2',
        'description' => 'Update Instruction',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1549634253',
        'updated_at' => '1549634253',
    ],
    [
        'name' => 'Update Mandate',
        'type' => '2',
        'description' => 'Update Mandate',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1564647635',
        'updated_at' => '1564647635',
    ],
    [
        'name' => 'Update Messagelog',
        'type' => '2',
        'description' => 'Update Messagelog',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1544660748',
        'updated_at' => '1544660748',
    ],
    [
        'name' => 'Update Messaging',
        'type' => '2',
        'description' => 'Update Messaging',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1544660035',
        'updated_at' => '1544660035',
    ],
    [
        'name' => 'Update Postalcode',
        'type' => '2',
        'description' => 'Update Postalcode',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856531',
        'updated_at' => '1512856531',
    ],
    [
        'name' => 'Update Street',
        'type' => '2',
        'description' => 'Update Street',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856531',
        'updated_at' => '1512856531',
    ],
    [
        'name' => 'Update Tax',
        'type' => '2',
        'description' => 'Update Tax',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1544662962',
        'updated_at' => '1544662962',
    ],
    [
        'name' => 'updateCommonUser',
        'type' => '2',
        'description' => 'Update user data, but not those of \'admin\'',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1577666562',
        'updated_at' => '1577666562',
    ],
    [
        'name' => 'updateCreatedItem',
        'type' => '2',
        'description' => 'Update own item',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1577666562',
        'updated_at' => '1577666562',
    ],
    [
        'name' => 'updateItem',
        'type' => '2',
        'description' => 'Update item',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1577666562',
        'updated_at' => '1577666562',
    ],
    [
        'name' => 'updateUser',
        'type' => '2',
        'description' => 'Update user data',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1577666562',
        'updated_at' => '1577666562',
    ],
    [
        'name' => 'View Bulletin Board',
        'type' => '2',
        'description' => 'View Bulletin Board',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1563826631',
        'updated_at' => '1563826631',
    ],
    [
        'name' => 'View Carousal',
        'type' => '2',
        'description' => 'View Carousal',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1558795525',
        'updated_at' => '1558795525',
    ],
    [
        'name' => 'View Company',
        'type' => '2',
        'description' => 'View Company',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1512856530',
        'updated_at' => '1512856530',
    ],
    [
        'name' => 'View Daily Clean',
        'type' => '2',
        'description' => 'View Daily Clean',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1546702743',
        'updated_at' => '1546702743',
    ],
    [
        'name' => 'View House',
        'type' => '2',
        'description' => 'View House',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1583581575',
        'updated_at' => '1583581575',
    ],
    [
        'name' => 'View Instruction',
        'type' => '2',
        'description' => 'View Instruction',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1549634202',
        'updated_at' => '1549635005',
    ],
    [
        'name' => 'View Mandate',
        'type' => '2',
        'description' => 'View Mandate',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1564647670',
        'updated_at' => '1564647670',
    ],
    [
        'name' => 'View Revenue Reports',
        'type' => '2',
        'description' => 'View Revenue Reports',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1564039903',
        'updated_at' => '1564039903',
    ],
    [
        'name' => 'Backup Database',
        'type' => '2',
        'description' => 'Backup their allocated database',
        'rule_name' => null,
        'data' => null,
        'created_at' => '1564039903',
        'updated_at' => '1564039903',
    ],                            
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%auth_item}} CASCADE');
    }
}
