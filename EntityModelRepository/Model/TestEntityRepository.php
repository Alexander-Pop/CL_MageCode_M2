<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\EntityModelRepository\Model;

use Codelegacy\EntityModelRepository\Api\Data\TestEntitySearchResultInterfaceFactory;
use Codelegacy\EntityModelRepository\Api\TestEntityRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;


class TestEntityRepository extends AbstractRepository implements TestEntityRepositoryInterface
{
    public function __construct(
        TestEntityFactory $testEntityFactory,
        TestEntitySearchResultInterfaceFactory $searchResultFactory,
        ResourceModel\TestEntity\CollectionFactory $testEntityCollectionFactory
    )
    {
        $this->testEntityFactory = $testEntityFactory;
        $this->searchResultFactory = $searchResultFactory;
        $this->testEntityCollectionFactory = $testEntityCollectionFactory;
    }

    /**
     * @param \Codelegacy\EntityModelRepository\Api\Data\TestEntityInterface $testEntity
     * @return \Codelegacy\EntityModelRepository\Api\Data\TestEntityInterface
     */
    public function save(\Codelegacy\EntityModelRepository\Api\Data\TestEntityInterface $testEntity)
    {
        $testEntity->getResource()->save($testEntity);
        return $testEntity;
    }

    /**
     * @param \Codelegacy\EntityModelRepository\Api\Data\TestEntityInterface $testEntity
     * @return \Codelegacy\EntityModelRepository\Api\Data\TestEntityInterface
     */
    public function delete(\Codelegacy\EntityModelRepository\Api\Data\TestEntityInterface $testEntity)
    {
        $testEntity->getResource()->delete($testEntity);
    }

    /**
     * @param int $id
     * @return \Codelegacy\EntityModelRepository\Api\Data\TestEntityInterface
     * @throws NoSuchEntityException
     */
    public function getById($id)
    {
        $obj = $this->testEntityFactory->create();
        $obj->getResource()->load($obj, $id);
        if (! $obj->getId()) {
            throw new NoSuchEntityException(__('Unable to find My Entity with ID "%1"', $id));
        }
        return $obj;
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteById($id)
    {
        $obj = $this->getById($id);
        $obj->delete();
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Codelegacy\EntityModelRepository\Api\Data\TestEntitySearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->testEntityCollectionFactory->create();
        $searchResults = $this->searchResultFactory->create();

        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);

        $collection->load();

        return $this->buildSearchResult($searchCriteria, $collection, $searchResults);
    }


}