<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Model\ResourceModel\Tag;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Codelegacy\Crud\Model\Tag as Model;
use Codelegacy\Crud\Model\ResourceModel\Tag as ResourceModel;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = Model::ID;

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            Model::class,
            ResourceModel::class
        );
    }

    /**
     * @param string $valueField
     * @param string $labelField
     * @param array $additional
     * @return array
     */
    protected function _toOptionArray($valueField = Model::ID, $labelField = Model::TITLE, $additional = [])
    {
        return parent::_toOptionArray($valueField, $labelField, $additional);
    }
}