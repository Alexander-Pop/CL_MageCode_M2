<?php

namespace Codelegacy\Faq\Controller\Adminhtml\Category;

use Magento\Backend\Model\View\Result\Page;
use Codelegacy\Faq\Helper\AclNames;
use Codelegacy\Faq\Controller\Adminhtml\AbstractIndexAction;

class Index extends AbstractIndexAction
{
    protected function _setResultPageParams(Page &$resultPage)
    {
        $resultPage->setActiveMenu('Codelegacy_Faq::category');
        $resultPage->addBreadcrumb(__('FAQ Categories'), __('FAQ Categories'));
        $resultPage->addBreadcrumb(
            __('Manage'), __('Manage')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('FAQ Categories'));
    }

    /**
     * @return string
     */
    protected function _getACLName(): string
    {
        return AclNames::ACL_CATEGORY_VIEW;
    }
}