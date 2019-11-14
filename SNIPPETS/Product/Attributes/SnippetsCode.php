<?php
/* Glory to Ukraine! Glory to the heros! */

	// Update Product Attribute value programmatically
 
	use Magento\Framework\App\Bootstrap;

	require __DIR__ . '/app/bootstrap.php';
	 
	$bootstrap = Bootstrap::create(BP, $_SERVER);
	 
	$obj = $bootstrap->getObjectManager();
	 
	// Set the state.
	$state = $obj->get('Magento\Framework\App\State');

	$state->setAreaCode('frontend'); // You can also set "adminhtml"
	 
	// Get the first product of a collection
	$products = $obj->get('Magento\Catalog\Model\ResourceModel\Product\Collection');

	foreach ($products as $product) {
		$product->setData('has_upload_file', 0);
		$product->getResource()->saveAttribute($product, 'has_upload_file');
	}

	// remove an attribute programmatically - It applies either for Customer Attributes, Product Attributes, and each Attribute Entity.

	/*
	* Create a remove-attribute.php file on your project root
    * Put the following content on it and modify the [YOUR_ATTRIBUTE_CODE] parameter with your attribute code.
	*/

	use Magento\Framework\App\Bootstrap;
	require __DIR__ . '/app/bootstrap.php';
	 
	$bootstrap = Bootstrap::create(BP, $_SERVER);
	 
	$obj = $bootstrap->getObjectManager();
	 
	// Set the state. You can also set "adminhtml"
	$state = $obj->get('Magento\Framework\App\State');
	$state->setAreaCode('adminhtml');
	 
	$serviceLocator = new \Zend\ServiceManager\ServiceManager();
	$serviceLocator->setService(\Magento\Setup\Mvc\Bootstrap\InitParamListener::BOOTSTRAP_PARAM, []);
	 
	$provider = new \Magento\Setup\Model\ObjectManagerProvider($serviceLocator);
	 
	$dataSetupFactory = new \Magento\Setup\Module\DataSetupFactory($provider);
	/** @var \Magento\Framework\Setup\SchemaSetupInterface | \Magento\Framework\Setup\ModuleDataSetupInterface $setup */
	$setup = $dataSetupFactory->create();
	$eavSetupFactory = new \Magento\Eav\Setup\EavSetupFactory($obj);
	$eavSetup = $eavSetupFactory->create(['setup' => $setup]);
	 
	 
	// In this example I used the Customer Entity ID. but you can use \Magento\Catalog\Model\Product::ENTITY among others
	$eavSetup->removeAttribute(\Magento\Customer\Model\Customer::ENTITY, '[YOUR_ATTRIBUTE_CODE]');

