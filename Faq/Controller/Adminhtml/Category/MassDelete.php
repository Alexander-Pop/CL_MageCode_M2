<?php

namespace Codelegacy\Faq\Controller\Adminhtml\Category;

use Codelegacy\Faq\Api\Repository\CategoryRepositoryInterface;
use Codelegacy\Faq\Controller\Adminhtml\AbstractMassDelete;
use Codelegacy\Faq\Helper\AclNames;
use Codelegacy\Faq\Model\ResourceModel\Category\Collection as CategoryCollection;

class MassDelete extends AbstractMassDelete
{
    /**
     * @return string
     */
    protected function _getACLName(): string
    {
        return AclNames::ACL_CATEGORY_DELETE;
    }

    /**
     * @return string
     */
    protected function _getCollectionClass(): string
    {
        return CategoryCollection::class;
    }

    /**
     * @return string
     */
    protected function _getRepositoryClass(): string
    {
        return CategoryRepositoryInterface::class;
    }
}