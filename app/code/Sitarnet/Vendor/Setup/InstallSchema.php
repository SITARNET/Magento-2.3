<?php namespace Sitarnet\Vendor\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        /**
         * Create table 'sitarnet_vendor'
         */

        $tableName = $installer->getTable('sitarnet_vendor');
        $tableComment = 'Vendor of product';
        $columns = [
            'entity_id' => [
                'type' => Table::TYPE_INTEGER,
                'size' => null,
                'options' => ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'comment' => 'Vendor Id',
            ],
            'name' => [
                'type' => Table::TYPE_TEXT,
                'size' => 255,
                'options' => ['nullable' => false, 'default' => ''],
                'comment' => 'Vendor name',
            ],
            'description' => [
                'type' => Table::TYPE_TEXT,
                'size' => 2048,
                'options' => ['nullable' => false, 'default' => ''],
                'comment' => 'Vendor description',
            ],
        ];

        $indexes =  [
            // No index for this table
        ];

        $foreignKeys = [
            // No foreign keys for this table
        ];

        /**
         *  We can use the parameters above to create our table
         */

        // Table creation
        $table = $installer->getConnection()->newTable($tableName);

        // Columns creation
        foreach ($columns as $name => $values) {
            $table->addColumn(
                $name,
                $values['type'],
                $values['size'],
                $values['options'],
                $values['comment']
            );
        }

        // Indexes creation
        foreach ($indexes as $index) {
            $table->addIndex(
                $installer->getIdxName($tableName, [$index]),
                [$index]
            );
        }

        // Foreign keys creation
        foreach ($foreignKeys as $column => $foreignKey) {
            $table->addForeignKey(
                $installer->getFkName($tableName, $column, $foreignKey['ref_table'], $foreignKey['ref_column']),
                $column,
                $foreignKey['ref_table'],
                $foreignKey['ref_column'],
                $foreignKey['on_delete']
            );
        }

        // Table comment
        $table->setComment($tableComment);

        // Execute SQL to create the table
        $installer->getConnection()->createTable($table);

        // End Setup
        $installer->endSetup();
    }
}
