<?php
namespace console\migrations\auth;

use yii\db\Schema;
use yii\db\Migration;

class m200413_082924_auth_item_childDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%auth_item_child}}',
                           ["parent", "child"],
                            [
    [
        'parent' => 'admin',
        'child' => 'Access db',
    ],
    [
        'parent' => 'Mdb0',
        'child' => 'Access db',
    ],
    [
        'parent' => 'Udb0',
        'child' => 'Access db',
    ],
    [
        'parent' => 'Mdb1',
        'child' => 'Access db1',
    ],
    [
        'parent' => 'Udb1',
        'child' => 'Access db1',
    ],
    [
        'parent' => 'Mdb10',
        'child' => 'Access db10',
    ],
    [
        'parent' => 'Udb10',
        'child' => 'Access db10',
    ],
    [
        'parent' => 'Mdb2',
        'child' => 'Access db2',
    ],
    [
        'parent' => 'Udb2',
        'child' => 'Access db2',
    ],
    [
        'parent' => 'Mdb3',
        'child' => 'Access db3',
    ],
    [
        'parent' => 'Udb3',
        'child' => 'Access db3',
    ],
    [
        'parent' => 'Mdb4',
        'child' => 'Access db4',
    ],
    [
        'parent' => 'Udb4',
        'child' => 'Access db4',
    ],
    [
        'parent' => 'Mdb5',
        'child' => 'Access db5',
    ],
    [
        'parent' => 'Udb5',
        'child' => 'Access db5',
    ],
    [
        'parent' => 'Mdb6',
        'child' => 'Access db6',
    ],
    [
        'parent' => 'Udb6',
        'child' => 'Access db6',
    ],
    [
        'parent' => 'Mdb7',
        'child' => 'Access db7',
    ],
    [
        'parent' => 'Udb7',
        'child' => 'Access db7',
    ],
    [
        'parent' => 'Mdb8',
        'child' => 'Access db8',
    ],
    [
        'parent' => 'Udb8',
        'child' => 'Access db8',
    ],
    [
        'parent' => 'Mdb9',
        'child' => 'Access db9',
    ],
    [
        'parent' => 'Udb9',
        'child' => 'Access db9',
    ],
    [
        'parent' => 'admin',
        'child' => 'Access paypalagreement',
    ],
    [
        'parent' => 'admin',
        'child' => 'Access Session',
    ],
    [
        'parent' => 'admin',
        'child' => 'Access Sessiondetail',
    ],
    [
        'parent' => 'admin',
        'child' => 'Create Carousal',
    ],
    [
        'parent' => 'demo',
        'child' => 'Create Carousal',
    ],
    [
        'parent' => 'support',
        'child' => 'Create Carousal',
    ],
    [
        'parent' => 'admin',
        'child' => 'Create Company',
    ],
    [
        'parent' => 'admin',
        'child' => 'Create Daily Clean',
    ],
    [
        'parent' => 'demo',
        'child' => 'Create Daily Clean',
    ],
    [
        'parent' => 'support',
        'child' => 'Create Daily Clean',
    ],
    [
        'parent' => 'admin',
        'child' => 'Create Daily Job Sheet',
    ],
    [
        'parent' => 'demo',
        'child' => 'Create Daily Job Sheet',
    ],
    [
        'parent' => 'support',
        'child' => 'Create Daily Job Sheet',
    ],
    [
        'parent' => 'admin',
        'child' => 'Create Employee',
    ],
    [
        'parent' => 'demo',
        'child' => 'Create Employee',
    ],
    [
        'parent' => 'support',
        'child' => 'Create Employee',
    ],
    [
        'parent' => 'admin',
        'child' => 'Create Gocardlesscustomer',
    ],
    [
        'parent' => 'demo',
        'child' => 'Create Gocardlesscustomer',
    ],
    [
        'parent' => 'support',
        'child' => 'Create Gocardlesscustomer',
    ],
    [
        'parent' => 'admin',
        'child' => 'Create House',
    ],
    [
        'parent' => 'demo',
        'child' => 'Create House',
    ],
    [
        'parent' => 'support',
        'child' => 'Create House',
    ],
    [
        'parent' => 'admin',
        'child' => 'Create Instruction',
    ],
    [
        'parent' => 'demo',
        'child' => 'Create Instruction',
    ],
    [
        'parent' => 'support',
        'child' => 'Create Instruction',
    ],
    [
        'parent' => 'admin',
        'child' => 'Create Legal',
    ],
    [
        'parent' => 'admin',
        'child' => 'Create Mandate',
    ],
    [
        'parent' => 'demo',
        'child' => 'Create Mandate',
    ],
    [
        'parent' => 'support',
        'child' => 'Create Mandate',
    ],
    [
        'parent' => 'admin',
        'child' => 'Create Messagelog',
    ],
    [
        'parent' => 'demo',
        'child' => 'Create Messagelog',
    ],
    [
        'parent' => 'support',
        'child' => 'Create Messagelog',
    ],
    [
        'parent' => 'admin',
        'child' => 'Create Messaging',
    ],
    [
        'parent' => 'demo',
        'child' => 'Create Messaging',
    ],
    [
        'parent' => 'support',
        'child' => 'Create Messaging',
    ],
    [
        'parent' => 'admin',
        'child' => 'Create Postalcode',
    ],
    [
        'parent' => 'demo',
        'child' => 'Create Postalcode',
    ],
    [
        'parent' => 'support',
        'child' => 'Create Postalcode',
    ],
    [
        'parent' => 'admin',
        'child' => 'Create Street',
    ],
    [
        'parent' => 'demo',
        'child' => 'Create Street',
    ],
    [
        'parent' => 'support',
        'child' => 'Create Street',
    ],
    [
        'parent' => 'admin',
        'child' => 'Create Tax',
    ],
    [
        'parent' => 'demo',
        'child' => 'Create Tax',
    ],
    [
        'parent' => 'support',
        'child' => 'Create Tax',
    ],
    [
        'parent' => 'admin',
        'child' => 'createItem',
    ],
    [
        'parent' => 'admin',
        'child' => 'Delete Carousal',
    ],
    [
        'parent' => 'demo',
        'child' => 'Delete Carousal',
    ],
    [
        'parent' => 'support',
        'child' => 'Delete Carousal',
    ],
    [
        'parent' => 'admin',
        'child' => 'Delete Company',
    ],
    [
        'parent' => 'admin',
        'child' => 'Delete Daily Clean',
    ],
    [
        'parent' => 'demo',
        'child' => 'Delete Daily Clean',
    ],
    [
        'parent' => 'support',
        'child' => 'Delete Daily Clean',
    ],
    [
        'parent' => 'admin',
        'child' => 'Delete Daily Job Sheet',
    ],
    [
        'parent' => 'demo',
        'child' => 'Delete Daily Job Sheet',
    ],
    [
        'parent' => 'support',
        'child' => 'Delete Daily Job Sheet',
    ],
    [
        'parent' => 'admin',
        'child' => 'Delete Employee',
    ],
    [
        'parent' => 'demo',
        'child' => 'Delete Employee',
    ],
    [
        'parent' => 'support',
        'child' => 'Delete Employee',
    ],
    [
        'parent' => 'admin',
        'child' => 'Delete House',
    ],
    [
        'parent' => 'demo',
        'child' => 'Delete House',
    ],
    [
        'parent' => 'support',
        'child' => 'Delete House',
    ],
    [
        'parent' => 'admin',
        'child' => 'Delete Instruction',
    ],
    [
        'parent' => 'demo',
        'child' => 'Delete Instruction',
    ],
    [
        'parent' => 'support',
        'child' => 'Delete Instruction',
    ],
    [
        'parent' => 'admin',
        'child' => 'Delete Mandate',
    ],
    [
        'parent' => 'demo',
        'child' => 'Delete Mandate',
    ],
    [
        'parent' => 'support',
        'child' => 'Delete Mandate',
    ],
    [
        'parent' => 'admin',
        'child' => 'Delete Messagelog',
    ],
    [
        'parent' => 'demo',
        'child' => 'Delete Messagelog',
    ],
    [
        'parent' => 'support',
        'child' => 'Delete Messagelog',
    ],
    [
        'parent' => 'admin',
        'child' => 'Delete Messaging',
    ],
    [
        'parent' => 'demo',
        'child' => 'Delete Messaging',
    ],
    [
        'parent' => 'support',
        'child' => 'Delete Messaging',
    ],
    [
        'parent' => 'admin',
        'child' => 'Delete Postalcode',
    ],
    [
        'parent' => 'demo',
        'child' => 'Delete Postalcode',
    ],
    [
        'parent' => 'support',
        'child' => 'Delete Postalcode',
    ],
    [
        'parent' => 'admin',
        'child' => 'Delete Street',
    ],
    [
        'parent' => 'demo',
        'child' => 'Delete Street',
    ],
    [
        'parent' => 'support',
        'child' => 'Delete Street',
    ],
    [
        'parent' => 'admin',
        'child' => 'Delete Tax',
    ],
    [
        'parent' => 'demo',
        'child' => 'Delete Tax',
    ],
    [
        'parent' => 'support',
        'child' => 'Delete Tax',
    ],
    [
        'parent' => 'admin',
        'child' => 'deleteItem',
    ],
    [
        'parent' => 'Udb0',
        'child' => 'employee',
    ],
    [
        'parent' => 'Udb1',
        'child' => 'employee',
    ],
    [
        'parent' => 'Udb10',
        'child' => 'employee',
    ],
    [
        'parent' => 'Udb2',
        'child' => 'employee',
    ],
    [
        'parent' => 'Udb3',
        'child' => 'employee',
    ],
    [
        'parent' => 'Udb4',
        'child' => 'employee',
    ],
    [
        'parent' => 'Udb5',
        'child' => 'employee',
    ],
    [
        'parent' => 'Udb6',
        'child' => 'employee',
    ],
    [
        'parent' => 'Udb7',
        'child' => 'employee',
    ],
    [
        'parent' => 'Udb8',
        'child' => 'employee',
    ],
    [
        'parent' => 'Udb9',
        'child' => 'employee',
    ],
    [
        'parent' => 'admin',
        'child' => 'Import Houses',
    ],
    [
        'parent' => 'demo',
        'child' => 'Import Houses',
    ],
    [
        'parent' => 'support',
        'child' => 'Import Houses',
    ],
    [
        'parent' => 'admin',
        'child' => 'Manage Admin',
    ],
    [
        'parent' => 'support',
        'child' => 'Manage Admin',
    ],
    [
        'parent' => 'admin',
        'child' => 'Manage Basic',
    ],
    [
        'parent' => 'demo',
        'child' => 'Manage Basic',
    ],
    [
        'parent' => 'employee',
        'child' => 'Manage Basic',
    ],
    [
        'parent' => 'support',
        'child' => 'Manage Basic',
    ],
    [
        'parent' => 'admin',
        'child' => 'Manage Money',
    ],
    [
        'parent' => 'demo',
        'child' => 'Manage Money',
    ],
    [
        'parent' => 'support',
        'child' => 'Manage Money',
    ],
    [
        'parent' => 'admin',
        'child' => 'manageRoles',
    ],
    [
        'parent' => 'admin',
        'child' => 'manageUsers',
    ],
    [
        'parent' => 'demo',
        'child' => 'manageUsers',
    ],
    [
        'parent' => 'Mdb0',
        'child' => 'manageUsers',
    ],
    [
        'parent' => 'support',
        'child' => 'manageUsers',
    ],
    [
        'parent' => 'admin',
        'child' => 'See Prices',
    ],
    [
        'parent' => 'demo',
        'child' => 'See Prices',
    ],
    [
        'parent' => 'support',
        'child' => 'See Prices',
    ],
    [
        'parent' => 'admin',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Mdb0',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Mdb1',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Mdb10',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Mdb2',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Mdb3',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Mdb4',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Mdb5',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Mdb6',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Mdb7',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Mdb8',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Mdb9',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Udb0',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Udb1',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Udb10',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Udb2',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Udb3',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Udb4',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Udb5',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Udb6',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Udb7',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Udb8',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Udb9',
        'child' => 'Subscription Free Privilege',
    ],
    [
        'parent' => 'Mdb0',
        'child' => 'support',
    ],
    [
        'parent' => 'Mdb1',
        'child' => 'support',
    ],
    [
        'parent' => 'Mdb10',
        'child' => 'support',
    ],
    [
        'parent' => 'Mdb2',
        'child' => 'support',
    ],
    [
        'parent' => 'Mdb3',
        'child' => 'support',
    ],
    [
        'parent' => 'Mdb4',
        'child' => 'support',
    ],
    [
        'parent' => 'Mdb5',
        'child' => 'support',
    ],
    [
        'parent' => 'Mdb6',
        'child' => 'support',
    ],
    [
        'parent' => 'Mdb7',
        'child' => 'support',
    ],
    [
        'parent' => 'Mdb8',
        'child' => 'support',
    ],
    [
        'parent' => 'Mdb9',
        'child' => 'support',
    ],
    [
        'parent' => 'admin',
        'child' => 'Update Carousal',
    ],
    [
        'parent' => 'demo',
        'child' => 'Update Carousal',
    ],
    [
        'parent' => 'support',
        'child' => 'Update Carousal',
    ],
    [
        'parent' => 'admin',
        'child' => 'Update Company',
    ],
    [
        'parent' => 'support',
        'child' => 'Update Company',
    ],
    [
        'parent' => 'admin',
        'child' => 'Update Daily Clean',
    ],
    [
        'parent' => 'demo',
        'child' => 'Update Daily Clean',
    ],
    [
        'parent' => 'support',
        'child' => 'Update Daily Clean',
    ],
    [
        'parent' => 'admin',
        'child' => 'Update Daily Job Sheet',
    ],
    [
        'parent' => 'demo',
        'child' => 'Update Daily Job Sheet',
    ],
    [
        'parent' => 'support',
        'child' => 'Update Daily Job Sheet',
    ],
    [
        'parent' => 'admin',
        'child' => 'Update Employee',
    ],
    [
        'parent' => 'demo',
        'child' => 'Update Employee',
    ],
    [
        'parent' => 'support',
        'child' => 'Update Employee',
    ],
    [
        'parent' => 'admin',
        'child' => 'Update House',
    ],
    [
        'parent' => 'demo',
        'child' => 'Update House',
    ],
    [
        'parent' => 'support',
        'child' => 'Update House',
    ],
    [
        'parent' => 'admin',
        'child' => 'Update Instruction',
    ],
    [
        'parent' => 'demo',
        'child' => 'Update Instruction',
    ],
    [
        'parent' => 'support',
        'child' => 'Update Instruction',
    ],
    [
        'parent' => 'admin',
        'child' => 'Update Mandate',
    ],
    [
        'parent' => 'demo',
        'child' => 'Update Mandate',
    ],
    [
        'parent' => 'support',
        'child' => 'Update Mandate',
    ],
    [
        'parent' => 'admin',
        'child' => 'Update Messagelog',
    ],
    [
        'parent' => 'demo',
        'child' => 'Update Messagelog',
    ],
    [
        'parent' => 'support',
        'child' => 'Update Messagelog',
    ],
    [
        'parent' => 'admin',
        'child' => 'Update Messaging',
    ],
    [
        'parent' => 'demo',
        'child' => 'Update Messaging',
    ],
    [
        'parent' => 'support',
        'child' => 'Update Messaging',
    ],
    [
        'parent' => 'admin',
        'child' => 'Update Postalcode',
    ],
    [
        'parent' => 'demo',
        'child' => 'Update Postalcode',
    ],
    [
        'parent' => 'support',
        'child' => 'Update Postalcode',
    ],
    [
        'parent' => 'admin',
        'child' => 'Update Street',
    ],
    [
        'parent' => 'demo',
        'child' => 'Update Street',
    ],
    [
        'parent' => 'support',
        'child' => 'Update Street',
    ],
    [
        'parent' => 'admin',
        'child' => 'Update Tax',
    ],
    [
        'parent' => 'demo',
        'child' => 'Update Tax',
    ],
    [
        'parent' => 'support',
        'child' => 'Update Tax',
    ],
    [
        'parent' => 'support',
        'child' => 'updateCommonUser',
    ],
    [
        'parent' => 'admin',
        'child' => 'updateCreatedItem',
    ],
    [
        'parent' => 'admin',
        'child' => 'updateItem',
    ],
    [
        'parent' => 'updateCreatedItem',
        'child' => 'updateItem',
    ],
    [
        'parent' => 'admin',
        'child' => 'updateUser',
    ],
    [
        'parent' => 'updateCommonUser',
        'child' => 'updateUser',
    ],
    [
        'parent' => 'admin',
        'child' => 'View Bulletin Board',
    ],
    [
        'parent' => 'support',
        'child' => 'View Bulletin Board',
    ],
    [
        'parent' => 'admin',
        'child' => 'View Carousal',
    ],
    [
        'parent' => 'demo',
        'child' => 'View Carousal',
    ],
    [
        'parent' => 'support',
        'child' => 'View Carousal',
    ],
    [
        'parent' => 'admin',
        'child' => 'View Company',
    ],
    [
        'parent' => 'demo',
        'child' => 'View Company',
    ],
    [
        'parent' => 'support',
        'child' => 'View Company',
    ],
    [
        'parent' => 'admin',
        'child' => 'View Daily Clean',
    ],
    [
        'parent' => 'demo',
        'child' => 'View Daily Clean',
    ],
    [
        'parent' => 'support',
        'child' => 'View Daily Clean',
    ],
    [
        'parent' => 'Udb0',
        'child' => 'View Daily Clean',
    ],
    [
        'parent' => 'Udb1',
        'child' => 'View Daily Clean',
    ],
    [
        'parent' => 'Udb10',
        'child' => 'View Daily Clean',
    ],
    [
        'parent' => 'Udb2',
        'child' => 'View Daily Clean',
    ],
    [
        'parent' => 'Udb3',
        'child' => 'View Daily Clean',
    ],
    [
        'parent' => 'Udb4',
        'child' => 'View Daily Clean',
    ],
    [
        'parent' => 'Udb5',
        'child' => 'View Daily Clean',
    ],
    [
        'parent' => 'Udb6',
        'child' => 'View Daily Clean',
    ],
    [
        'parent' => 'Udb7',
        'child' => 'View Daily Clean',
    ],
    [
        'parent' => 'Udb8',
        'child' => 'View Daily Clean',
    ],
    [
        'parent' => 'Udb9',
        'child' => 'View Daily Clean',
    ],
    [
        'parent' => 'admin',
        'child' => 'View House',
    ],
    [
        'parent' => 'demo',
        'child' => 'View House',
    ],
    [
        'parent' => 'support',
        'child' => 'View House',
    ],
    [
        'parent' => 'admin',
        'child' => 'View Instruction',
    ],
    [
        'parent' => 'demo',
        'child' => 'View Instruction',
    ],
    [
        'parent' => 'support',
        'child' => 'View Instruction',
    ],
    [
        'parent' => 'admin',
        'child' => 'View Mandate',
    ],
    [
        'parent' => 'support',
        'child' => 'View Mandate',
    ],
    [
        'parent' => 'admin',
        'child' => 'View Revenue Reports',
    ],
    [
        'parent' => 'demo',
        'child' => 'View Revenue Reports',
    ],
    [
        'parent' => 'support',
        'child' => 'View Revenue Reports',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%auth_item_child}} CASCADE');
    }
}
