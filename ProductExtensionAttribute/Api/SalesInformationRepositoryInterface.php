<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\ProductExtensionAttribute\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Codelegacy\ProductExtensionAttribute\Api\Data\SalesInformationSearchResultsInterface;

interface SalesInformationRepositoryInterface
{
    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return SalesInformationSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}