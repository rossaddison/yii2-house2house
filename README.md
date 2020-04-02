**yii2-house2house**

**House to House Management Software eg. Cleaning Services, Delivery Services, Mobile Hairdressing**

**Installation Steps for Files:** 
1. Clone or unzip the folders into your web directory making sure that your composer.json and empty vendor folder are on the same level.
1. Install Composer from composer.org 
1. On your local desktop using CLI (Command Line Interface) or windows command prompt, change your directory to C:\wamp64\www\yours\web which is where your composer.json
        and the vendor folder is located.
1. Run the following command: composer update. eg. C:\wamp64\www\<my_folder_name>\web>composer update   . 
   This will install the dependencies that are under 'require' under composer.json into the vendor folder.
1. Upload these folders using ftp (File Transfer Protocol) upload software eg. filezilla to your host eg. one.com, godaddy.com
1. Ensure that your databases on your host correspond to the number of databases in the three files mentioned below.

**Installation Steps for Databases using Yii2's migration tool and the folder frontend\migrations** 
1. Linux via eg. Putty for your **main** database called 'db':  php yii migrate/fresh --db=**db** --interactive=0 
1. Linux via eg. Putty for your **subsequent** databases: php yii migrate/fresh --db=**db1** --interactive=0
1. Repeat this process up until the 10th database.
1. If you have more than 10 companies/divisions/units that you as administrator are wanting to signup you will need to edit the following three files:

1. frontend/config/main.php - Adjust the backup module to include more than one database. Keep to the naming convention eg. db1, db2 
1. frontend/components/Utilities::userLogin_set_database(). Include additional databases here using the naming convention eg. db1, db2
1. common/config/main-local.php - Follow the naming convention eg. db1, db2






