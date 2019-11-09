<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Controller\Adminhtml;

use Codelegacy\Crud\Api\Data\StatusSwitchInterface;

abstract class AbstractMassEnable extends AbstractMassAction
{
    /**
     * @param int $collectionSize
     * @return string
     */
    protected function _getSuccessMessage($collectionSize)
    {
        return __('A total of %1 '.strtolower($this->_getEntityTitle()).'(s) have been enabled.', $collectionSize);
    }

    /**
     * @param StatusSwitchInterface|Object $item
     * @return void
     */
    protected function _updateItem(&$item)
    {
        $item->activate();
        $this->_getRepository()->save($item);
    }
}