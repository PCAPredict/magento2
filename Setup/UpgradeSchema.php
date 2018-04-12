<?php

namespace PCAPredict\Tag\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

// Upgrade will only trigger if the setup_version in the module.xml is increased.
class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context){
        
        $setup->startSetup();
  
        if(!$context->getVersion()) {
            // No previous version found.
        }
 
        if (version_compare($context->getVersion(), '2.0.7') < 0) {

            // Get module table
            $tableName = $setup->getTable('pcapredict_tag_settingsdata');

            // Check if the table already exists
            if ($setup->getConnection()->isTableExists($tableName) == true) {

                // Remove any columns we don't need.
                $setup->getConnection()->dropColumn($tableName, 'update_time');

                // Add the version column so we can record what version of the app the creds were created from.
                // In UpgradeData we set this column to the current version.
                $setup->getConnection()->addColumn($tableName, 'module_version',
                [
                    'type' => Table::TYPE_TEXT,
                    'length' => 16,
                    'nullable' => true,
                    'comment' => 'Created With App Version'
                ]);
            }
        }

        $setup->endSetup();
    }
}