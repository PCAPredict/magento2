<?php

namespace PCAPredict\Tag\Setup;

use Magento\Framework\Setup\UninstallInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class Uninstall implements UninstallInterface
{
    /**
     * Module uninstall code.
     * This will only run if uninstalled via composer.
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context) {
        
        $setup->startSetup();
        $setup->getConnection()->dropTable($connection->getTableName('pcapredict_tag_settingsdata'));
        $setup->endSetup();
    }
}