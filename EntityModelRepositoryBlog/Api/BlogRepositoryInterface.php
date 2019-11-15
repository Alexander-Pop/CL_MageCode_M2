<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\EntityModelRepositoryBlog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Codelegacy\EntityModelRepositoryBlog\Api\Data\BlogInterface;
use Magento\Framework\Api\SearchCriteriaInterfacel

interface BlogRepositoryInterface
{

    /**
     * Save Blog
     * @param \Codelegacy\EntityModelRepositoryBlog\Api\Data\BlogInterface $blog
     * @return \Codelegacy\EntityModelRepositoryBlog\Api\Data\BlogInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        BlogInterface $blog
    );

    /**
     * Retrieve Blog
     * @param string $blogId
     * @return \Codelegacy\EntityModelRepositoryBlog\Api\Data\BlogInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($blogId);

    /**
     * Retrieve Blog matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Codelegacy\EntityModelRepositoryBlog\Api\Data\BlogSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Blog
     * @param \Codelegacy\EntityModelRepositoryBlog\Api\Data\BlogInterface $blog
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        BlogInterface $blog
    );

    /**
     * Delete Blog by ID
     * @param string $blogId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($blogId);
}
