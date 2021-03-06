<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Block\Adminhtml\Tag;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;
use Codelegacy\Crud\Block\Adminhtml\AbstractEdit;
use Codelegacy\Crud\Helper\AclResources;
use Codelegacy\Crud\Api\Data\TagInterface;

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
        return AclResources::TAG_DELETE;
    }

    /**
     * @return string
     */
    protected function _getSaveAcl()
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
     * @param TagInterface $model
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
        return 'tag';
    }

    /**
     * @return string
     */
    protected function _getId()
    {
        return TagInterface::ID;
    }
}