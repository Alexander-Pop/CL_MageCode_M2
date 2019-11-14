<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\CrudModel\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Codelegacy\CrudModel\Model\ResourceModel\Employee\CollectionFactory;

class Rescoll extends \Magento\Framework\App\Action\Action {

    protected $resultPageFactory;
    protected $employeeCollection;

    /**
     * Constructor
     * 
     * @param \Magento\Framework\App\Action\Context  $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context, 
        PageFactory $resultPageFactory,
        CollectionFactory $employeeCollection
    ) {
        $this->resultPageFactory   = $resultPageFactory;
        $this->employeeCollection = $employeeCollection;
        parent::__construct($context);
    }

    /**
     * Execute view action
     * 
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute() {
        echo "before inserting";
        $collection = $this->employeeCollection->create();
        echo "<pre>";
        print_r($collection->getData());
        echo "</pre>";
        exit;
    }

}
