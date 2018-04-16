# Custom Fee for Magento2

This extension allows you to add extra charge to customer based on fixed amount or percentage amount such as insurance fee,delivery fee at checkout.

# Support

This plugin supports Magento 2 up to version 2.2.2. It might work on more recent versions, but we cannot make any guarantees.

# Installation

This module installed via Composer.

1. Go to Magento 2 root folder.

2. Enter following commands to install module:

   composer require dmn112/customfee
   
   Wait while dependencies are updated.
  
3. Enter following commands to enable module:

   php bin/magento module:enable Dmn112_Customfee<br>
   php bin/magento setup:upgrade<br>
   php bin/magento setup:di:compile<br>
   php bin/magento cache:clean<br> 

4. If Magento is running in production mode, deploy static content:

   php bin/magento setup:static-content:deploy -f
