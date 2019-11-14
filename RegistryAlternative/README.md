# Magento 2 - Request Price extension 
A sample module that show what and how to use instead of deprecated Registry class since Magento 2.3.
![Add back to category link to product page](https://github.com/Alexander-Pop/MageCode/blob/master/docs/BackToCategory.jpg "Back to category link on product page")

# This module provides 2 service classes as example:
* get current product;
* get current category;
* shows the situation when one needs to ad a "Back to category" link on the product page.

# Info
* see SNIPPETS/SessionRelated.php

# Supported  
* Magento 2.1.x - 2.3.x  
* PHP 7.0 and higher  

# Installation Instruction  
* Copy the content of the repo to the Magento 2: /MageCode/RegistryAlternative
* Run command: php bin/magento setup:upgrade
* Run Command: php bin/magento setup:static-content:deploy
* Now Flush Cache: php bin/magento cache:flush
