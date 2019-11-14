<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\CrudModel\Model;

use Magento\Framework\Model\AbstractModel;

class Employee extends AbstractModel
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Codelegacy\CrudModel\Model\ResourceModel\Employee::class);
    }
    
}