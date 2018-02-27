<?php 

namespace PCAPredict\Tag\Setup;
 
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

// Upgrade will only trigger if the setup_version in the module.xml is increased.
class UpgradeData implements UpgradeDataInterface {
 
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context ) {
        
        // Take all current records and set the current version of the app as the module_version.
        // Tidy up by taking either the row which has id 1 as this was what the old logic looked for.
        // If there is id=1 then simply keep the row with the latest creation time as this logic is what will 
        // be used when checking for credentials, even though one record will still only be needed.
        if (version_compare($context->getVersion(), '2.0.7') < 0) {

            $tableName = $setup->getTable('pcapredict_tag_settingsdata');

            $select = $setup->getConnection()->select()->from($tableName);

            $result = $setup->getConnection()->fetchAll($select);

            foreach ($result as $row) 
            {
                // Set the new module_version column with the current of the app.
                // Because we do not know what vesion they logged in under set to the last version will have to do.
                $setup->updateTableRow($tableName, 'id', $row['id'], 'module_version', $context->getVersion());
            }

            $select = $setup->getConnection()->select()->from($tableName)->where('id = 1');

            $row = $this->setup->getConnection()->fetchOne($select);

            var_dump($row);

            $select2 = $setup->getConnection()->select()->from($tableName)->where('id = 2');

            $row2 = $this->setup->getConnection()->fetchOne($select2);

            var_dump($row2);
        }
    }
}