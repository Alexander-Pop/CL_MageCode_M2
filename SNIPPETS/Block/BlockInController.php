<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Golden\ShareCart\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

use Psr\Log\LoggerInterface;

class Controllerfooname extends Action
{
    protected $resultPageFactory;
    protected $logger;

    /**
     * Index constructor.
     * @param Context $context
     * @param ProductRepository $productRepository
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        LoggerInterface $logger
    )
    {
        $this->resultPageFactory         = $resultPageFactory;
        $this->logger                    = $logger;
        return parent::__construct($context);
    }

    public function execute()
    {

		$resultPage = $this->resultPageFactory->create();
		$blockInstance = $resultPage->getLayout()->getBlock('your.block.name');
		$childBlocks = $blockInstance->getChildNames();

		foreach($childBlocks as $blockName){
			$block = $resultPage->getLayout()->getBlock($blockName);
		}        
    }
}
