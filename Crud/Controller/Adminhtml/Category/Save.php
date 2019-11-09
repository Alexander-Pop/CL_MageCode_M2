<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Controller\Adminhtml\Category;

use Codelegacy\Crud\Api\CategoryRepositoryInterface;
use Codelegacy\Crud\Api\Data\CategoryInterface;
use Codelegacy\Crud\Controller\Adminhtml\AbstractSave;
use Codelegacy\Crud\Helper\AclResources;
use Codelegacy\Crud\Model\CategoryFactory;

class Save extends AbstractSave
{
    /**
     * @return string
     */
    protected function _getAclResource()
    {
        return AclResources::CATEGORY_SAVE;
    }

    /**
     * @return string
     */
    protected function _getEntityTitle()
    {
        return CategoryInterface::ENTITY_TITLE;
    }

    /**
     * @return string
     */
    protected function _getRepositoryInterface()
    {
        return CategoryRepositoryInterface::class;
    }

    /**
     * @return string
     */
    protected function _getIdField()
    {
        return CategoryInterface::ID;
    }

    /**
     * @return string
     */
    protected function _getFactory()
    {
        return CategoryFactory::class;
    }
}