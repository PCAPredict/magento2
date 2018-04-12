<?php

namespace PCAPredict\Tag\Controller\Adminhtml\Settings;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\HTTP\ZendClientFactory;
use Magento\Framework\Message\ManagerInterface;
use PCAPredict\Tag\Model\SettingsDataFactory;

class Index extends Action {
        
    protected $resultPageFactory;
    protected $settingsDataFactory;
    protected $httpClientFactory;

    public function __construct(Context $context,
                                PageFactory $resultPageFactory, 
                                SettingsDataFactory $settingsDataFactory, 
                                ZendClientFactory $httpClientFactory)
    {
        $this->resultPageFactory = $resultPageFactory; 
        $this->settingsDataFactory = $settingsDataFactory;  
        $this->httpClientFactory = $httpClientFactory;

        return parent::__construct($context);
    }
        
    public function execute(){

        if ($this->getRequest()->isAjax()) 
        {
            $action = $this->getRequest()->getParam('action');

            if($action == 'save')
            {
                $customjavascriptfront = $this->getRequest()->getParam('custom_javascript_front');
                $customjavascriptback = $this->getRequest()->getParam('custom_javascript_back');

                $settings = $this->settingsDataFactory->create();

                try 
                {
                    $settings = $this->settingsDataFactory->create();
                    $itemCollection = $settings->getCollection();
                    $items = $itemCollection->getData();
    
                    $lastCreationTime = null;
                    $lastItemRow = null;
    
                    foreach ($items as $item) {
                        if ($lastCreationTime == null || $lastCreationTime < $item['creation_time'])
                        {
                            $lastCreationTime = $item['creation_time'];
                            $lastItemRow = $item;    
                        }
                    }

                    $settings->load($lastItemRow['pcapredict_tag_settingsdata_id']);

                    $settings->setCustomJavascriptFront($customjavascriptfront);
                    $settings->setCustomJavascriptBack($customjavascriptback);

                    $settings->save();
                }
                catch(\Exception $ex) 
                {
                    var_dump($ex.getMessage);
                }
            }
        }

        $page = $this->resultPageFactory->create();
        $page->setActiveMenu('PCAPredict_Tag::Settings');
        $page->getConfig()->getTitle()->prepend(__('PCA Predict Settings'));
        return $page; 
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('PCAPredict_Tag::Settings');
    }
}