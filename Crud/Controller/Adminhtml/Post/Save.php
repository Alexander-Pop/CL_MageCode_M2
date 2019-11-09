<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Controller\Adminhtml\Post;

use Codelegacy\Crud\Api\Data\PostInterface;
use Codelegacy\Crud\Api\PostRepositoryInterface;
use Codelegacy\Crud\Controller\Adminhtml\AbstractSave;
use Codelegacy\Crud\Helper\AclResources;
use Codelegacy\Crud\Helper\ImageLoader;
use Codelegacy\Crud\Model\PostFactory;

class Save extends AbstractSave
{
    const IMAGE_PATH = 'codelegacy/post';

    /**
     * @param array $data
     * @return array
     */
    protected function _updateData(array $data)
    {
        $image = null;
        if (key_exists('image', $data)) {
            $image = $data[PostInterface::IMAGE]['value'];
        }

        /** @var ImageLoader $imageLoader */
        $imageLoader = $this->_objectManager->get(ImageLoader::class);
        $data[PostInterface::IMAGE] = $imageLoader->loadImage(self::IMAGE_PATH, $image);

        $data[PostInterface::STORE_IDS] = implode(',', $data[PostInterface::STORE_IDS]);
        return $data;
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
     * @return string
     */
    protected function _getRepositoryInterface()
    {
        return PostRepositoryInterface::class;
    }

    /**
     * @return string
     */
    protected function _getIdField()
    {
        return PostInterface::ID;
    }

    /**
     * @return string
     */
    protected function _getFactory()
    {
        return PostFactory::class;
    }
}