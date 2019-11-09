<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Controller\Adminhtml\Tag;

use Codelegacy\Crud\Api\Data\TagInterface;
use Codelegacy\Crud\Api\TagRepositoryInterface;
use Codelegacy\Crud\Controller\Adminhtml\AbstractNewAction;
use Codelegacy\Crud\Helper\AclResources;

class NewAction extends AbstractNewAction
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
}