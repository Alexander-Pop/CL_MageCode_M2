<?php

namespace Codelegacy\Faq\Controller\Adminhtml\Category;

use Codelegacy\Faq\Helper\AclNames;
use Codelegacy\Faq\Controller\Adminhtml\AbstractNewAction;

class NewAction extends AbstractNewAction
{
    /**
     * @return string
     */
    protected function _getACLName(): string
    {
        return AclNames::ACL_CATEGORY_SAVE;
    }
}
