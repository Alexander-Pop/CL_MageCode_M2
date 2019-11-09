<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Controller\Adminhtml\Tag;

use Codelegacy\Crud\Api\Data\TagInterface;
use Codelegacy\Crud\Api\TagRepositoryInterface;
use Codelegacy\Crud\Controller\Adminhtml\AbstractSave;
use Codelegacy\Crud\Helper\AclResources;
use Codelegacy\Crud\Model\TagFactory;

class Save extends AbstractSave
{
    /**
     * @return string
     */
    protected function _getAclResource()
    {
        return AclResources::TAG_SAVE;
    }

    /**
     * @return string
     */
    protected function _getEntityTitle()
    {
        return TagInterface::ENTITY_TITLE;
    }

    /**
     * @return string
     */
    protected function _getRepositoryInterface()
    {
        return TagRepositoryInterface::class;
    }

    /**
     * @return string
     */
    protected function _getIdField()
    {
        return TagInterface::ID;
    }

    /**
     * @return string
     */
    protected function _getFactory()
    {
        return TagFactory::class;
    }
}