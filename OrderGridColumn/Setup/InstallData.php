<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\OrderGridColumn\Setup;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Sales\Setup\SalesSetupFactory;
use Magento\Quote\Setup\QuoteSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallData implements InstallDataInterface
{
    /**
     * @var SalesSetupFactory
     */
    private $salesSetupFactory;

    /**
     * @var QuoteSetupFactory
     */
    private $quoteSetupFactory

    public function __construct(
        SalesSetupFactory $salesSetupFactory,
        QuoteSetupFactory $quoteSetupFactory
    ) {
        $this->salesSetupFactory = $salesSetupFactory;
        $this->quoteSetupFactory = $quoteSetupFactory;

    }

    /**
     * Function install
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(
        ModuleDataSetupInterface $setup, 
        ModuleContextInterface $context
    ) {
        $setup->startSetup();

        /** @var \Magento\Sales\Setup\SalesSetup $salesInstaller */
        $salesInstaller = $this->salesSetupFactory->create(
            [
                'resourceName' => 'sales_setup', 
                'setup' => $setup
            ]
        );

        $quoteInstaller = $this->quoteSetupFactory->create(
            [
                'resourceName' => 'quote_setup', 
                'setup' => $setup
            ]
        );

        $quoteInstaller
            ->addAttribute(
                // quote, quote_item, quote_address, quote_address_item, quote_address_rate and quote_payment
                'quote', 
                'erp_code', 
                [
                    'type' => Table::TYPE_TEXT, 
                    'length'=> 255, 
                    'visible' => false, 
                    'nullable' => true
                ]
            )->addAttribute(
                'quote', 
                'erp_status', 
                [
                    'type' => Table::TYPE_TEXT, 
                    'length'=> 255, 
                    'visible' => false, 
                    'nullable' => true
                ]
            );

        $salesInstaller
            ->addAttribute(
                // order, order_payment, order_item, order_address, order_status_history, invoice, invoice_item, etc.
                // see Magento/Sales/Setup/SalesSetup.php
                'order', 
                'erp_code', 
                [
                    'type' => Table::TYPE_TEXT,
                    'length'=> 255,
                    'visible' => false,
                    'nullable' => true,
                    'grid' => true
                ]
            )->addAttribute(
                'order', 
                'erp_status', 
                [
                    'type' => Table::TYPE_TEXT,
                    'length'=> 255,
                    'visible' => false,
                    'nullable' => true,
                    'grid' => true
                ]
            );

        $setup->endSetup();
    }
}