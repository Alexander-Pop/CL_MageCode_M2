test file with an initialised Magento 2

Create a test.php file in the root of your Magento 2 instance.

<?php 
require __DIR__ . '/app/bootstrap.php'; 
$bootstrap = \Magento\Framework\App\Bootstrap::create(BP, $_SERVER); 
/** @var \Magento\Framework\App\Http $app */ 
$app = $bootstrap->createApplication('TestApp'); 
$bootstrap->run($app);

//In the same place, create a TestApp.php file with the following content:
class TestApp extends \Magento\Framework\App\Http implements \Magento\Framework\AppInterface {
	public function launch() { 
	//dirty code goes here. 
	//the example below just prints a class name 
		echo get_class($this->_objectManager->create('\Magento\Catalog\Model\Category')); 
	//the method must end with this line 
		return $this->_response; 
	} 
	public function catchException(\Magento\Framework\App\Bootstrap $bootstrap, \Exception $exception) { 
		return false; 
	} 
}
?>

Call your test.php file in a browser to execute everything from TestApp::launch().

The createApplication method from the bootstrap class creates an application class instance and expects the implementation of \Magento\Framework\AppInterface that contains 2 methods.

You create your own class in TestApp to implement the interface. Since the catchException method always returns false, your app don’t handle exceptions. If something goes wrong, print it on a screen.

The implemented launch method is called by \Magento\Framework\App\Bootstrap::run. The run method behaves almost the same in spite of what the application passed as a parameter.

$response = $application->launch(); is the only thing that depends on the app. It means that calling \Magento\Framework\App\Bootstrap::run inits the Magento env and calls the launch method from your app. Therefore, put all the dirty code inside this method.

Then, \Magento\Framework\App\Bootstrap::run calls $response->sendResponse();, where under $response we mean everything what the launch method returns. Thus, return $this->_response; is required, as it returns an empty response.

The above app class extends \Magento\Framework\App\Http so you get request, response, and other parameters, but you can omit this by making your class extend nothing.