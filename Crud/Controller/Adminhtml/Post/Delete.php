<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Controller\Adminhtml\Post;

use Codelegacy\Crud\Api\Data\PostInterface;
use Codelegacy\Crud\Api\PostRepositoryInterface;
use Codelegacy\Crud\Controller\Adminhtml\AbstractDelete;
use Codelegacy\Crud\Helper\AclResources;

class Delete extends AbstractDelete
{
    /**
     * @return string
     */
    protected function _getAclResource()
    {
        return AclResources::POST_DELETE;
    }

    /**
     * @return string
     */
    protected function _getEntityTitle()
    {
        return __(PostInterface::ENTITY_TITLE);
    }

    /**
     * @return string
     */
    protected function _getRepositoryInterface()
    {
        return PostRepositoryInterface::class;
    }
}