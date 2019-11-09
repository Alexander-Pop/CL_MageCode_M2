<?php

namespace Codelegacy\Faq\Controller\Adminhtml\Question;

use Magento\Backend\Model\View\Result\Page;
use Codelegacy\Faq\Helper\AclNames;
use Codelegacy\Faq\Controller\Adminhtml\AbstractIndexAction;

class Index extends AbstractIndexAction
{
    protected function _setResultPageParams(Page &$resultPage)
    {
        $resultPage->setActiveMenu('Codelegacy_Faq::question');
        $resultPage->addBreadcrumb(__('FAQ Questions'), __('FAQ Questions'));
        $resultPage->addBreadcrumb(__('Manage'), __('Manage'));
        $resultPage->getConfig()->getTitle()->prepend(__('FAQ Questions'));
    }

    /**
     * @return string
     */
    protected function _getACLName(): string
    {
        return AclNames::ACL_QUESTION_VIEW;
    }
}