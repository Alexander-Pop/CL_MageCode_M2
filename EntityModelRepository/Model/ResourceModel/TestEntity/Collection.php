<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\EntityModelRepository\Model\ResourceModel\TestEntity;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(
        	'Codelegacy\EntityModelRepository\Model\TestEntity', 
        	'Codelegacy\EntityModelRepository\Model\ResourceModel\TestEntity'
        );
    }
}