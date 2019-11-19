<?php

namespace Codelegacy\ControllerForward\Controller\Purchase;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Message extends \Magento\Framework\App\Action\Action {

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
	public function execute() 
	{
		return $this->resultPageFactory->create();
	}
  
}
