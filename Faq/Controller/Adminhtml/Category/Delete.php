<?php

namespace Codelegacy\Faq\Controller\Adminhtml\Category;

use Codelegacy\Faq\Api\Repository\CategoryRepositoryInterface;
use Codelegacy\Faq\Helper\AclNames;
use Codelegacy\Faq\Controller\Adminhtml\AbstractDeleteAction;

class Delete extends AbstractDeleteAction
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
    protected function _getRepositoryClass(): string
    {
        return CategoryRepositoryInterface::class;
    }
}