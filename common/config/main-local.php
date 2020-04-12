<?php

//Why: Share this software out to as many companies (or separate divisions within a company) that want to use it either for a paypal subscription ie. Remove 

//'Subscription Free Privilege' from their individual 'Mdb#' role or 'Udb#' where # corresponds to the database number here.

//The Mdb# role is used for the manager of that specific company/division and the Udb# role is used for employees.

//All Mdb roles are linked to the 'support' role so change the support role 'makeup' if you want this to be applicable to all

//managers using the software. Use with caution since this role change will effect all databases.

//All Udb roles are linked to the 'employee' role so change the employee role 'makeup' if you want this to be applicable to all

//employees using this software. Use with caution since this role change will effect all databases.

//Shared Hosting Database Setup. Reserve the first database namely 'db' for the installer database where you will

//input users that will be allocated use of the other databases. Signup all users with their email and role and temporary password

//and assign either the Mdb role or Udb role to their username using the built in Role Based Access Control GUI (Graphical User Interface) user interface.

//This file works in conjunction with frontend/components/Utilities and any databases over and above the 10 created here must be matched by adjusting the 

//code in  frontend/components/Utilities so that the individual models used  throughout the software via the getDb function use the 

//correct database. 

//

//Keep the database name consistent with the naming convention here. ie. db1 is used here therefore name your MySql database db1.

//Change the passwords here from '' to the specification required by your hosting provider. eg. One uppercase and minimum of 8 characters

//including a special character. 

//Increase the number of databases here according to the number of MySql databases that you have manually created on the server using phpMyAdmin

//10 database have been created here under the premise that you will have 10 fellow companies or perhaps even 10 divisions within your

//company that will be responsible for their own jobs and cash collections.

//

return [

    'components' => [

        'db' => [

            'class' => 'yii\db\Connection',

            'dsn' => 'mysql:host=localhost;dbname=h2h_db',

            //user name is normally 'yoursitename_co_uk_db'

            'username' => 'root',

            //password is the password that has been assigned under the above username 

            'password' => '',

            'charset' => 'utf8',

            'enableSchemaCache' => true,

            'schemaCacheDuration' => 3600,

            'schemaCache' => 'cache',

        ],

        'db1' => [

            'class' => 'yii\db\Connection',

            'dsn' => 'mysql:host=localhost;dbname=h2h_db1',

            //user name is normally 'yoursitename_co_uk_db1'

            'username' => 'root',

            //password is the password that has been assigned under the above username 

            'password' => '',

            'charset' => 'utf8',

            'enableSchemaCache' => true,

            'schemaCacheDuration' => 3600,

            'schemaCache' => 'cache',

        ],

        'db2' => [

            'class' => 'yii\db\Connection',

            'dsn' => 'mysql:host=localhost;dbname=h2h_db2',

            'username' => 'root',

            'password' => '',

            'charset' => 'utf8',

            'enableSchemaCache' => true,

            'schemaCacheDuration' => 3600,

            'schemaCache' => 'cache',

        ],

        'db3' => [

            'class' => 'yii\db\Connection',

            'dsn' => 'mysql:host=localhost;dbname=h2h_db3',

            'username' => 'root',

            'password' => '',

            'charset' => 'utf8',

            'enableSchemaCache' => true,

            'schemaCacheDuration' => 3600,

            'schemaCache' => 'cache',

        ],

        'db4' => [

            'class' => 'yii\db\Connection',

            'dsn' => 'mysql:host=localhost;dbname=h2h_db4',

            'username' => 'root',

            'password' => '',

            'charset' => 'utf8',

            'enableSchemaCache' => true,

            'schemaCacheDuration' => 3600,

            'schemaCache' => 'cache',

        ],

        'db5' => [

            'class' => 'yii\db\Connection',

            'dsn' => 'mysql:host=localhost;dbname=h2h_db5',

            'username' => 'root',

            'password' => '',

            'charset' => 'utf8',

            'enableSchemaCache' => true,

            'schemaCacheDuration' => 3600,

            'schemaCache' => 'cache',

        ],

        'db6' => [

            'class' => 'yii\db\Connection',

            'dsn' => 'mysql:host=localhost;dbname=h2h_db6',

            'username' => 'root',

            'password' => '',

            'charset' => 'utf8',

            'enableSchemaCache' => true,

            'schemaCacheDuration' => 3600,

            'schemaCache' => 'cache',

        ],

        'db7' => [

            'class' => 'yii\db\Connection',

            'dsn' => 'mysql:host=localhost;dbname=h2h_db7',

            'username' => 'root',

            'password' => '',

            'charset' => 'utf8',

            'enableSchemaCache' => true,

            'schemaCacheDuration' => 3600,

            'schemaCache' => 'cache',

        ],

        'db8' => [

            'class' => 'yii\db\Connection',

            'dsn' => 'mysql:host=localhost;dbname=h2h_db8',

            'username' => 'root',

            'password' => '',

            'charset' => 'utf8',

            'enableSchemaCache' => true,

            'schemaCacheDuration' => 3600,

            'schemaCache' => 'cache',

        ],

        'db9' => [

            'class' => 'yii\db\Connection',

            'dsn' => 'mysql:host=localhost;dbname=h2h_db9',

            'username' => 'root',

            'password' => '',

            'charset' => 'utf8',

            'enableSchemaCache' => true,

            'schemaCacheDuration' => 3600,

            'schemaCache' => 'cache',

        ],

        'db10' => [

            'class' => 'yii\db\Connection',

            'dsn' => 'mysql:host=localhost;dbname=h2h_db10',

            'username' => 'root',

            'password' => '',

            'charset' => 'utf8',

            'enableSchemaCache' => true,

            'schemaCacheDuration' => 3600,

            'schemaCache' => 'cache',

        ],

    ],    

];
