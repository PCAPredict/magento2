<?php

namespace PCAPredict\Tag\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

use PCAPredict\Tag\Model\SettingsDataFactory;
use PCAPredict\Tag\Helper\SettingsData;

class InstallData implements InstallDataInterface
{
    protected $settingsDataFactory;

    protected $settingsHelper;
    
    public function __construct(SettingsDataFactory $settingsDataFactory, SettingsData $settingsHelper)
    {
        $this->settingsDataFactory = $settingsDataFactory;
        $this->settingsHelper = $settingsHelper;
    }
    
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        // No need to install any data, all customer set.
    }
}