<?php
namespace Codelegacy\ControllerForward\Block;

class ThankYouMessage extends \Magento\Framework\View\Element\Template
{
    public function getThankYouMessage()
    {
        $product = $this->getRequest()->getParam('product');
        $tranxId = $this->getRequest()->getParam('tranxId');

        $message = 'Thank you for your purchase! <br/>' .
                   'Product: ' . $product . ' <br/> ' .
                   'Transaction ID:' . $tranxId;

        return $message;

    }
}
