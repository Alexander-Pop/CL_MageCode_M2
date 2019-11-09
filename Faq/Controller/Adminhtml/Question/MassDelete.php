<?php

namespace Codelegacy\Faq\Controller\Adminhtml\Question;

use Codelegacy\Faq\Api\Repository\QuestionRepositoryInterface;
use Codelegacy\Faq\Controller\Adminhtml\AbstractMassDelete;
use Codelegacy\Faq\Helper\AclNames;
use Codelegacy\Faq\Model\ResourceModel\Question\Collection as QuestionCollection;

class MassDelete extends AbstractMassDelete
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
    protected function _getCollectionClass(): string
    {
        return QuestionCollection::class;
    }

    /**
     * @return string
     */
    protected function _getRepositoryClass(): string
    {
        return QuestionRepositoryInterface::class;
    }
}