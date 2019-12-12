# Magento 2 Checkout Success Page Access

Access the checkout success page of your Magento 2 store without completing the
checkout process again and again.

### Installation
In your Magento 2 root directory run  
`composer require codelegacy/magento2-successaccess`  
`bin/magento setup:upgrade`

### Configuration and Use
After installation, enable via the Magento admin panel under:  
`Stores->Configuration->Sales->Sales->Success Page Access->Enable Access to Checkout Success Page`  
Navigate to your success page with any order increment id. Generate a new key in `Success Access Secure Key` and change order increment id to the one you want to test with, ex http://mage2.devsite/checkout/onepage/success/key/3swLVeQSP8hV/order/2000000197

