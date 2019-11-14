<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\CrudModel\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Codelegacy\CrudModel\Model\EmployeeFactory;

class Diobject extends \Magento\Framework\App\Action\Action {

    protected $resultPageFactory;
    protected $_employee;

    /**
     * Constructor
     * 
     * @param \Magento\Framework\App\Action\Context  $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context, 
        PageFactory $resultPageFactory,
        EmployeeFactory $employee
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_employee         = $employee;
        parent::__construct($context);
    }

    /**
     * Execute view action
     * 
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute() {
        echo "before inserting";
        
        $contactModel = $this->_employee->create();
        $collection = $contactModel->getCollection();
        echo "<pre>";
        print_r($collection->getData());
        echo "</pre>";
        exit;
    }

}
