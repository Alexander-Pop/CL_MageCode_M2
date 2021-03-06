<?php

namespace Codelegacy\NoticeStatus\Model;

use Zend\Code\Reflection\Exception\InvalidArgumentException;
use Magento\Framework\Model\AbstractModel;
use Codelegacy\NoticeStatus\Api\Data\NoticeInterface;
use Codelegacy\NoticeStatus\Model\ResourceModel\Notice as ResourceModel;

class Notice extends AbstractModel implements NoticeInterface
{
    /**
     * @return int
     */
    public function getType()
    {
        return (int)$this->getData(self::KEY_TYPE);
    }

    /**
     * @return int
     */
    public function getRecordId()
    {
        return (int)$this->getData(self::KEY_RECORD_ID);
    }

    /**
     * @return string
     */
    public function getRecordType()
    {
        return $this->getData(self::KEY_RECORD_TYPE);
    }

    /**
     * @return int
     */
    public function getSent()
    {
        return (int)$this->getData(self::KEY_SENT);
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return (int)$this->getData(self::KEY_COUNT);
    }

    /**
     * @return string
     */
    public function getCreationTime()
    {
        return $this->getData(self::KEY_CREATION_TIME);
    }

    /**
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->getData(self::KEY_UPDATE_TIME);
    }

    /**
     * @param int
     */
    public function setType($type)
    {
        if (strlen($type) > 5 || !is_numeric($type)) {
            throw new InvalidArgumentException();
        }
        $this->setData(self::KEY_TYPE, (int)$type);
    }

    /**
     * @param int
     */
    public function setRecordId($recordId)
    {
        if (strlen($recordId) > 10 || !is_numeric($recordId)) {
            throw new InvalidArgumentException();
        }
        $this->setData(self::KEY_RECORD_ID, (int)$recordId);
    }

    /**
     * @param string
     */
    public function setRecordType($recordType)
    {
        if (strlen($recordType) > 255) {
            throw new InvalidArgumentException();
        }

        $this->setData(self::KEY_RECORD_TYPE, $recordType);
    }

    /**
     * @param int
     */
    public function setSent($sent)
    {
        if (strlen($sent) > 1 || !is_numeric($sent)) {
            throw new InvalidArgumentException();
        }
        $this->setData(self::KEY_SENT, (int)$sent);
    }

    /**
     * @param int
     */
    public function setCount($count)
    {
        if (strlen($count) > 10 || !is_numeric($count)) {
            throw new InvalidArgumentException();
        }
        $this->setData(self::KEY_COUNT, (int)$count);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}