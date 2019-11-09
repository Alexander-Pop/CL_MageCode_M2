<?php

namespace Codelegacy\Faq\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Codelegacy\Faq\Helper\Constants;
use Codelegacy\Faq\Model\Category as Model;

class Category extends AbstractDb
{
    const MAIN_TABLE = Constants::DB_PREFIX . 'faq_category';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, Model::KEY_ID);
    }
}