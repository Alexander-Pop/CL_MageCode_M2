<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\LoggerExample\Helper;

use Codelegacy\LoggerExample\Logger\Logger;
use Magento\Framework\App\Helper\Context;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var Logger
     */
    protected $logger;

    /**
     * @param Context $context
     * @param Logger $logger
     */
    public function __construct(
        Context $context,
        Logger $logger
    ) {
        parent::__construct($context);
        $this->logger = $logger;
    }

    public function sampleForUse()
    {
        $this->logger->addCritical('First test');
        $this->logger->addNotice('Second test');
    }
}