<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\SimpleCrud\Model\ResourceModel\Review;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Codelegacy\SimpleCrud\Model\Review as Model;
use Codelegacy\SimpleCrud\Model\ResourceModel\Review as ResourceModel;
use Codelegacy\SimpleCrud\Api\Data\ReviewInterface;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = ReviewInterface::KEY_ID;

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}