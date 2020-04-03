**yii2-house2house**

**House to House Management Software eg. Cleaning Services, Delivery Services, Mobile Hairdressing**

**Frequently Asked Questions ?**

**How do I create a Daily Clean?**
Go to Daily Clean and click the create button. A Daily Clean will appear on the Grid. Setup your Postcodes, Streets, and Houses. Under Houses, select your houses by means of ticking them in the grid and copy them to the selected Daily Clean.

**What should I put under 'job code' in the Daily Clean?**
eg. Bridgestone and Whitley run.
 
You should preferably not include a number since this run is going to occur at least once a month. 
Once the houses have been copied from 'House' how do I replicate the Daily Clean for a future clean? 
Tick the relevant Daily Clean and then tick on the Ticked (copy) button to get your choices.  

**How do I get a balance of the amount that my customer owes me?** 
If you go to houses and look at the far right side of the grid you will see the column Debt represented by a set of scales. Click on this icon and you will get a break down of the overall debt. You will have the ability to go to the individual debt. SOD stands for Sales Order Detail and represents a single house or clean on the Daily Clean (Sales Order).

**I have several cleans in one area but do not want to enter them individually as this is time consuming. How can I speed the process up?**
Use the Quick Build facility situated between Street and Houses. Under the specific street, set the sequence or sort order to 500, and simply move the house numbers on the left to the right. Set the sequence number back to the default of 99 once you have completed your build.

**What are some other special features of House 2 House?**
The Instructions section allows you to specify particular things that are important for the clean. These are available in a dropdown box for the specific house listed under the Daily Clean accessed by clicking on 'cleans'.

**Gocardless payment solution**
Each  Company/Division/Unit setup can set their **Gocardless access token.** This will enable them to send a Direct Debit Mandate by email to their customers requesting them initially to give their approval to take payment(s) from their account. When a payment is due you send them a recurring or one-off variable payment direct debit  amount which they must authorise within a period prior to the amount coming off their account. Each company will have to setup their SMTP settings for their Mailserver in order for this to function correctly. These settings are available under Company. These mailserver settings will be specific to the company. If a company has not set their mailserver settings then the default mailserver settings under frontend/config/main.php - mailer will apply. 

Once setup you will be able to use the two Gocardless related buttons under House. Tick the relevant house and click on either one of the following buttons:

1. 'Email Direct Debit Link to Customer for their Approval (tick)'  
1. 'Email Payment Request to Customer (tick)'

**Twilio Text Messaging**
Multiple text message reminders can be sent by Twilio. You can set this under Company. You will have to purchase a Twilio telephone number for this purpose. The Twilio telephone number is personal to your company  and is the channel that is used to send text messages.
Under the Daily Clean, if you click on the + sign, the screen will expand and you will be able to see all the cleans for that day. You will be able to mark as paid those that have paid you, and if you are lost you will be able to click on the address button to take you to Google maps.  If the postcode is not that descriptive you can define a street by using Googles latitude and longitude coordinates for the beginning and end of the street.

**How do I find my turnover or costs?** 
Your turnover can be determined under Daily Clean.  Your expenditure can be determined under Costs.

**How do I change the sequence or order of my streets to clean?**
Give the street an order number. Each order number should be unique.  The Daily Clean will be sorted according to the order of the streets if you have more than one street under the Daily Clean. 

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






