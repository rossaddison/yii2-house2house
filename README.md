**yii2-house2house**

**Licence**

Copyright 2020  House2House  [BSD-3-Clause](/licence.md)

**House to House Management Software eg. Cleaning Services, Delivery Services**

[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](https://www.yiiframework.com/) [![License](https://img.shields.io/badge/License-BSD%203--Clause-blue.svg)](https://opensource.org/licenses/BSD-3-Clause) ![stable](https://img.shields.io/static/v1?label=stable&message=1.0.1&color=9cf)

**Composer**

    "rossaddison\yii2-house2house": "*", 

**Frequently Asked Questions ?**

[**What has this software been used for mostly in the past?**](/md/faq/mostly.md)

[**Demo?**](/md/faq/demo.md)

[**What is the structure of the database?** ](/md/faq/structure.md)

[**Can I use this package on a mobile phone?**](/md/faq/mobile.md)

[**Is the package available in more than one language?**](/md/faq/language.md)

[**How can the package be adapted?**](/md/faq/adapted.md)

[**Where do I setup the Swiftmailer SMTP connection settings of my host?**](/md/faq/swiftmailer.md)

[**Where do individual companies signing up setup their SMTP settings?**](/md/faq/smtp.md)

[**Php version?**](/md/faq/php.md)

[**How to use the package?**](/md/faq/package.md)

[**I am a sole trader with one employee and do not intend to use all 10 databases. How do I setup my users after installation?**](/md/faq/soletrader.md)

[**I have adapted the roles and permissions using the RBAC GUI that admin has access to on one site and want to include these in my next migration. How do I transfer these roles and permissions from one site to another?**](/md/faq/transfer.md)

[**Paypal Subscription Feature Know How?**](/md/faq/subscription.md)

**Javascript is used to link the grids to the Yii2 Controllers. Where can I find this file?** scripts2.js is located under the Frontend /Assets/App folder.

[**Security Features Know How?**](/md/faq/security.md)

[**Detailed Installation Steps Know How?**]


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



 



