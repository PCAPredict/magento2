<?php 

namespace PCAPredict\Tag\Setup;
 
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

// Upgrade will only trigger if the setup_version in the module.xml is increased.
class UpgradeData implements UpgradeDataInterface {
 
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context ) {
        
        // Take all current records and set the current version of the app as the module_version.
        // We now fetch a record based on the last created time and not an id.
        // This means any customer with multiple rows can expire all the session keys and will fix the bug where it was looking for a row with a particular id.
        if (version_compare($context->getVersion(), '2.0.7') < 0) {

            $tableName = $setup->getTable('pcapredict_tag_settingsdata');

            $select = $setup->getConnection()->select()->from($tableName);

            $result = $setup->getConnection()->fetchAll($select);

            foreach ($result as $row) 
            {
                // Set the new module_version column with the current of the app.
                // Because we do not know what vesion they logged in under set to the last version will have to do.
                $setup->updateTableRow($tableName, 'pcapredict_tag_settingsdata_id', $row['pcapredict_tag_settingsdata_id'], 'module_version', $context->getVersion());
            }
        }
    }
}