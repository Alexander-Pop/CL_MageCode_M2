<?php
/* Glory to Ukraine! Glory to the heros! */

declare(strict_types = 1);

namespace Codelegacy\SuccessAccess\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    const PATH_SUCCESS_ACCESS_ENABLE     = 'sales/success_access/enable';
    const PATH_SUCCESS_ACCESS_SECURE_KEY = 'sales/success_access/secure_key';
    const SECURE_KEY_LENGTH              = 'sales/success_access/key_length';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    public function isEnabled(): bool
    {
        return (bool) $this->scopeConfig->getValue(
            static::PATH_SUCCESS_ACCESS_ENABLE, 
            ScopeInterface::SCOPE_STORE
        );
    }

    public function getSecureKeyLength()
    {
        return $this->scopeConfig->getValue(
            static::SECURE_KEY_LENGTH, 
            ScopeInterface::SCOPE_STORE
        ) ?? 12;
    }

    public function getSecureKey(): string
    {
        return $this->scopeConfig->getValue(
            static::PATH_SUCCESS_ACCESS_SECURE_KEY, 
            ScopeInterface::SCOPE_STORE
        ) ?? '';
    }
}
