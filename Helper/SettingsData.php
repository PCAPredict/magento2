<?php

namespace PCAPredict\Tag\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Escaper;

use PCAPredict\Tag\Model\SettingsDataFactory;

class SettingsData extends AbstractHelper
{
	protected $escaper;
    
    protected $settingsDataFactory;

	public function __construct(Context $context, Escaper $escaper, SettingsDataFactory $settingsDataFactory) {
		$this->escaper = $escaper;
        $this->settingsDataFactory = $settingsDataFactory;
		parent::__construct($context);
	}
    
    public function getAccountCode() 
    {
        $settings = $this->settingsDataFactory->create();
        $this->settingsData = $settings->load(1);
        return $this->escaper->escapeHtml(
            $this->settingsData->getAccountCode()
        );
    }

    public function getAccountToken()
    {
        $settings = $this->settingsDataFactory->create();
        $this->settingsData = $settings->load(1);
        return $this->settingsData->getAccountToken();
    }

    public function getCustomJavaScriptFront()
    {
        $settings = $this->settingsDataFactory->create();
        $this->settingsData = $settings->load(1);
        return $this->settingsData->getCustomJavascriptFront();
    }

    public function getCustomJavaScriptBack()
    {
        $settings = $this->settingsDataFactory->create();
        $this->settingsData = $settings->load(1);
        return $this->settingsData->getCustomJavascriptBack();
    }
}