<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\CrudModel\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Psr\Log\LoggerInterface;

class InstallSchema implements InstallSchemaInterface
{
    protected $logger;

    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function install(
    SchemaSetupInterface $setup, ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->debug('install schema');

        /**
         * Create table 'employee_details'
         */
        $table = $setup->getConnection()
            ->newTable($setup->getTable('employee_details'))
            ->addColumn(
                'employee_id',
                Table::TYPE_INTEGER, 
                null, 
                [
                    'identity' => true, 
                    'unsigned' => true, 
                    'nullable' => false, 
                    'primary' => true
                ], 
                'Employee Id'
            )
            ->addColumn(
                'employee_name',
                Table::TYPE_TEXT, 255,
                [
                    'nullable' => false, 
                    'default' => ''
                ], 
                'Employee Name'
            )
            ->addColumn(
                'employee_salary',
                Table::TYPE_DECIMAL, 
                '12,4', 
                [
                    'nullable' => false, 
                    'default' => '0.0000'
                ], 
                'Employee Salary'
            )
            ->addColumn(
                'employee_address',
                Table::TYPE_TEXT, 
                255, 
                [
                    'nullable' => false, 
                    'default' => ''
                ], 
                'Employee Name'
            )->setComment(
                "Employee details table"
            );

        $setup->getConnection()->createTable($table);

        $this->logger->info('finished install schema for employee_details');

        $setup->endSetup();
    }

}
