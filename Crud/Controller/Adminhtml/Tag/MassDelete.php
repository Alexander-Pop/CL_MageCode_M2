<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Controller\Adminhtml\Tag;

use Codelegacy\Crud\Api\Data\TagInterface;
use Codelegacy\Crud\Api\TagRepositoryInterface;
use Codelegacy\Crud\Controller\Adminhtml\AbstractMassDelete;
use Codelegacy\Crud\Helper\AclResources;
use Codelegacy\Crud\Model\ResourceModel\Tag\Collection as TagCollection;

class MassDelete extends AbstractMassDelete
{
    /**
     * @return string
     */
    protected function _getAclResource()
    {
        return AclResources::TAG_DELETE;
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
    protected function _getCollectionClass()
    {
        return TagCollection::class;
    }

    /**
     * @return string
     */
    protected function _getRepositoryInterface()
    {
        return TagRepositoryInterface::class;
    }
}