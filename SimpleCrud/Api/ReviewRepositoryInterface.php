<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\SimpleCrud\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Codelegacy\SimpleCrud\Api\Data\ReviewInterface;
use Codelegacy\SimpleCrud\Api\Data\ReviewSearchResultsInterface;

interface ReviewRepositoryInterface
{
    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return ReviewSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param ReviewInterface $review
     * @return ReviewInterface
     * @throws LocalizedException
     */
    public function save(ReviewInterface $review);

    /**
     * @param int $id
     * @return ReviewInterface
     * @throws LocalizedException
     */
    public function getById($id);

    /**
     * @param ReviewInterface $review
     * @return bool
     * @throws LocalizedException
     */
    public function delete(ReviewInterface $review);

    /**
     * @param int $id
     * @return bool
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById($id);



}