<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\SimpleCrud\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ReviewSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get list.
     *
     * @return ReviewInterface[]
     */
    public function getItems();

    /**
     * Set list.
     *
     * @param ReviewInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
