<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Codelegacy\Crud\Model\Tag as Model;

class Tag extends AbstractDb
{
    /**
     * @return string
     */
    public static function getTableName(){
        return 'crud_tag';
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(self::getTableName(), Model::ID);
    }
}