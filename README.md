
This PHP package is a SDK for OVH SMS APIs. That's the easiest way to use OVH SMS in your PHP applications.

```php
<?php
/**
 * # Instantiate. Visit https://api.ovh.com/createToken/index.cgi?GET=/sms/*&PUT=/sms/*&DELETE=/sms/*&POST=/sms/*
 * to get your credentials
 */
require __DIR__ . '/vendor/autoload.php';
use \Ovh\Sms\SmsApi;

$Sms = new SmsApi( $applicationKey,
                $applicationSecret,
                $endpoint,
                $consumer_key);
print_r($Sms->getAccounts());
?>
```

Quickstart
----------

To download this SDK and integrate it inside your PHP application, you can use [Composer](https://getcomposer.org).

Add the repository in your **composer.json** file or, if you don't already have 
this file, create it at the root of your project with this content:

```json
{
    "name": "Example Application",
    "description": "This is an example of OVH SMS APIs SDK usage",
    "require": {
        "ovh/php-ovh-sms": "dev-master"
    }
}

```

Then, you can install OVH SMS APIs SDK and dependencies with:

    php composer.phar install

This will install ``ovh/php-ovh-sms`` to ``./vendor``, along with other dependencies
including ``autoload.php``.

How to send a message with this SDK?
-----------------------

```php
<?php
require __DIR__ . '/vendor/autoload.php';
use \Ovh\Sms\SmsApi;

// Informations about your application
$applicationKey = "your_app_key";
$applicationSecret = "your_app_secret";
$consumerKey = "your_consumer_key";
$endpoint = 'ovh-eu';

// Init SmsApi object
$Sms = new SmsApi( $applicationKey, $applicationSecret, $endpoint, $consumerKey );

// Get available SMS accounts
$accounts = $Sms->getAccounts();

// Set the account you will use
$Sms->setAccount($accounts[0]);

// Create a new message
$Message = $Sms->createMessage(true);
$Message->addReceiver("+33601020304");
$Message->setIsMarketing(false);

// Plan to send it in the future
$Message->setDeliveryDate(new DateTime("2018-02-25 18:40:00"));
$Message->send("Hello world!");

// Get all planned messages
$plannedMessages = $Sms->getPlannedMessages();

// Delete all planned messages
foreach ($plannedMessages as $planned) {
    $planned->delete();
}

...
?>
```

## Hacking

 * Contribute: https://github.com/ovh/php-ovh-sms
 * Report bugs: https://github.com/ovh/php-ovh-sms/issues

## Licence

Copyright (c) 2013-2016, OVH SAS.
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:

  * Redistributions of source code must retain the above copyright
    notice, this list of conditions and the following disclaimer.
  * Redistributions in binary form must reproduce the above copyright
    notice, this list of conditions and the following disclaimer in the
    documentation and/or other materials provided with the distribution.
  * Neither the name of OVH SAS nor the
    names of its contributors may be used to endorse or promote products
    derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY OVH SAS AND CONTRIBUTORS ``AS IS'' AND ANY
EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL OVH SAS AND CONTRIBUTORS BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
