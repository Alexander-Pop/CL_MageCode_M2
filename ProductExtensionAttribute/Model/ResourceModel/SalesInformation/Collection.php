<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\ProductExtensionAttribute\Model\ResourceModel\SalesInformation;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Codelegacy\ProductExtensionAttribute\Model\SalesInformation as Model;
use Codelegacy\ProductExtensionAttribute\Model\ResourceModel\SalesInformation as ResourceModel;
use Codelegacy\ProductExtensionAttribute\Api\Data\SalesInformationInterface;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = SalesInformationInterface::KEY_ID;

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}