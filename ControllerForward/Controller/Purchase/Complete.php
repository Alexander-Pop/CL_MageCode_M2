<?php

namespace Codelegacy\ControllerForward\Controller\Purchase;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Complete extends \Magento\Framework\App\Action\Action {

	protected $resultPageFactory;

	public function __construct(
		Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
  	}

	/**
	 * Sets the content of the response
	 */
	public function execute() {

    $parameters = [
    	'product'=>'Power Bank',
    	'tranxId'=>'TRX-1234'
    ];

    //http://yoursite.com/thankyou/purchase/complete
    $this->_forward(
    	'Message', //action (Message.php)
    	'Purchase', //controller (Purchase/)
    	'thankyou', 
    	$parameters
    );
    //Magento\Framework\App\Action\Action\Action.php
    //protected function _forward($action, $controller = null, $module = null, array $params = null)

	}

}
