# Magento 2 - FAQ extension  
![Sample](https://github.com/Alexander-Pop/MageCode/blob/master/docs/Faq/Frontend.png "Frontend")  
Admin can create, update, delete FAQ questions and FAQ categories.  

## Admin Panel  
![Sample](https://github.com/Alexander-Pop/MageCode/blob/master/docs/Faq/Admin_Categories.png "Categories page")  
![Sample](https://github.com/Alexander-Pop/MageCode/blob/master/docs/Faq/Admin_Category_Form.png "Category Edit Form")  
![Sample](https://github.com/Alexander-Pop/MageCode/blob/master/docs/Faq/Admin_Questions.png "Questions Page")  
![Sample](https://github.com/Alexander-Pop/MageCode/blob/master/docs/Faq/Admin_Question_Form.png "Question Edit Form")  

# Supported  
Magento 2.2.x - 2.3.x  
PHP 7.0 and higher  

# Installation Instruction  
* Copy the content of the repo to the Magento 2: app/code/Codelegacy/Faq
* Run command: php bin/magento setup:upgrade
* Run Command: php bin/magento setup:static-content:deploy
* Now Flush Cache: php bin/magento cache:flush
