<?php
/* Glory to Ukraine! Glory to the heros! */

declare(strict_types = 1);
//https://dev.to/robdwaller/how-php-type-declarations-actually-work-1mm5

namespace Codelegacy\SuccessAccess\Block\Adminhtml\System\Config;

use Magento\Backend\Block\Template\Context;
use Codelegacy\SuccessAccess\Model\Config;
use Psr\Log\LoggerInterface;

class CreateNewKey extends \Magento\Config\Block\System\Config\Form\Field
{
    /**
     * @var string
     */
    protected $_template = 'Codelegacy_SuccessAccess::system/config/createnewkey.phtml';

    /**
     * @var Config
     */
    private $config;

    protected $logger;

    public function __construct(
        Context $context,
        Config $config,
        LoggerInterface $logger,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->config = $config;
        $this->logger = $logger;
    }

    public function getButtonHtml(): string
    {
        $button = $this->getLayout()->createBlock(
            \Magento\Backend\Block\Widget\Button::class
        )->setData(
            [
                'id' => 'refresh-success-page-debug-seckey',
                'label' => __('Generate New Key'),
            ]
        );

        return $button->toHtml();
    }

    public function getAjaxUrl(): string
    {
        return $this->getUrl('*/system_config_system_dev_successaccess/refreshkey');
    }

    public function getSecureKey(): ?string
    {
        $keyLength = (int)$this->config->getSecureKeyLength();

        if (strlen($this->config->getSecureKey()) !== $keyLength) {
            return null;
        }

        return $this->config->getSecureKey();
    }

    /**
     * @param  \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return string
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        return $this->_toHtml();
    }
}
