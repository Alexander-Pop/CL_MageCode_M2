<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Controller\Adminhtml\Post;

use Codelegacy\Crud\Api\Data\PostInterface;
use Codelegacy\Crud\Controller\Adminhtml\AbstractMassDisable;
use Codelegacy\Crud\Api\PostRepositoryInterface;
use Codelegacy\Crud\Helper\AclResources;
use Codelegacy\Crud\Model\ResourceModel\Post\Collection as PostCollection;

class MassDisable extends AbstractMassDisable
{
    /**
     * @return string
     */
    protected function _getAclResource()
    {
        return AclResources::POST_SAVE;
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
    protected function _getCollectionClass()
    {
        return PostCollection::class;
    }

    /**
     * @return string
     */
    protected function _getRepositoryInterface()
    {
        return PostRepositoryInterface::class;
    }
}