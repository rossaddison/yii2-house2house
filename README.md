**yii2-house2house**

**Licence**

Copyright 2020  House2House  BSD-3-Clause

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

**House to House Management Software eg. Cleaning Services, Delivery Services**

[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](https://www.yiiframework.com/) [![License](https://img.shields.io/badge/License-BSD%203--Clause-blue.svg)](https://opensource.org/licenses/BSD-3-Clause) [![stable](https://img.shields.io/static/v1?label=stable&message=1.0.1&color=9cf)

**Composer - add to require section**

    "rossaddison\yii2-house2house": "*", 

**Frequently Asked Questions ?**

**What has this software been used for mostly in the past?**

It has been built for **window cleaning** in the **UK** but can be modified for other service based companies. **Data protection** has been considered carefully in the package so most fields under the **Product table** (House) do not require data input and these fields are therefore not listed under the **'required'** fields. Refer to the suggested Privacy and Data Protection Policy under the /site/privacypolicy url when the site is hosted or under **frontend/views/site/privacypolicy.php.**.

**Demo?**
This repository is sometimes a month ahead of the demo at **roundrunner.co.uk** 

**What is the structure of the database?** 

**InnoDB** using collation utf8mb4_unicode_ci running on mySQL. The tables **works_salesorderheader** and **works_salesorderdetails** for instance have been built similar to **Microsoft's Adventure Works** making use of foreign keys. Yii2 is strong in this regard. Therefore Yii2's relations in models are used in many places to help **Eager loading and Lazy loading**.

**Can I use this package on a mobile phone?**
The package is **bootstrapped.** So it is viewable by means of desktop, mobile, and tablet, amongst others, provided you have an internet connection. 

**Is the package available in more than one language?**

**No.** You must generate a language by using the **Google Translate User Interface**. **+800** English sentences can be translated into 26 different languages. Yii2 provides the Yii::t('app','Convert this text into another language.') function which has been incorporated in this package. At the console/command prompt running the following command will generate a language specific folder under frontend\messages eg. frontend\messages\nl for the Dutch language. 

        yii message/extract @frontend/messages/template.php
        
This command looks at all the occurances of the Yii::t function in all files, takes the relevant text, looks up the languages setting in the template.php file and, for each two letter abbreviation eg. nl, creates a sub-folder under messages ie. messages/nl and inserts a app.php file which contains all these occurances. Using Google translate you can then translate these sentences and insert the results into the app.php file. app.php is now the **Php**MessageSource.

To generate a **Db**MessageSource. Go a little further down the template.php file and uncomment the db, format, and sourceMessageTable settings. Perform the following command to generate the **source_message** and **message** tables under database db.

        yii migrate --db=db --migrationPath=@yii/i18n/migrations
        
 Perform the following command:
 
        yii message/extract @frontend/messages/template.php
        
This fills the **source_message table** with English extracts, and you will be able to use the **Google Translate** grid to translate the English extracts to whatever languages are in the **languages array** under template.php. 

**How can the package be adapted?**

By editing the **Instruction list** table under **settings** which appears as a **dropdown** in the Daily Cleans list of houses. Each house that has been transferred to the Salesorderdetails or Daily Clean details has a **specific code** from the Instruction list. eg. FBS which stands for Front, Back and Sides. Also you can change attributes or descriptions under frontend/models to give a more personal feel to your business. 

The House is the customer. So there is **no Customer database because it is a cash business.** House is actually a **frontend/models/Product** according to the Adventure Works hierarchy of **Productcategory (Postcode)**, **Productsubcategory (Street)**, and **Product (House)**. This helps quick searching. Similarly **SalesorderHeader (Daily Clean)**, **SalesorderDetail (Individual cleans for that particular day).** 

This database relational design works hand in glove with **Kartik-v's** three tiered **dependency dropdown**. This thee tiered functionality works perfectly well in the Search Models and also in Kartik's grid's filters enabling quick retrieval of house records.

The Default is **shared hosting** with a subscription through **paypal's rest-api-sdk***. 
**10** companies/divisions/units can signup to your site. Users all get a **Free Subscription Privilege permission** from either their **Udb role for employees** or their **Mdb role for managers**. All Udb roles fall under the **employee role**. All Mdb roles fall under the **support role**. As a result the **paypal** service config details do **not** have to be setup if all users keep their **Subscription Free Privilege**. (frontend/modules/subscription/components/Configpaypal).

Each database works separately from the others. Each database shares the frontend code. How does this happen? Each model has the userDb() function. This function gives a database to  a user at login by using the function **frontend/components/ Utiilites::userLogin_set_database**. When the user registers, the administrator must match a role to the user . Each database has 2 roles. **eg. Mdb1 and Udb1 for db1** . Both have the permission **Access db1**. So when the administrator matches the user to a role eg. Udb1, and makes this connection 'active', the user can access db1.  

The first user to sign up gets the admin role. Admin matches all users of companies or divisions to role.

**Where do I setup the Swiftmailer SMTP connection settings of my host?**
Frontend/config/main.php

**Where do individual companies signing up setup their SMTP settings?**
Login...Settings...Company. If set their personal email host overrides the host's email facility.

**Php version?**

php **7.4.1** (3rd April 2020). Testing on php 7.4.4.  The composer.json is a **stable release**. Included is composer_dev_version.json. 

**Demo version?**

https://roundrunner.co.uk/libra/login. You will **not** get the Role Based Access Control Graphical User Interface. 
Use username: **demo**, password: **Demo1234**. All data is deleted on exit. See frontend/config/main.php. Bootstrap 4 - buttons, mobile layout, font adjuster - is used for the graphical interface.

**How do I create a Daily Clean?**

Go to **Daily Clean** and click the create button. A **Daily Clean** appears on the Grid. Having setup your Postcodes, Streets, and Houses, **under Houses**, select your houses by means of ticking them in the grid and copying them to the selected Daily Clean. Postcodes and Streets have to be manually entered. An optional SQL update/migration in the future is proposed to update the UK's postcodes and streets. 

**How do I see the individual cleans for the day?**

Under the **Daily Clean**, if you click on the + sign, the grid will expand and you will be able to see all the cleans for that day. You will be able to mark as paid those that have paid you. Click on **'cleans'** and you will see a more **detailed** list of the overall cleans. 

A useful feature is, if you are lost, you will be able to click on the address button to take you to **Google maps.**  If the postcode is not descriptive use Google's latitude and longitude **coordinates** for the beginning and end of the street. These streets will appear **highlighted** on the map if you choose good 'begin' and 'end' **coordinates** for each street. 

**How do I change the sequence or order of my streets to clean?**

Give the street an **sequence / order number**. Each order number should be unique.  The Daily Clean will be sorted according to the order of the streets if you have more than one street under the Daily Clean. If the run is difficult to follow, **'directions to next clean'** is a field that you can use to direct the cleaner to the **next street.**

**What should I put under 'job code' in the Daily Clean?**

eg. Bridgestone and Whitley run.
 
You should preferably not include a number since this run is going to occur at least once a month. 

**Once the houses have been copied from 'House' how do I repeat the Daily Clean for a future clean?** 
Tick the relevant Daily Clean and then tick on the **Ticked (copy)** button to get your choices of weekly, fortnightly etc.  

**How do I get a balance of the amount that my customer owes me?** 

If you go to houses and look at the far right side of the grid you will see the column **Debt** represented by a set of scales. Click on this icon and you will get a break down of the overall debt. You will have the ability to go to the individual debt. **SOD** (**Sales Order Detail**) stands for Sales Order Detail and represents a single house or clean on the Daily Clean **SOH** (**Sales Order Header**).

**I have several cleans in one area but do not want to enter them individually as this is time consuming. How can I speed the process up?**

Use the **Quick Build** facility situated between Street and Houses. Under the specific street, set the sequence or sort order to **500**, and simply move the house numbers on the left to the right. Set the sequence number back to the default of **99** once you have completed your build.

**How do I find my turnover or costs?** 

Your turnover can be determined under Daily Clean.  Your expenditure can be determined under Costs. Since this is a cash collection software package the amount is merely incremental and has no connection to an accounting package.  The paid amount could be modified in the frontend/models to facilitate quantity delivery if keeping stock of what has been delivered to a household.

**Gocardless payment solution**

Each  Company/Division/Unit setup can set their **Gocardless access token.** This will enable them to send a **Direct Debit Mandate** by email to their customers requesting them initially to give their **approval** to take payment(s) from their account. When a payment is due, you send them a **recurring or one-off variable** payment direct debit  amount which they must authorise within a period prior to the amount coming off their account. Each company will have to setup their **SMTP settings** for their Mailserver in order for this to function correctly. These settings are available under Company. These mailserver settings will be specific to the company. If a company has not set their mailserver settings then the default mailserver settings under frontend/config/main.php - mailer will apply. 

Once setup you will be able to use the two Gocardless related buttons under House. Tick the relevant house and click on either one of the following buttons:

1. 'Email Direct Debit Link to Customer for their Approval (tick)'  
1. 'Email Payment Request to Customer (tick)'

Email templates have been built into the controllers and as a future endeavour will be created separately.

**Twilio Text Messaging**

Multiple text message reminders can be sent by Twilio. You can set this under Company. You will have to **buy** a Twilio telephone number for this purpose. The Twilio telephone number is personal to your company  and is the channel that is used to send text messages.

**Alternative text messaging**

If your householder has consented to using their mobile number you can list this under Houses and you will have access to this under the Daily Cleans. Simply press their mobile number while online and **Android** will present its options. Your company will not be able to use the multiple text messaging that is available through Twilio.

**I am a sole trader with one employee and do not intend to use all 10 databases. How do I setup my users after installation?**

The first user to signup is automatically assigned the administrator or 'admin' role. This is as a result of employing **sjaakp/pluto** security login. There is no need to use the **Mdb0** or manager roles because the administrator is the manager. 

The admin role by default accesses the default db database because it is assigned the 'Access db' permission.  The subscription module works via the db database so the first user to signup must use the db database so as to administer individual subscriptions. 

Setup a Udb role similar to Udb1 for your employee with appropriate permissions. Signup your employee and assign the **Udb0** role to them. Make sure you have assigned the **'Access db'** permission to this user. 

**You will not need to setup the Mdb0 role.** The admin role by default has all the permissions that a manager has with their support role.  

You will be limiting this user to only being able to see what has to be cleaned for the day. Access the RBAC GUI and you will see all the Mdb and Udb roles for this purpose.

Any one of the 10 databases that you have setup through your phpMyadmin could be used for your specific company. So you could simply use db for the administration of the RBAC and select any one of the databases from db1 to db10 for your company itself.

The **Mdb# role** is used for the **manager** of a specific company/division and the **Udb# role** is used for employees.

All **Mdb roles** are linked to the **'support' role** so change the support role 'makeup' if you want this to be applicable to all
managers (Mdb0 to 10) under each separate company under each separate database using the software. ie. all users that are managers. Caution should be exercised here since a change here applies universally to all the companies/divisions that are using the software. 

All **Udb roles** are linked to the **'employee' role** so change the employee role 'makeup' if you want this to be applicable to all
employees (Udb0 to 10) under each separate company under each separate database using this software. ie. all users that are employees. Caution should be exercised here since a change here applies universally to all the companies/divisions that are using the software.

There are two permissions called **Manage Basic** and **Manage Admin**. **Mdb roles** have both the **Manage Basic** and the **Manage Admin** permission. **Udb roles** have only the **Manage Basic** permission. These two permissions are used in **frontend/views/layouts/main.ph**p which is the main menu interface.

**I have adapted the roles and permissions using the RBAC GUI that admin has access to on one site and want to include these in my next migration. How do I transfer these roles and permissions from one site to another?**

The quickest method will be to simply create a **SQL export data file** for the **auth_assignment**, **auth_item**, and **auth_item_child tables** from your phpMyadmin. After you have imported them using phpMyadmin you can then assign these roles to the users that signup or that you as admin internally signup **using the RBAC GUI User Management** The auth_assignment table will then be populated with the **roles** and respective **user_id**. You will not need to include these values in any migration file since these values only pertain to the db database and not to the subsequent databases for other companies sharing the site ie. db1, db2.

**An employee of company/division/unit 5 must have additional rights?** 
Contact the administrator having admin rights for this website. The manager of company 5 will **NOT** be able to set these rights. 

**How do we setup our site so that individuals who sign up will be charged a paypal subscription?**

You will need to configure the **frontend/modules/subscription/components/Configpaypal.php** file to **'live'** details. If you are not choosing to offer a subscription but you still want to keep this option open, you will need to get **'sandbox'** (experimental) details from Paypal.

**I do not want any subscription feature on my site?**

1. Replace the frontend/config/main.php with **no_subscription_main.php**. Change the name to main.php.
1. Replace the web/index.php file with **web/no_subscription_index.php**. Change the name to index.php.
1. Replace the frontend/views/layouts/main.php with **no_subscription_main.php**. Change the name to main.php.
    
**I do not want individuals who signup on behalf of their company/division/unit to be charged a paypal subscription although I still want to retain the subscription feature. How do I make sure they do not have to subscribe to our website?**

Ensure that the permission **'Subscription Free Privilege'** is assigned on a higher level. So for Mdb roles a.k.a manager roles that inherit the stronger 'support' role make sure that the 'support' role has the 'Subscription Free Privilege' permission. This will ensure that all managers who have been assigned the relevant mdb role eg. Mdb1 for database 1, will get a Subscription Free Privilege since their role eg. Mdb1 is linked to the higher 'support' role.

**Can I import houses into the system?**

Yes there is an import facility although you will probably find it quicker to use the **Quick Build tool** depending on the number of houses you will use per street. The import facility requires you to download a template file and then to upload it once completed. The Import Houses tool is located at the bottom of the **Database** menu using Admin rights.

**Javascript is used to link the grids to the Yii2 Controllers. Where can I find this file?** scripts2.js is located under the Frontend /Assets/App folder.

**How does House2house incorporate the security features of Yii2 according to https://www.yiiframework.com/doc/guide/2.0/en/security-overview ?**

   1. **Authentication:** H2H uses sjaakp/pluto's yii\web\IdentityInterface.

   1. **Authorization:** All data-input is regulated by the Model View Controller regime providing Access Control Filters to all data-input.
The database has been normalized ensuring efficiency and appropriate integrity constraint provisions filter through to the Controllers.
The package adopts a very cautious approach of **NO ACTION** where relations between tables exist ensuring a **last-in-first-out (LIFO) methodology** and also ensuring the safety of the data provided when attempts are made by unauthorized users to perform delete actions.  

   1. **Working with passwords:** All login passwords must contain an uppercase, lowercase, and one digit mix.

   1. **Cryptography:** The sjaakp/pluto/models/User  uses the yii\web\IdentityInterface. Also it uses the following function:
   
          public function encryptPassword($attribute, $params)
          {
          $this->password_hash = Yii::$app->security->generatePasswordHash($this->$attribute);
          } 
      
      This function incorporates the **Blowfish hash algorithm** by default through Yii2.  The **$cost** parameter can be added to the above GeneratePasswordHash parameters.  
      
      For further reading  https://www.yiiframework.com/doc/api/2.0/yii-base-security#generatePasswordHash()-detail
   
   1. **Views security:** Cross Site Request Forgery (CSRF) built into frontend/config/main.php.

   1. **Data Protection and Privacy:** It is the responsibility of the administrator to ensure data is backed up regularly and to ensure that users signing up are familiar with the Privacy and Data Protection Policy.  

   1. **Security best practices:** Active Record uses prepared statements to avoid SQL injections.  

**I appreciate the security features that Yii2 offers but how do I ensure that only users that I have signed up can access the site?**

The sjaakp/pluto login can be set to **'fence mode'** in frontend/config/main.php. This will restrict external users from accessing the site. Fence mode can be set to true. Currently it is set to **!'User can Login but not Signup - Fence Mode On'**. All users, including Admin, inherit the **Fencemode role**. Take the **'User can Login but not Signup - Fence Mode On'** permission away from the Fencemode role if you are intending to allow guests to your site.

**Installation Steps for Files:**

1. **Clone** or **unzip** the folders into your C:\wamp64\www\my_folder_name\web  directory making sure that your composer.json is in the web folder ie. C:\wamp64\www\my_folder_name\web\composer.json. Composer will create the vendor folder for you if it does not exist.
1. Install Composer from **composer.org** 
1. On your local desktop using CLI (Command Line Interface) or windows command prompt, change your directory to C:\wamp64\www\yours\web which is where your composer.json and the vendor folder is located.
1. Run the following command from the command prompt: composer update. 

       C:\wamp64\www\<my_folder_name>\web>composer update

This will install the dependencies that are under 'require' under composer.json into the vendor folder.
1. Make sure that your frontend/config/main.php is properly configured especially the mailer component so that you can register your first user which will inherit admin rights. Ensure that libra - fencemode is off to be able to register.
1. Make sure that your frontend/modules/subscriptions/components/configpaypal.php is properly configured when you opt to use subscriptions although by default this will be ignored as long as you keep the **Subscription Free Privilege permission** assigned to the respective Udb role or Mdb role relevant to the database or, if you elect not to have it linked to these roles, the higher 'more universal' roles of 'employee' and 'support' respectively.
1. Upload these folders to the web/public-html folder using ftp (File Transfer Protocol) upload software eg. **filezilla** to your host eg. one.com, godaddy.com
1. Ensure that your databases on your host correspond to the number of databases in the four files mentioned below i,ii,iii,iv.

**Installation Steps for admin database - 'db' ie. not subsequent manager databases 'db1','db2'** 

1. Create and Name your **databases** manually through phpMyadmin on your WAMP or LAMP **matching** the details in **common/config/main-local.php.** You will rename your databases in this main-local.php file according to the autogenerated schema given to you by your host most likely and so will have to change it from the default h2h_db as mentioned in the **common**/config/main-local.php **to** eg. your_domain_co_uk_db.

1. **Check your 'path' environment settings, under Windows 10:**

       Search...Environment Settings...Advanced...Environment Variables...User variables...PATH...edit, for 'path'.
   
1. **Install the sjaakp/pluto migration, frontend/migrations, paypal module migration, and auth migration with the following command at your command prompt:** 
   
       php yii migrate-db-namespaced  (linux eg. putty) 
       yii migrate-db-namespaced      (if a defined php path eg. c:\wamp64\bin\php\php7.4.4 in *environment settings* under windows)
       
Regarding the above Yii migrate command, it will look at the db component contained in **common**/config/main-local.php and install the migrations to the  named database eg. **h2h_db** on your **localhost** or to **your_domain_co_uk_db** on your **host** using the commands which have been constructed in the **ControllerMap** in **console**/config/main.php eg. the command  **'migrate-db-namespaced'.**

This command will use the migration paths contained in **console**/config/main.php. There are currently 4 paths sjaakp/pluto,   frontend/migrations, paypal, and auth. Although the migration generator Gii created these migrations from tables, they have been namespaced ("pathed") ie. the word **Namespace** has been manually inserted at the top of the migration file generated and placed in the relevant folder on that **path/namespace** after Gii generated the migration file from the developer's table. 

**Installation Steps for subsequent manager databases 'db1','db2' and not admin database 'db'** 

1. Linux via eg. Putty for your **subsequent** databases: 

       php yii migrate-db1
       
1. If on your localhost on windows: 

       yii migrate-db1

1. Repeat this process up until the 10th database if you intend to share your site to up to 10 companies. As you have probably noticed all 10 commands are contained in **console**/config/main.php under the controllerMap.

**Installation Steps if wanting more than 10 independent sharers.** 

1. If you have more than 10 companies/divisions/units that you as administrator are wanting to signup you will need to edit the following three files:

    1. *frontend/**components**/Utilities::userLogin_set_database(). Include additional databases here using the naming convention eg. db1, db2*
    1. ***common**/config/main-local.php - Follow the naming convention eg. db1, db2*
    1. ***console**/config/main.php - edit and replicate the commands in the **controllerMap** for migrations over and above the 10 databases.*

1. In order to sign up your first user, you will have to make sure that **'fencemode'** is switched off. The fencemode setting under frontend/config/main.php can be set to a **boolean** or to a **string**. It is currently set to a string. By default the Fence Mode role has not been assigned the **'User can Login but not Signup - Fence Mode On'** permission. So the first guest can signup and acquire the admin role. 

**frontend/config/main.php**

    'modules' => [
      'libra' => [
        'class' => 'sjaakp\pluto\Module',
        'fenceMode' => true,
        
 and that your mailer component under frontend\config\main.php is correctly set so that your user can respond to your email. Testing on your **localhost** and wampserver, the port will normally be **port 25** since you will be going through your service provider, such as BT. 
 
 **Troubleshooting**
 
 Besides the issues section for this repository, in order to debug your code, defaults have been set in the following files:
    web/index.php
    
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
    
On completion ensure the following:

    defined('YII_DEBUG') or define('YII_DEBUG', false);
    defined('YII_ENV') or define('YII_ENV', 'prod');

**Creating migration files on your local machine so that you can use the 'migrate' command in future. You will use pre-existing auth tables that you installed by means of the sql files. (If you want to install the auth tables using 'migrate' skip this section.**)

Occasionally you will need to create migration files in order to simplify a process instead of importing a **sql** file such as the included console/migrations/**auth**/auth.sql or running sql commands from the phpMyadmin SQL section. 

For instance create migrations for: 

    auth_assignment - the critical assignment of a user_id from the user table to a pre-built role. After the user table is filled after signup, this table will be filled second after the installation automatically with first user_id and the admin role.

    auth_item - permissions
    auth_item_child - roles with permissions
    auth_rule - conditions
    
 Under frontend/config/main-local.php the following default code is present:
 
    if (YII_DEBUG) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' =>['127.0.0.1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' =>['127.0.0.1'],
    ];
    }

Keep the localhost ip address [127.0.0.1]. Run the following command from your browser assuming you have setup your wampserver:

    mylocalhostname.myhost/gii/

Assuming that you have already run the **auth.sql** under your phpAdmin, you should already have the auth tables in your database so select them and generate your migration. 

Make sure that you put the **Namespace** command at the top of each migration php file once the migration is completed. After you have put this migration in the console/migrations/auth folder if necessary alter the controllerMap.  

**Installation of roles and permissions by migrations**

To install the above auth tables through a migration instead of through the auth.sql file, the namespace or path has now been included in the  **console/config/main.php controllerMap** command migrate-db-namespaced. The migration files have been generated from the auth.sql files. The auth migrations necessary for filling the rbac auth tables are in:

    console/migrations/auth

**Why are the auth tables important?** 

They are the soul of RBAC (Role Based Access Control). After the administrator has given the user a role eg. mdb2 for manager, the auth_assignment table indicates the admin's decision that has occurred between the user table and the auth_item a.k.a permissions table with its buddy the auth_item_child table or 'role and permissions table' and the result ... in the auth_assignment table is a lonely user_id digit (that has so much significance in his home town the 'user table') with its companion and close associate, a simple role with all its potential. 

So the **yii migrate-db-namespaced** command will create a bare-bones auth_assignment table, desperately hungry to track admin decisions, and a powerful duo, the auth_item and auth_item_child, policing partners, ready to flex their roles and administer 'allowed to' and 'denied' permissions. The auth_rule table is for finer conditions. This command also creates the sjaakp/pluto user table and the works tables, and also the paypal tables which, although not possibly used, are important for the package to run.

 **Installing roles and permissions using SQL on your localhost/host**
 
Whilst in the db database, copy the sql  commands in console/migrations/auth and run them in your phpMyadmin SQL section. 

**Allowing a manager to do their own 'Works' installation**

All managers with Mdb roles can do their own migration of the frontend database if you give them the **Migrate Works Database** permission. This permission is linked to the installer module and can be accessed by typing 'installer/installer' in the browser. By default nobody has this permission for security reasons. The administrator will have to access individual databases one at a time in order to use the installer. The administrator will not need it for database 'db' because installation would have been done by the console/command prompt/putty etc in order to get the RBAC GUI running the migrate-db-namespaced command. So the installer is intended for managers and not administrators so that they can install their own databases. 

**Allowing a manager to do their own 'Works' backup**

The Works tables are all those tables given to managers of each individual database. Managers do not have access to database db. All managers with Mdb roles can do their own backup of their separate frontend database/division/unit eg. db1 if you give the **Backup database** permission to the eg. Mdb1 role for the Manager of db1.  The backup module can be accessed by typing 'backuper/backuper' in the browser or by clicking on the Backup Database button. Only those who inherit the 'admin' or 'support' role will have access to the software via the controller and the frontend/views/layouts/main.php. 

The **admin** will have to give the **'Backup Database'** permission to the **role** admin in order to backup their mySql db database.

The backup module makes use of the **very popular ifsnop mySql** module. See https://packagist.org/packages/ifsnop/mysqldump-php.

**How do I setup the Google Translate section of this package?**
1. You need to have the Google Translate permission assigned to you by your Administrator.
1. Wampserver: Ensure that your cacert.pem file that you downloaded here "http://curl.haxx.se/ca/cacert.pem" is installed under your bin/php/php7.4.1 directory and that you have set your php.ini setting: wampserver...php...php.ini.

        [curl]
        curl.cainfo ="C:/wamp64/bin/php/php7.4.4/cacert.pem"

1. Get a Google Service Account here. "https://console.cloud.google.com/apis/credentials/serviceaccountkey".
1. Download the Json file (Not the P12) and save it to your local drive. 
1. Include the path of this file into your Company...Settings...Google Translate Json Filename and Path including forward slashes and double quotes.

Every individual manager shares the db database. Each manager builds the db database by assisting in translating the source_message table into the message table. The source_message table that you created with the

        yii message/extract @frontend/messages/template.php

is populated with English when you work with the Google Translate function. The package uses the Company...Settings...Language setting that the Manager elects to use if set. Otherwise it will use the default English.



 



