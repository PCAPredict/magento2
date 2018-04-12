<?php

namespace PCAPredict\Tag\Block\Adminhtml;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

use PCAPredict\Tag\Model\SettingsDataFactory;

class Main extends Template
{
    protected $settingsDataFactory;
    protected $settingsData;
    
    public function __construct(Context $context, SettingsDataFactory $settingsDataFactory)
    {
        $this->settingsDataFactory = $settingsDataFactory;

        parent::__construct($context);
    }

    function _prepareLayout()
    {
        
    }

    function execute()
    {

    }
}