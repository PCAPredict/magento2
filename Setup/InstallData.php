<?php

namespace PCAPredict\Tag\Setup;
class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{
    protected $settingsDataFactory;

    protected $settingsHelper;
    
    public function __construct(\PCAPredict\Tag\Model\SettingsDataFactory $settingsDataFactory, \PCAPredict\Tag\Helper\SettingsData $settingsHelper)
    {
        $this->settingsDataFactory = $settingsDataFactory;
        $this->settingsHelper = $settingsHelper;
    }
    
    public function install(\Magento\Framework\Setup\ModuleDataSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $settings = $this->settingsDataFactory->create();

        $settings->setAccountCode('');
        $settings->setAccountToken('');
        $settings->setfieldMappings($this->settingsHelper->getDefaultMappings());
        $settings->setCustomJavascript('');

        $settings->save();
    }
}
