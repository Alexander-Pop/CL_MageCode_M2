<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\EntityModelRepository\Model;

use Codelegacy\EntityModelRepository\Api\Data\TestEntityInterface;
use Magento\Framework\Model\AbstractModel;

class TestEntity extends AbstractModel implements TestEntityInterface
{
    protected function _construct()
    {
        $this->_init(Codelegacy\EntityModelRepository\Model\ResourceModel\TestEntity::class);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * @param $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->setData(self::TITLE, $title);
    }

     /**
     * Get ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::ENTITY_ID, $id);
    }
}