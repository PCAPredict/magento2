<?php

namespace PCAPredict\Tag\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {        
        $setup->startSetup();

        $table = $setup->getConnection()
        ->newTable(
            $setup->getTable('pcapredict_tag_settingsdata')
            )
            ->addColumn(
                'pcapredict_tag_settingsdata_id',
                Table::TYPE_INTEGER,
                null,
                [ 'identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true ],
                'Id'
            )
            ->addColumn(
                'account_code',
                Table::TYPE_TEXT,
                10,
                [ 'nullable' => true ],
                'Account Code'
            )
            ->addColumn(
                'account_token',
                Table::TYPE_TEXT,
                36,
                [ 'nullable' => true ],
                'Account Token'
            )
            ->addColumn(
                'custom_javascript_front',
                Table::TYPE_TEXT,
                Table::MAX_TEXT_SIZE,
                [ 'nullable' => true ],
                'Custom JavaScript Frontend'
            )
            ->addColumn(
                'custom_javascript_back',
                Table::TYPE_TEXT,
                Table::MAX_TEXT_SIZE,
                [ 'nullable' => true ],
                'Custom JavaScript Backend'
            )
            ->addColumn(
                'creation_time',
                Table::TYPE_TIMESTAMP,
                null,
                [ 'nullable' => false, 'default' => Table::TIMESTAMP_INIT ],
                'Creation Time'
            )
            ->addColumn(
                'module_version',
                Table::TYPE_TEXT,
                16,
                [ 'nullable' => true ],
                'Created With App Version'
            );

        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
