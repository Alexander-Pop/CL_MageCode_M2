<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\PaymentMethod\Model\ConfigProvider;

use Magento\Checkout\Model\ConfigProviderInterface;
use Codelegacy\PaymentMethod\Model\Payment\Example;

class ExampleConfigProvider implements ConfigProviderInterface
{
    const PAYMENT = 'payment';

    /**
     * @return array
     */
    public function getConfig()
    {
        return [self::PAYMENT => [Example::CODE => ['sample']]];
    }
}