<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\PaymentMethod\Model\Payment;

use Magento\Payment\Model\Method\AbstractMethod;
use Codelegacy\PaymentMethod\Block\Form\ExamplePayment;
use Codelegacy\PaymentMethod\Block\Info\ExamplePaymentInfo;

class Example extends AbstractMethod
{
    const CODE = 'example';

    /**
     * Payment method code
     *
     * @var string
     */
    protected $_code = self::CODE;

    /**
     * @var string
     */
    protected $_formBlockType = ExamplePayment::class;

    /**
     * @var string
     */
    protected $_infoBlockType = ExamplePaymentInfo::class;

    /**
     * Availability option
     *
     * @var bool
     */
    protected $_isOffline = true;

    /**
     * @param null $storeId
     * @return bool
     */
    public function isActive($storeId = null)
    {
        return true;
    }
}