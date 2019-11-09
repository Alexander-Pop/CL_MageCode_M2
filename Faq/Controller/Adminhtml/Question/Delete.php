<?php

namespace Codelegacy\Faq\Controller\Adminhtml\Question;

use Codelegacy\Faq\Api\Repository\QuestionRepositoryInterface;
use Codelegacy\Faq\Helper\AclNames;
use Codelegacy\Faq\Controller\Adminhtml\AbstractDeleteAction;

class Delete extends AbstractDeleteAction
{
    /**
     * @return string
     */
    protected function _getACLName(): string
    {
        return AclNames::ACL_QUESTION_DELETE;
    }

    /**
     * @return string
     */
    protected function _getRepositoryClass(): string
    {
        return QuestionRepositoryInterface::class;
    }
}