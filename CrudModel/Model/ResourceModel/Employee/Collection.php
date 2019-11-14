<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\CrudModel\Model\ResourceModel\Employee;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('\Codelegacy\CrudModel\Model\Employee', '\Codelegacy\CrudModel\Model\ResourceModel\Employee');
    }
}