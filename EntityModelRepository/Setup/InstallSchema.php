<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\EntityModelRepository\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * Function install
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(
        SchemaSetupInterface $setup, 
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        //START table setup
        $table = $installer->getConnection()->newTable(
            $installer->getTable('codelegacy_test_entity')
        )->addColumn(
            'entity_id',
            Table::TYPE_INTEGER,
            null,
            [
                'identity' => true, 
                'nullable' => false, 
                'primary' => true, 
                'unsigned' => true
            ],
            'Entity ID'
        )->addColumn(
            'title',
            Table::TYPE_TEXT,
            255,
            [
                'nullable' => false
            ],
            'Demo Title'
        );
        
        $installer->getConnection()->createTable($table);
    }
}
