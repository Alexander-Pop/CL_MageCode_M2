get POST and GET requests in Magento 2
In a case of a controller that extends Magento\Framework\App\Action\Action, it is possible to get the request with the aid of $this->getRequest()->getPost().

For a custom class, inject the request in the constructor:

<?php 
namespace Namespace\Module\Something; 

use Magento\Framework\App\Request\Http;
class ClassName { 
	protected $request; 

	public function __construct( 
		Http $request, 
		....
		//rest of parameters here 
	) { 
		$this->request = $request; 
		...//rest of constructor here 
	} 

	public function getPost() { 
		return $this->request->getPost(); 
	} 
}
