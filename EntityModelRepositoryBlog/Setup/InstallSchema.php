<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\EntityModelRepositoryBlog\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $table_codelegacy_blog_blog = $setup->getConnection()->newTable(
            $setup->getTable('codelegacy_blog_blog'));

        $table_codelegacy_blog_blog->addColumn(
            'blog_id',
            Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'nullable' => false,
                'primary' => true,
                'unsigned' => true,
            ],
            'Entity ID'
        );

        $table_codelegacy_blog_blog->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            [],
            'name'
        );

        $table_codelegacy_blog_blog->addColumn(
            'description',
            Table::TYPE_TEXT,
            null,
            [],
            'description'
        );

        $setup->getConnection()->createTable($table_codelegacy_blog_blog);
    }
}
