<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Block\Adminhtml\Post;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;
use Codelegacy\Crud\Api\Data\PostInterface;
use Codelegacy\Crud\Block\Adminhtml\AbstractEdit;
use Codelegacy\Crud\Helper\AclResources;

class Edit extends AbstractEdit
{
    /**
     * @param Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        array $data = []
    ) {
        parent::__construct($context, $registry, $data);
    }

    /**
     * @return string
     */
    protected function _getDeleteAcl()
    {
        return AclResources::POST_DELETE;
    }

    /**
     * @return string
     */
    protected function _getSaveAcl()
    {
        return AclResources::POST_SAVE;
    }

    /**
     * @return string
     */
    protected function _getEntityTitle()
    {
        return PostInterface::ENTITY_TITLE;
}

    /**
     * @param PostInterface $model
     * @return string
     */
    protected function _getTitle($model)
    {
        return $model->getTitle();
    }

    /**
     * @return string
     */
    protected function _getController()
    {
        return 'post';
    }

    /**
     * @return string
     */
    protected function _getId()
    {
        return PostInterface::ID;
    }
}