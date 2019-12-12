<?php
/* Glory to Ukraine! Glory to the heros! */

declare(strict_types = 1);

namespace Codelegacy\SuccessAccess\Model;

use Magento\Checkout\Model\Session;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Sales\Model\OrderFactory;
use Magento\Sales\Model\Order;

class GenerateSuccessPage
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var OrderFactory
     */
    private $orderFactory;

    /**
     * @var Session
     */
    private $checkoutSession;

    /**
     * @var ManagerInterface
     */
    private $eventManager;

    /**
     * @var PageFactory
     */
    private $resultPageFactory;

    /**
     * @param Config $config
     * @param OrderFactory $orderFactory
     * @param Session $checkoutSession
     * @param ManagerInterface $eventManager
     * @param PageFactory $pageFactory
     */
    public function __construct(
        Config $config,
        OrderFactory $orderFactory,
        Session $checkoutSession,
        ManagerInterface $eventManager,
        PageFactory $pageFactory
    ) {
        $this->config            = $config;
        $this->orderFactory      = $orderFactory;
        $this->checkoutSession   = $checkoutSession;
        $this->eventManager      = $eventManager;
        $this->resultPageFactory = $pageFactory;
    }

    public function execute(
        string $incrementId = '', 
        string $key = ''
    ): ?\Magento\Framework\View\Result\Page //https://www.php.net/manual/en/functions.returning-values.php#functions.returning-values.type-declaration
    {
        $order = $this->loadOrder($incrementId, $key);
        if (!$order || !$order->getId()) {
            return null;
        }

        $this->checkoutSession->setLastRealOrderId($order->getIncrementId());
        $this->checkoutSession->setLastOrderId($order->getId());

        $resultPage = $this->resultPageFactory->create();

        $this->eventManager->dispatch(
            'checkout_onepage_controller_success_action',
            [
                'order_ids' => [
                    $order->getId()
                ]
            ]
        );

        return $resultPage;
    }

    private function loadOrder(
        string $incrementId, 
        string $key
    ): ?Order //https://www.php.net/manual/en/functions.returning-values.php#functions.returning-values.type-declaration
    {
        if (!$this->validateKey($key)) {
            return null;
        }

        /** @var Order $order */
        $order = $this->orderFactory->create();

        return $order->loadByIncrementId($incrementId);
    }

    private function validateKey(string $key): bool
    {
        $keyLength = (int)$this->config->getSecureKeyLength();
        return strlen($this->config->getSecureKey()) === $keyLength && $this->config->getSecureKey() === $key;
    }
}
