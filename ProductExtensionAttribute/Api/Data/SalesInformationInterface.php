<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\ProductExtensionAttribute\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface SalesInformationInterface extends ExtensibleDataInterface
{
    const KEY_ID           = 'id';
    const KEY_PRODUCT_ID   = 'product_id';
    const KEY_ORDER_STATUS = 'order_status';
    const KEY_QTY          = 'qty';
    const KEY_UPDATED_AT   = 'updated_at';

    /**
     * @return \Codelegacy\ProductExtensionAttribute\Api\Data\SalesInformationExtensionInterface
     */
    public function getExtensionAttributes();

    /**
     * @param \Codelegacy\ProductExtensionAttribute\Api\Data\SalesInformationExtensionInterface $extensionAttributes
     * @return self
     */
    public function setExtensionAttributes(\Codelegacy\ProductExtensionAttribute\Api\Data\SalesInformationExtensionInterface $extensionAttributes);
}