<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Controller\Adminhtml\Category;

use Codelegacy\Crud\Api\CategoryRepositoryInterface;
use Codelegacy\Crud\Api\Data\CategoryInterface;
use Codelegacy\Crud\Controller\Adminhtml\AbstractIndex;
use Codelegacy\Crud\Helper\AclResources;

class Index extends AbstractIndex
{
    /**
     * @return string
     */
    protected function _getAclResource()
    {
        return AclResources::CATEGORY;
    }

    /**
     * @return string
     */
    protected function _getEntityTitle()
    {
        return __(CategoryInterface::ENTITY_TITLE);
    }

    /**
     * @return string
     */
    protected function _getRepositoryInterface()
    {
        return CategoryRepositoryInterface::class;
    }
}