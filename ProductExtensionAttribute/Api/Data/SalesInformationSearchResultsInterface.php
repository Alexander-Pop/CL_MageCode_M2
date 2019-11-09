<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\ProductExtensionAttribute\Api\Data;

interface SalesInformationSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get list.
     *
     * @return SalesInformationInterface[]
     */
    public function getItems();

    /**
     * Set list.
     *
     * @param SalesInformationInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
