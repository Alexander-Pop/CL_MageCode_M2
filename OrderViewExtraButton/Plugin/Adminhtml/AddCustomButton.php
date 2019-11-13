<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\OrderViewExtraButton\Plugin\Adminhtml;

use Magento\Backend\Block\Widget\Button\Toolbar\Interceptor;
use Magento\Framework\View\Element\AbstractBlock;
use Magento\Backend\Block\Widget\Button\ButtonList;

class AddCustomButton
{
    /**
     * @param \Magento\Backend\Block\Widget\Button\Toolbar\Interceptor $subject
     * @param \Magento\Framework\View\Element\AbstractBlock $context
     * @param \Magento\Backend\Block\Widget\Button\ButtonList $buttonList
     */
    public function beforePushButtons(
        Interceptor $subject,
        AbstractBlock $context,
        ButtonList $buttonList
    ) {
        if ($context->getRequest()->getFullActionName() == 'sales_order_view') {
            $url = $context->getUrl('codelegacy_orderviewextrabutton/order/index');
            $buttonList->add(
                'customButton',
                [
                    'label' => __('Do Something'), 
                    'onclick' => 'setLocation("' . $url . '")', 
                    'class' => 'reset'
                ],
                -1
            );
        }
    }
}