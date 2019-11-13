<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\OrderViewExtraButton\Controller\Adminhtml\Order;


class Index extends \Magento\Sales\Controller\Adminhtml\Order
{
    /**
     * Execute action
     *
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        // In case you want to do something with the order
        $order = $this->_initOrder();
        $resultRedirect = $this->resultRedirectFactory->create();
        try {
            // TODO: Do something with the order
            $this->messageManager->addSuccessMessage(__('We did something!'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }

        return $resultRedirect->setPath(
            'sales/order/view', 
            [ 
                'order_id' => $order->getId() 
            ]
        );
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Codelegacy_OrderViewExtraButton::order_dosomething');
    }
}