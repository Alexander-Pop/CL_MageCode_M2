<?php

namespace Codelegacy\Faq\Controller\Adminhtml\Category;

use Magento\Backend\Model\View\Result\Page;
use Codelegacy\Faq\Api\Data\BaseInterface;
use Codelegacy\Faq\Api\Repository\CategoryRepositoryInterface;
use Codelegacy\Faq\Controller\Adminhtml\AbstractEditAction;
use Codelegacy\Faq\Helper\AclNames;

class Edit extends AbstractEditAction
{
    /**
     * @return string
     */
    protected function _getACLName(): string
    {
        return AclNames::ACL_CATEGORY_VIEW;
    }

    protected function _getRegisterName(): string
    {
        return 'faq_category';
    }

    /**
     * @return string
     */
    protected function _getRepositoryClass(): string
    {
        return CategoryRepositoryInterface::class;
    }

    /**
     * @param Page $resultPage
     * @param BaseInterface $model
     * @return Page
     */
    protected function _initAction(Page $resultPage, BaseInterface $model)
    {
        $id = $model->getId();
        $resultPage->setActiveMenu('Codelegacy_Faq::category')
            ->addBreadcrumb(__('Faq'), __('Faq'))
            ->addBreadcrumb(__('Manage'), __('Manage'));

        $resultPage->addBreadcrumb(
            $id ? __('Edit') : __('New'),
            $id ? __('Edit') : __('New')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Category'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getTitle() : __('New category'));

        return $resultPage;
    }


}