<?php
/* Glory to Ukraine! Glory to the heros! */

declare(strict_types = 1);

namespace Codelegacy\SuccessAccess\Controller\Adminhtml\System\Config\System\Dev\Successaccess;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Config\Model\ResourceModel\Config as ResourceConfig;
use Magento\Framework\Math\Random;
use Magento\Store\Model\Store;
use Codelegacy\SuccessAccess\Model\Config;
use Magento\Framework\App\Cache\TypeListInterface;

class Refreshkey extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Magento_Backend::system';

    /**
     * @var JsonFactory
     */
    private $jsonFactory;

    /**
     * @var ResourceConfig
     */
    private $resourceConfig;

    /**
     * @var Config
     */
    private $config;

    /**
     * @var Random
     */
    private $random;

    /**
     * @var TypeListInterface
     */
    private $cache;

    /**
     * @param Context $context
     * @param JsonFactory $jsonFactory
     * @param ResourceConfig $resourceConfig
     * @param Random $random
     * @param TypeListInterface $cache
     */
    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        ResourceConfig $resourceConfig,
        Config $config,
        Random $random,
        TypeListInterface $cache
    ) {
        parent::__construct($context);
        $this->jsonFactory    = $jsonFactory;
        $this->resourceConfig = $resourceConfig;
        $this->config         = $config;
        $this->random         = $random;
        $this->cache          = $cache;
    }

    public function execute(): \Magento\Framework\Controller\Result\Json
    {
        $key = $this->random->getRandomString($this->config->getSecureKeyLength());
        
        $this->resourceConfig->saveConfig(
            Config::PATH_SUCCESS_ACCESS_SECURE_KEY,
            $key,
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
            Store::DEFAULT_STORE_ID
        );

        $this->cache->cleanType('config');

        $jsonResponse = $this->jsonFactory->create();

        return $jsonResponse->setData(['key' => $key]);
    }
}
