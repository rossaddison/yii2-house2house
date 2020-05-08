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
