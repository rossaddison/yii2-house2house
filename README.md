**yii2-house2house**

**House to House Management Software eg. Cleaning Services, Delivery Services, Mobile Hairdressing**

**Installation Steps for Files:** 
1. Clone or unzip the folders into your web directory making sure that your composer.json and empty vendor folder are on the same level.
1. Install Composer from composer.org 
1. Using CLI (Command Line Interface) or windows command prompt, change your directory to C:\wamp64\www\yours\web which is where your composer.json
        and the vendor folder is located.
1. Run the following command: composer update. eg. C:\wamp64\www\<my_folder_name>\web>composer update
1. This will install the dependencies that are under 'require' under composer.json into the vendor folder.

**Installation Steps for Databases:** 
1. Linux via Putty for your main database:  php yii migrate/fresh --db=db --interactive=0 
1. Linux via Putty for your subsequent databases: php yii migrate/fresh --db=**db1** --interactive=0
1. Linux via Putty for your subsequent databases: php yii migrate/fresh --db=**db2** --interactive=0

