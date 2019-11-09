<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Controller\Adminhtml\Tag;

use Codelegacy\Crud\Api\Data\TagInterface;
use Codelegacy\Crud\Api\TagRepositoryInterface;
use Codelegacy\Crud\Controller\Adminhtml\AbstractEdit;
use Codelegacy\Crud\Helper\AclResources;
use Codelegacy\Crud\Model\TagFactory;

class Edit extends AbstractEdit
{
    /**
     * @param TagInterface $model
     * @return string
     */
    protected function getTitle($model)
    {
        return $model->getTitle();
    }

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
    protected function _getFactory()
    {
        return TagFactory::class;
    }
}