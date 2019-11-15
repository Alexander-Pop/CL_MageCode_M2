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
use Magento\Framework\Session\SessionManagerInterface as CoreSession

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

    /*****************************************************
     * Return true if this is a backend session.
     *
     * @return bool
     */
    public function isBackend()
    {
        return $this->appState->getAreaCode() == \Magento\Backend\App\Area\FrontNameResolver::AREA_CODE;
    }

    /**
     * Return checkout session.
     *
     * @return Magento\Backend\Model\Session|Magento\Backend\Model\Session\Quote
     */
    public function getCheckout()
    {
        $sessionClass = \Magento\Checkout\Model\Session::class;
        if ($this->isBackend()) {
            $sessionClass = \Magento\Backend\Model\Session\Quote::class;
        }

        return $this->objectManager->get($sessionClass);
    }
    /******************************************************/

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
?>

Magento 2 Session Debugging – Step by Step Instruction
https://belvg.com/blog/magento-2-session-debugging-step-by-step-instruction.html

Magento 2 session allows you to store important information, which can be used to identify the user and transfer data from one page to another. Magento 2 takes full advantage of this feature.

Magento allows you to choose where to store sessions:

    In memory (RAM) if you are using memcached,
    On the Redis server, if you have it configured,
    Into a file.

When you use a file system to store the session, Magento saves the session in files in the specified path.
The path can be specified in:

    File app/etc/env.php
    'session' => array (
         'save' => 'files',  'save_path' => '/var/www/session',
    )
    'session' => array (
         'save' => 'files',  'save_path' => '/var/www/session',
    )
    If the path is not specified in, then the system searches for the path in php.ini file, session.save_path value;
    If the path is specified in neither, the session will be saved in the {root of the installed Magento}/var/session.

To manage sessions, Magento uses the Magento \ Framework \ Session \ SessionManager class. Magento also stores the current session identifier in cookies, which helps the system to identify you as a logged in user, even after you close and open the browser. When you create a session, cookies are automatically created with the name PHPSESSID and the value equal to the session identifier. The system also takes care of your security, so when you log in, session_regenerate_id () is called. Automatically new data is entered into cookies and the expires / max-age cookies are updated; due to this we constantly stay logged into the system.

Magento 2 enables you to set up cookies and session, which is, as we now realize, a rather important aspect to us. Navigate to settings via the following path Admin Panel -> Stores -> Configuration -> Web -> Default Cookie Settings / Session Validation Settings.

The following functions are of particular interest to Magento admins and developers:
Andrey_Dubina
Partner With Us
Let's discuss how to grow your business. Get a Free Quote.
Talk to Andrey

    Cookie Lifetime – the number of seconds the information about our presence on the site will be stored, and when we refresh the page this time will last. By default, lifetime is set at 3600 = 1 hour.
    Cookie Path – the storage path for cookies.
    Domain – if empty, then the default domain of the store is used.
    Use HTTP Only – allows you to use only the HTTP protocol, leave the value “Yes” to secure yourself.
    Cookie Restriction Mode – includes a front-end notification about the use of cookies so that the store will function at its full capacity, and the client must agree with Privacy Policy.
    Session Validation Settings – here we set the permissions and whether the system will check the server variables listed below.
    Use SID on Storefront – this option allows the system to recognize us when we move from one store to another.

default cookies settings
What data does the Magento 2 session store

Session stores in itself all the necessary and constantly used information about the user, in particular:

    General information about the user, browser and IP-address;
    Information about the visitor, date of the visit, session ID, visitor ID, information about whether the user is logged in or not, logged user ID;
    Information about the logged in user, wishlist, cart, user group and the user ID;
    Messages for user, reports, compare catalog and other information.

We can leave new data to be saved in the session. To perform this, refer to one of the models:

\Magento\Customer\Model\Session $customerSession
\Magento\Catalog\Model\Session $catalogSession
\Magento\Checkout\Model\Session $checkoutSession

and implement get, set, uns methods (deletes the value from the session). Another method – we turn to the SessionManager we described above and install the value in the common session storage via the setData method.
Common sessions issues

1.Q: There are many models for session management. I have a chat and I want to save user information; which model is best for me to store information in a session?
A: Working with chat, you utilize user data, and for this situation it is best to use Magento \ Customer \ Model \ Session.

2. Q: I have installed Magento 2 and can not log in to the admin panel; instead, the error “Admin Login Error – Your current session has been expired” appears. What should I do?
A: You need to add a new entry to the core_config_data table: scope – default, scope_id – 0, path – admin / security / session_lifetime, value – 86400. This way, we set the administrator’s lifetime. Moreover, update the php cache bin / magento cache: clean.

3. Q: How to specify a session lifetime on the server side?
A: To specify the lifetime of the session on the server side you need to find the php.ini file, which is responsible for the current version of php, and set the desired value in seconds to the session.gc_maxlifetime variable. Remember to restart the server for the changes to take effect.

4. Q: How to configure the system so that the session would be stored in Redis?
A: Edit the app / etc / env.php file. Change or add the following lines: ‘session’ => array (‘save’ => ‘redis’)

5. Q: Why there is no “Remember Me” option at the user login page?
A: To enable this option, you must enable Persistent Shopping Cart in the admin panel. Navigate to Stores -> Configuration -> Customers -> Persistent Shopping Cart. Enable Persistence and Remember Me.

6. Q: I added my value to the session, and I expected that it will be deleted when I leave the account, but the value in the session remains. What do I do?
A: You can delete your value via the Observer and event “customer_logout”. Use SessionManager or in some cases Magento \ Customer \ Model \ Session, which also inherits from SessionManager.

7. Q: How can I find out the current customerId of the logged in user?
A: You need to declare the module Magento \ Customer \ Model \ Session in __construct a block or controller (depending on the situation). Then request the user ID, for example: $ this-> session-> getCustomerId ().

8. Q: I changed the group from the user through the admin panel, but the group has not changed on the site. Why?
A: The identifier of the current group is also stored in the session. Try to log out and log in again.