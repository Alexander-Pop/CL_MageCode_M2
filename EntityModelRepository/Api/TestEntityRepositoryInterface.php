<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\EntityModelRepository\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface TestEntityRepositoryInterface
 * @package Codelegacy\EntityModelRepository\Api
 */
interface TestEntityRepositoryInterface
{
    /**
     * @param \Codelegacy\EntityModelRepository\Api\Data\TestEntityInterface $testEntity
     * @return \Codelegacy\EntityModelRepository\Api\Data\TestEntityInterface
     */
    public function save(\Codelegacy\EntityModelRepository\Api\Data\TestEntityInterface $testEntity);

    /**
     * @param \Codelegacy\EntityModelRepository\Api\Data\TestEntityInterface $testEntity
     * @return \Codelegacy\EntityModelRepository\Api\Data\TestEntityInterface
     */
    public function delete(\Codelegacy\EntityModelRepository\Api\Data\TestEntityInterface $testEntity);

    /**
     * @param SearchCriteriaInterface $criteria
     * @return \Codelegacy\EntityModelRepository\Api\Data\TestEntitySearchResultInterface
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteById($id);
}