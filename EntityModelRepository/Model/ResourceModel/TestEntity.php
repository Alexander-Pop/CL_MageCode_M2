<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\EntityModelRepository\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class TestEntity extends AbstractDb
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
        	'codelegacy_test_entity', 
        	'entity_id'
        );
    }
}