<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\ProductExtensionAttribute\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Codelegacy\ProductExtensionAttribute\Api\Data\SalesInformationInterface;
use Codelegacy\ProductExtensionAttribute\Model\ResourceModel\SalesInformation as ResourceModel;

class SalesInformation extends AbstractExtensibleModel implements SalesInformationInterface
{
    /**
     * {@inheritdoc}
     * @return \Codelegacy\ProductExtensionAttribute\Api\Data\SalesInformationExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * {@inheritdoc}
     * @param \Codelegacy\ProductExtensionAttribute\Api\Data\SalesInformationExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Codelegacy\ProductExtensionAttribute\Api\Data\SalesInformationExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
        parent::_construct();
    }
}