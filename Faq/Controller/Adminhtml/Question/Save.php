<?php

namespace Codelegacy\Faq\Controller\Adminhtml\Question;

use Codelegacy\Faq\Api\Data\QuestionInterface;
use Codelegacy\Faq\Api\Repository\QuestionRepositoryInterface;
use Codelegacy\Faq\Controller\Adminhtml\AbstractSaveAction;
use Codelegacy\Faq\Helper\AclNames;

class Save extends AbstractSaveAction
{
    /**
     * @return string
     */
    protected function _getACLName(): string
    {
        return AclNames::ACL_QUESTION_SAVE;
    }

    /**
     * @return string
     */
    protected function _getRepositoryClass(): string
    {
        return QuestionRepositoryInterface::class;
    }

    /**
     * @return string
     */
    protected function _getIdFieldName(): string
    {
        return QuestionInterface::KEY_ID;
    }

    /**
     * @param array $data
     */
    protected function _prepareData(array &$data)
    {
        $data[QuestionInterface::KEY_STORE_IDS] = implode(',', $data[QuestionInterface::KEY_STORE_IDS]);
    }
}