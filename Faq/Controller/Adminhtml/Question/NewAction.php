<?php

namespace Codelegacy\Faq\Controller\Adminhtml\Question;

use Codelegacy\Faq\Helper\AclNames;
use Codelegacy\Faq\Controller\Adminhtml\AbstractNewAction;

class NewAction extends AbstractNewAction
{
    /**
     * @return string
     */
    protected function _getACLName(): string
    {
        return AclNames::ACL_QUESTION_SAVE;
    }
}
