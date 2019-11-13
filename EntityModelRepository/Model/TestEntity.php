<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\EntityModelRepository\Model;


use Codelegacy\EntityModelRepository\Api\Data\TestEntityInterface;
use Magento\Framework\Model\AbstractModel;

class TestEntity extends AbstractModel implements TestEntityInterface
{
    const ENTITY_ID = 'entity_id';
    const TITLE = 'title';

    protected function _construct()
    {
        $this->_init(ResourceModel\TestEntity::class);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_getData(self::TITLE);
    }

    /**
     * @param $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->setData(self::TITLE, $title);
    }
}