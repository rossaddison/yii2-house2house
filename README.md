**yii2-house2house**

**House to House Management Software eg. Cleaning Services, Delivery Services, Mobile Hairdressing, Home Care - stock delivery, Plant delivery**

**Frequently Asked Questions ?**

**What has this software been used for mostly in the past?**
It has been mainly structured for window cleaning in the UK but can be modified for other services. Data protection has been incorporated in the package so most fields under House are not required. Refer to the suggested Privacy and Data Protection Policy under the /site/privacypolicy url when the site is hosted or under frontend/views/site/privacypolicy.php. 

**How can the package be adapted?**
The package can be adapted by modifying the Instruction facility which will appear as a dropdown in the Daily Cleans list of houses. Each house will be associated with a specific code. eg. FBS which stands for Front Back and Sides. Also you can alter the attribute values under frontend/models to reflect a more personal feel to your business. 

*By default the package is structured for shared hosting with a subscription through paypal*. 
So multiple companies/divisions/units/wards can signup to your site and share the software with or without a subscription service. The subscription service is enabled by default. However all users inherit the Free Subscription Privilege permission from either their Udb role for employees or their Mdb role for managers. All Udb roles fall under the employee role. All Mdb roles fall under the support role. 

Each database works independently of all the others sharing the frontend. How is this accomplished? Each model has the userDb() function which uses the database assigned at login by accessing the frontend/components/Utiilites::userLogin_set_database. How does the frontend know which database to use for the particular user? When the user registers, the amininstrator is responsible for assigning a role to the user. Each database has 2 roles. eg. Mdb1 and Udb1 which both have a permission eg. Access db1 assigned to it. So when the user is assigned a role eg. Udb1, the user will be able to access Udb1. The administrator is responsible for assigning the role to the user and to making the connection 'active'. This is accomplished through the RBAC GUI. This procedure could be automated without a RBAC GUI as a future development. 

The RBAC GUI user interface accessible only to the first user signed up (who inherits the admin role) is ideal for adjusting these rights across the various companies or divisions. One user is responsible for assigning rights to all users across all the companies/divisions that have signed up.  

**How do I find my turnover or costs?** 
Your turnover can be determined under Daily Clean.  Your expenditure can be determined under Costs. Since this is a cash collection software package the amount is merely incremental and has no connection to an accounting package.  The paid amount could be modified in the frontend/models to facilitate quantity delivery if keeping stock of what has been delivered to a household particularly in the case of the **coronavirus pandemic** which is occuring as I write this.

**What php version should my shared hosting provider eg. one.com be able to offer?** php 7.4.0 and above as at 3rd April 2020. The composer.json that has been created has been fine tuned to a stable release. The composer.json can be replaced with composer_dev_version.json for development purposes.

**Is there any demo version available?** You will be able to login with manager rights at https://roundrunner.co.uk/libra/login. You will not have access to the Role Based Access Control Graphical User Interface available only to the first signed in user ie. admin.
Use username: demo, password: Demo1234. All data will be deleted upon exiting the software. This is built into frontend/config/main.php. Bootstrap 4 - buttons, mobile layout, font adjuster - is used for the graphical interface.

**How do I create a Daily Clean?**
Go to Daily Clean and click the create button. A Daily Clean will appear on the Grid. Setup your Postcodes, Streets, and Houses. Under Houses, select your houses by means of ticking them in the grid and copying them to the selected Daily Clean. Postcodes and Streets have to be manually entered. An optional SQL update in the future is proposed as opposed to a migration containing all the UK's postcodes and streets. 

**What should I put under 'job code' in the Daily Clean?**
eg. Bridgestone and Whitley run.
 
You should preferably not include a number since this run is going to occur at least once a month. 
Once the houses have been copied from 'House' how do I replicate the Daily Clean for a future clean? 
Tick the relevant Daily Clean and then tick on the Ticked (copy) button to get your choices.  

**How do I get a balance of the amount that my customer owes me?** 
If you go to houses and look at the far right side of the grid you will see the column Debt represented by a set of scales. Click on this icon and you will get a break down of the overall debt. You will have the ability to go to the individual debt. SOD stands for Sales Order Detail and represents a single house or clean on the Daily Clean (Sales Order).

**I have several cleans in one area but do not want to enter them individually as this is time consuming. How can I speed the process up?**
Use the Quick Build facility situated between Street and Houses. Under the specific street, set the sequence or sort order to 500, and simply move the house numbers on the left to the right. Set the sequence number back to the default of 99 once you have completed your build.

**Gocardless payment solution**
Each  Company/Division/Unit setup can set their **Gocardless access token.** This will enable them to send a Direct Debit Mandate by email to their customers requesting them initially to give their approval to take payment(s) from their account. When a payment is due you send them a recurring or one-off variable payment direct debit  amount which they must authorise within a period prior to the amount coming off their account. Each company will have to setup their SMTP settings for their Mailserver in order for this to function correctly. These settings are available under Company. These mailserver settings will be specific to the company. If a company has not set their mailserver settings then the default mailserver settings under frontend/config/main.php - mailer will apply. 

Once setup you will be able to use the two Gocardless related buttons under House. Tick the relevant house and click on either one of the following buttons:

1. 'Email Direct Debit Link to Customer for their Approval (tick)'  
1. 'Email Payment Request to Customer (tick)'

Email templates have been built into the controllers and as a future endeavour will be created separately.

**Twilio Text Messaging**
Multiple text message reminders can be sent by Twilio. You can set this under Company. You will have to purchase a Twilio telephone number for this purpose. The Twilio telephone number is personal to your company  and is the channel that is used to send text messages.
Under the Daily Clean, if you click on the + sign, the screen will expand and you will be able to see all the cleans for that day. You will be able to mark as paid those that have paid you, and if you are lost you will be able to click on the address button to take you to Google maps.  If the postcode is not that descriptive you can define a street by using Googles latitude and longitude coordinates for the beginning and end of the street.

**Alternative text messaging**
If your householder has consented to using their mobile number you can list this under Houses and you will have access to this under the Daily Cleans. Simply press their mobile number while online and Android will present its options. Your company will not be able to use the multiple text messaging that is available through Twilio.

**How do I change the sequence or order of my streets to clean?**
Give the street an order number. Each order number should be unique.  The Daily Clean will be sorted according to the order of the streets if you have more than one street under the Daily Clean. 

**I am a sole trader with one employee. How do I setup my users after installation?**
The first user to signup is automatically assigned the administrator or 'admin' role. This is as a result of employing sjaakp/pluto security login. The admin role by default accesses the default db database because it is assigned the 'Access db' permission.  The subscription module works via the db database so the first user to signup should use the db database. Setup a Udb role similar to Udb1 for your employee with appropriate permissions. Signup your employee and assign the Udb0 role to them. Make sure you have assigned the 'Access db' permission to this user. You will not need to setup the Mdb0 role and assign this to your user once signed in because this role by default carries all the functions besides being able to setup roles and permissions. You will be limiting this user to only being able to see what has to be cleaned for the day. Access the RBAC GUI and you will see all the Mdb and Udb roles for this purpose.

Any one of the 10 databases that you have setup through your phpMyadmin could be used for your specific company. So you could simply use db for the administration of the RBAC and select any one of the databases from db1 to db10 for your company itself.

The Mdb# role is used for the manager of a specific company/division and the Udb# role is used for employees.

All Mdb roles are linked to the 'support' role so change the support role 'makeup' if you want this to be applicable to all
managers (Mdb0 to 10) under each separate company under each separate database using the software. ie. all users that are managers. Caution should be exercised here since a change here applies universally to all the companies/divisions that are using the software. 

All Udb roles are linked to the 'employee' role so change the employee role 'makeup' if you want this to be applicable to all
employees (Udb0 to 10) under each separate company under each separate database using this software. ie. all users that are employees. Caution should be exercised here since a change here applies universally to all the companies/divisions that are using the software.

There are two permissions called Manage Basic and Manage Admin. Mdb roles have both the Manage Basic and the Manage Admin permission. Udb roles have only the Manage Basic permission. These two permissions are used in frontend/views/layouts/main.php which is the main menu interface.

**I have adapted the roles and permissions using the RBAC GUI that admin has access to on one site and want to include these in my next migration. How do I transfer these roles and permissions from one site to another?**
The quickest method will be to simply create a SQL export data file for the auth_item, and auth_item_child tables from your phpMyadmin. After you have imported them using phpMyadmin you can then assign these roles to the users that signup or that you as admin internally signup **using the RBAC GUI User Management** The auth_assignment table will then be populated with the roles and respective user_id. You will not need to include these values in any migration file since these values only pertain to the db database and not to the subsequent databases for other companies sharing the site ie. db1, db2.

**An employee of company/division/unit 5 must have additional rights?** Contact the administrator having admin rights for this website. The manager of company 5 will NOT be able to set these rights. 

**How do we setup our site so that individuals who sign up will be charged a paypal subscription?**
You will need to configure the frontend/modules/subscription/components/Configpaypal.php file to 'live' details. If you are not choosing to offer a subscription but you still want to keep this option open, you will need to get 'sandbox' (experimental) details from Paypal.

**I do not want any subscription feature on my site?** 
1. Replace the frontend/config/main.php with no_subscription_main.php 
1. Replace the web/index.php file with web/no_subscription_index.php
1. Replace the frontend/views/layouts/main.php with no_subscription_main.php
    
**I do not want individuals who signup on behalf of their company/division/unit to be charged a paypal subscription although I still want to retain the subscription feature. How do I make sure they do not have to subscribe to our website?** Ensure that the permission 'Subscription Free Privilege' is assigned on a higher level. So for Mdb roles a.k.a manager roles that inherit the stronger 'support' role make sure that the 'support' role has the 'Subscription Free Privilege' permission. This will ensure that all managers who have been assigned the relevant mdb role eg. Mdb1 for database 1, will get a Subscription Free Privilege since their role eg. Mdb1 is linked to the higher 'support' role.

**Can I import houses into the system?** Yes there is an import facility although you will probably find it quicker to use the Quick Build tool depending on the number of houses you will use per street. The import facility requires you to download a template file and then to upload it once completed. The Import Houses tool is located at the bottom of the Secure menu using Admin rights.

**How does House2house incorporate the security features of Yii2 according to https://www.yiiframework.com/doc/guide/2.0/en/security-overview ?**

**Authentication:** H2H uses sjaakp/pluto's yii\web\IdentityInterface.

**Authorization:** All data-input is regulated by the Model View Controller regime providing Access Control Filters to all data-input.
The database has been normalized ensuring efficiency and appropriate integrity constraint provisions filter through to the Controllers.
The package adopts a very cautious approach of NO ACTION where relations between tables exist ensuring a last-in-first-out (LIFO) methodology and also ensuring the safety of the data provided when attempts are made by unauthorized users to perform delete actions.  

**Working with passwords:** All login passwords must contain an uppercase, lowercase, and one digit mix.

**Cryptography:** Yii2 is using an advanced cypher.

**Views security:** Cross Site Request Forgery (CSRF) built into frontend/config/main.php.

**Data Protection and Privacy:** It is the responsibility of the administrator to ensure data is backed up regularly and to ensure that users signing up are familiar with the Privacy and Data Protection Policy. 

**Security best practices:** Active Record uses prepared statements to avoid SQL injections.  

**I appreciate the security features that Yii2 offers but how do I ensure that only users that I have signed up can access the site?**
The sjaakp/pluto login can be set to 'fence mode' in frontend/config/main.php. This will restrict external users from accessing the site. Those users on mobile will have to have access to broadband though.

**Installation Steps for Files:** 
1. Clone or unzip the folders into your C:\wamp64\www\<my_folder_name>\web>  directory making sure that your composer.json and empty vendor folder are on the same level.
1. Install Composer from composer.org 
1. On your local desktop using CLI (Command Line Interface) or windows command prompt, change your directory to C:\wamp64\www\yours\web which is where your composer.json and the vendor folder is located.
1. Run the following command from the command prompt: composer update. eg. C:\wamp64\www\<my_folder_name>\web>composer update   . 
   This will install the dependencies that are under 'require' under composer.json into the vendor folder.
1. Make sure that your frontend/config/main.php is properly configured.
1. Make sure that your frontend/modules/subscriptions/components/configpaypal.php is properly configured.
1. Upload these folders to the web/public-html folder using ftp (File Transfer Protocol) upload software eg. filezilla to your host eg. one.com, godaddy.com
1. Ensure that your databases on your host correspond to the number of databases in the three files mentioned below i,ii,iii.

**Installation Steps for Databases using Yii2's migration tool and the folder frontend\migrations** 
1. Create your databases manually through phpMyadmin on your WAMP or LAMP matching the details in common/config/main-local.php. You will rename your databases in the main-local.php file according to the autogenerated schema given to you by your host most likely and so will have to change it from the default h2h_db as mentioned in the common/config/main-local.php to eg. your_domain_co_uk_db.
1. On your host's (eg. One.com) Linux via eg. Putty - for your **main** database component called 'db' : php yii migrate/fresh --db=**db**  . The migrate command will look at the db component contained in **common**/config/main-local.php and install the migrations to the named database eg. h2h_db on your localhost or to your_domain_co_uk_db on your host.

This command will use the migration paths contained in **console**\config\main.php. There are currently two paths sjaakp/pluto frontend/migrations. So this is where most of the migrations are currently sitting. Although the migration generator Gii created these migrations from tables, they have been namespaced ("pathed") ie. the word Namespace has been manually inserted at the top of the migration file generated and placed in the relevant folder on that path/namespace. 

The backup module ellera does not contain a namespace therefore we have to run this separately. So in addition to the above command, run the following commmand as well php yii migrate/up --migrationPath=@vendor/ellera/yii2-backup/src/migrations asd mentioned in the extension.

1. Linux via eg. Putty for your **subsequent** databases: php yii migrate/fresh --db=**db1** --interactive=0
1. Repeat this process up until the 10th database if you intend to share your site to up to 10 companies.
1. If you have more than 10 companies/divisions/units that you as administrator are wanting to signup you will need to edit the following three files:

    1. frontend/config/main.php - Adjust the backup module to include more than one database. Keep to the naming convention eg. db1, db2 
    1. frontend/components/Utilities::userLogin_set_database(). Include additional databases here using the naming convention eg. db1, db2
    1. common/config/main-local.php - Follow the naming convention eg. db1, db2
    
 **Troubleshooting**
Refer to the issues section for this repository.






