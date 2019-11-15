<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\EntityModelRepositoryBlog\Api\Data;

interface BlogSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Blog list.
     * @return \Codelegacy\EntityModelRepositoryBlog\Api\Data\BlogInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Codelegacy\EntityModelRepositoryBlog\Api\Data\BlogInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
