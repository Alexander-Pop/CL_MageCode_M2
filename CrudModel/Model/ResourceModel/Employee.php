<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\CrudModel\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Employee extends AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('employee_details', 'employee_id');
    }
}