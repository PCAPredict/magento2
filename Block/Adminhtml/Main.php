<?php
namespace PCAPredict\Tag\Block\Adminhtml;

class Main extends \Magento\Framework\View\Element\Template
{
    protected $settingsDataFactory;
    protected $settingsData;
    protected $resultJsonFactory;
    protected $urlInterface;
    
    public function __construct(
        \Magento\Framework\View\Element\Template\Context    $context,
        \PCAPredict\Tag\Model\SettingsDataFactory             $settingsDataFactory,
        \Magento\Framework\Controller\Result\JsonFactory    $resultJsonFactory,
        \Magento\Framework\UrlInterface                     $urlInterface
    )
    {
        $this->settingsDataFactory = $settingsDataFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->urlInterface = $urlInterface;
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