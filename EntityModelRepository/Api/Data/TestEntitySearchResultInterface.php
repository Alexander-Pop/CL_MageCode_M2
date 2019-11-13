<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\EntityModelRepository\Api\Data;

use Magento\Framework\Data\SearchResultInterface;

interface TestEntitySearchResultInterface extends SearchResultInterface
{
    /**
     * @return \Codelegacy\EntityModelRepository\Api\Data\TestEntityInterface[]
     */
    public function getItems();

    /**
     * @param \Codelegacy\EntityModelRepository\Api\Data\TestEntityInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}