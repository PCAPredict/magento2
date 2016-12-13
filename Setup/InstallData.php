<?php

namespace PCAPredict\Tag\Setup;
class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{
    protected $settingsDataFactory;

    /**
     * Init
     *
     * @param AuthorizationFactory $authFactory
     */
    public function __construct(\PCAPredict\Tag\Model\SettingsDataFactory     $settingsDataFactory)
    {
        $this->settingsDataFactory = $settingsDataFactory;
    }
    
    public function install(\Magento\Framework\Setup\ModuleDataSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $settingsHelper = $this->helper('PCAPredict\Tag\Helper\SettingsData');

        $settings = $this->settingsDataFactory->create();

        $settings->setAccountCode('');
        $settings->setAccountToken('');
        $settings->setfieldMappings($settingsHelper->getDefaultMappings());
        $settings->setCustomJavascript('');

        $settings->save();
    }
}
