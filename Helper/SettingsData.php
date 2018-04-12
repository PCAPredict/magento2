<?php

namespace PCAPredict\Tag\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Escaper;
use Magento\Framework\Module\ModuleListInterface;

use PCAPredict\Tag\Model\SettingsDataFactory;

class SettingsData extends AbstractHelper
{
	protected $escaper;
    
    protected $settingsDataFactory;

    protected $moduleListInterface;

	public function __construct(Context $context, Escaper $escaper, SettingsDataFactory $settingsDataFactory, ModuleListInterface $moduleListInterface) {
		$this->escaper = $escaper;
        $this->settingsDataFactory = $settingsDataFactory;
        $this->moduleListInterface = $moduleListInterface;
		parent::__construct($context);
    }
    
    public function getId() 
    {
        $lastLogin = $this->getLastLoginRow();
        return $lastLogin != null ? $lastLogin['pcapredict_tag_settingsdata_id'] : null;
    }
    
    public function getAccountCode() 
    {
        $lastLogin = $this->getLastLoginRow();
        return $lastLogin != null ? $lastLogin['account_code'] : null;
    }

    public function getModuleVersion()
    {
        return $this->moduleListInterface->getOne("PCAPredict_Tag")['setup_version'];
    }

    public function getAccountToken()
    {
        $lastLogin = $this->getLastLoginRow();
        return $lastLogin != null ? $lastLogin['account_token'] : null;
    }

    public function getCustomJavaScriptFront()
    {
        $lastLogin = $this->getLastLoginRow();
        return $lastLogin != null ? $lastLogin['custom_javascript_front'] : null;
    }

    public function getCustomJavaScriptBack()
    {
        $lastLogin = $this->getLastLoginRow();
        return $lastLogin != null ? $lastLogin['custom_javascript_back'] : null;
    }

    public function getModuleVersionLoggedInOn()
    {
        $lastLogin = $this->getLastLoginRow();
        return $lastLogin != null ? $lastLogin['module_version'] : null;
    }

    public function deleteRow($rowId)
    {
        $settings = $this->settingsDataFactory->create();
        $item = $settings->load($rowId);
        $item->delete();
    }

    private function getLastLoginRow() {

        $settings = $this->settingsDataFactory->create();
        $itemCollection = $settings->getCollection();
        $items = $itemCollection->getData();

        $lastCreationTime = null;
        $lastItemRow = null;

        foreach ($items as $item) {
            if ($lastCreationTime == null || $item['creation_time'] > $lastCreationTime)
            {
                $lastCreationTime = $item['creation_time'];
                $lastItemRow = $item;    
            }
        }

        return $lastItemRow;
    }
}