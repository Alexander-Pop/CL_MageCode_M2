<?php
// Magento set last viewed category and product in session 

// Magento\Catalog\Controller\Category\View.php
// $this->_catalogSession->setLastVisitedCategoryId($category->getId());
// To get this value:
// use Magento\Catalog\Model\Session as CatalogSession;
// create constructor
// $this->catalogSession = $catalogSession;

$this->catalogSession->getData('last_viewed_category_id');


// Product
Magento\Catalog\Helper\Product\View.php
$this->_catalogSession->setLastViewedProductId($product->getId());

use Magento\Catalog\Model\Session as CatalogSession
$productId = $this->catalogSession->getData('last_viewed_product_id');


/*
All session types in Magento 2
1)  \Magento\Catalog\Model\Session //vendor/magento/module-catalog/Model/Session.php
2) \Magento\Newsletter\Model\Session //vendor/magento/module-newsletter/Model/Session.php
3) \Magento\Persistent\Model\Session //vendor/magento/module-persistent/Model/Session.php
4) \Magento\Customer\Model\Session //vendor/magento/module-customer/Model/Session.php
5) \Magento\Backend\Model\Session //vendor/magento/module-backend/Model/Session.php
6) \Magento\Checkout\Model\Session //vendor/magento/module-checkout/Model/Session.php
*/

namespace vendor\module\..;

use Magento\Catalog\Model\Session as CatalogSession;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Checkout\Model\Session as CheckoutSession;
use \Magento\Framework\Session\SessionManagerInterface as CoreSession

class ClassName {
    ...

    protected $_coreSession;
    protected $_catalogSession;
    protected $_customerSession;
    protected $_checkoutSession;

    public function __construct(
        ....
        CoreSession $coreSession,
        CatalogSession $catalogSession,
        CustomerSession $customerSession,
        CheckoutSession $checkoutSession,
        ....
    ){
        ....
        $this->_coreSession = $coreSession;
        $this->_catalogSession = $catalogSession;
        $this->_checkoutSession = $checkoutSession;
        $this->_customerSession = $customerSession;

        ....
    }

    public function getCoreSession() 
    {
        return $this->_coreSession;
    }

    public function getCatalogSession() 
    {
        return $this->_catalogSession;
    }

    public function getCustomerSession() 
    {
        return $this->_customerSession;
    }

    public function getCheckoutSession() 
    {
        return $this->_checkoutSession;
    }

    //To set value
	$this->getCustomerSession()->setMyValue('YourValue');
	//To get value
	$this->getCustomerSession()->getMyValue();
	//For Unset session value
	$this->getCustomerSession()->unsMyValue();
}