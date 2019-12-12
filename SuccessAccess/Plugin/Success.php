<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\SuccessAccess\Plugin;

use Codelegacy\SuccessAccess\Model\GenerateSuccessPage;
use Codelegacy\SuccessAccess\Model\Config;

class Success
{
    /**
     * @var GenerateSuccessPage
     */
    private $generateSuccessPage;

    /**
     * @var Config
     */
    private $config;

    /**
     * @param GenerateSuccessPage $generateSuccessPage
     * @param Config $config
     */
    public function __construct(
        GenerateSuccessPage $generateSuccessPage,
        Config $config
    ) {

        $this->generateSuccessPage = $generateSuccessPage;
        $this->config              = $config;
    }

    /**
     * @param \Magento\Checkout\Controller\Onepage\Success $subject
     * @param $result
     * @return \Magento\Framework\View\Result\Page
     */
    public function afterExecute(
        \Magento\Checkout\Controller\Onepage\Success $subject, 
        $result
    ) {
        if (!$this->config->isEnabled()) {
            return $result;
        }

        $request = $subject->getRequest();

        return $this->generateSuccessPage->execute(
            $request->getParam('order', ''), 
            $request->getParam('key', '')
        ) ?? $result;
    }
}
