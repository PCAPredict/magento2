<?php

namespace PCAPredict\Tag\Block\Adminhtml;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\UrlInterface;

use PCAPredict\Tag\Model\SettingsDataFactory;

class Main extends Template
{
    protected $settingsDataFactory;
    protected $settingsData;
    protected $resultJsonFactory;
    protected $urlInterface;
    
    public function __construct(Context $context, SettingsDataFactory $settingsDataFactory, JsonFactory $resultJsonFactory)
    {
        $this->settingsDataFactory = $settingsDataFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        
        $this->urlInterface = $context->getUrlBuilder();

        parent::__construct($context);
    }

    function _prepareLayout()
    {
        $settings = $this->settingsDataFactory->create();
        $this->settingsData = $settings->load(1);
    }

    function execute()
    {

    }

    function getAjaxUrl()
    {
        return $this->urlInterface->getUrl();
    }
    
    function getAccountCode() 
    {   
        if ($this->settingsData)
            return $this->settingsData->getAccountCode();
        else
            return null;
    }

    function isLoggedIn()
    {
        return getAccountCode() != null;
    }
}