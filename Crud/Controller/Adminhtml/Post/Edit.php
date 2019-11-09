<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Controller\Adminhtml\Post;

use Magento\Framework\Model\AbstractModel;
use Codelegacy\Crud\Api\Data\PostInterface;
use Codelegacy\Crud\Api\PostRepositoryInterface;
use Codelegacy\Crud\Api\PostTagRepositoryInterface;
use Codelegacy\Crud\Controller\Adminhtml\AbstractEdit;
use Codelegacy\Crud\Helper\AclResources;
use Codelegacy\Crud\Model\PostFactory;

class Edit extends AbstractEdit
{
    /**
     * @param PostInterface $model
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
     * @param int $id
     * @return PostInterface
     */
    protected function _loadEditData($id)
    {
        /** @var PostRepositoryInterface $repository */
        $repository = $this->_objectManager->get($this->_getRepositoryInterface());
        /** @var AbstractModel|PostInterface $model */
        $model = $repository->getById($id);
        /** @var PostTagRepositoryInterface $postTagRepository */
        $postTagRepository = $this->_objectManager->get(PostTagRepositoryInterface::class);
        $model->setData(PostInterface::TAG, $postTagRepository->getTagIdsByPostId($id));
        return $model;
    }

    /**
     * @return string
     */
    protected function _getRepositoryInterface()
    {
        return PostRepositoryInterface::class;
    }

    /**
     * @return string
     */
    protected function _getFactory()
    {
        return PostFactory::class;
    }
}