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
            switch($action) 
            {
                case 'logout':
                    try
                    {
                        $settings = $this->settingsDataFactory->create();
                        $collection = $settings->getCollection();
                        $data = $collection->getData();
                        if ($data)
                        {
                            $settingsData = $settings->load(1);
                            $settingsData->setAccountCode('');
                            $settingsData->setAccountToken('');
                            
                            $settingsData->save();
                        }
                        $this->messageManager->addSuccess( __('You have successfully logged out from PCA Predict!') );
                    }
                    catch(\Exception $e)
                    {
                        $this->messageManager->addError( __('There was a problem logging out of PCA Predict!') );
                    }
                    break;

                case 'save':
                    $accCode = $this->getRequest()->getParam('account_code');
                    $accTok = $this->getRequest()->getParam('account_token');
                    $customjavascriptfront = $this->getRequest()->getParam('custom_javascript_front');
                    $customjavascriptback = $this->getRequest()->getParam('custom_javascript_back');

                    $settings = $this->settingsDataFactory->create();

                    try 
                    {
                        $settingsData = $settings->load(1);
                        $settingsData->setAccountCode($accCode);
                        $settingsData->setAccountToken($accTok);
                        $settingsData->setCustomJavascriptFront($customjavascriptfront);
                        $settingsData->setCustomJavascriptBack($customjavascriptback);

                        $settingsData->save();
                    }
                    catch(\Exception $ex) 
                    {
                        var_dump($ex.getMessage);
                    }
                    break;
                default:
                    throw new \Exception("Invalid action: " . $action);
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