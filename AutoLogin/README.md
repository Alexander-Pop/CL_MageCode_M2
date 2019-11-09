# AutoLogin - Magento 2 extension 
Magento 2 - Autologin for customer (frontend) and user (admin panel)  
Admin can activate autologin for customer and admin.  
![Sample](https://github.com/Alexander-Pop/MageCode/blob/master/docs/Settings.png "Settings")    

For good work recommended in "Settings -> Advanced - Admin - Security" set next settings:  
"Yes" for "Admin Account Sharing"   
"No" for "Add Secret Key to URLs"  

Note: if activated autologin for admin, you can't sign out.  

# Supported  
Magento 2.1.x - 2.3.x   
PHP 7.0 and higher  

# Installation Instruction  
* Copy the content of the repo to the Magento 2: app/code/Codelegacy/AutoLogin  
* Run command: php bin/magento setup:upgrade  
* Run command: php bin/magento cache:clean

## Command for disable autologin on frontend and backend  
For frontend: php bin/magento autologin:disable f  
For backend: php bin/magento autologin:disable b  
For backend and frontend: php bin/magento autologin:disable all 

After command execute, for clean cache run command: php bin/magento cache:clean