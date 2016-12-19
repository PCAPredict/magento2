<?php
    namespace PCAPredict\Tag\Controller\Adminhtml\Settings;
    class Index extends \Magento\Backend\App\Action{
        
        protected $resultPageFactory;
        protected $settingsDataFactory;

        /**
        * @var \Magento\Framework\HTTP\ZendClientFactory
        */
        protected $httpClientFactory;

        /**
        * @var \Magento\Framework\Message\ManagerInterface
        */
        protected $messageManager;

        public function __construct(
            \Magento\Backend\App\Action\Context         $context,
            \Magento\Framework\View\Result\PageFactory  $resultPageFactory,
            \PCAPredict\Tag\Model\SettingsDataFactory     $settingsDataFactory,
            \Magento\Framework\HTTP\ZendClientFactory   $httpClientFactory,
            \Magento\Framework\Message\ManagerInterface $messageManager
        )
        {
            $this->resultPageFactory = $resultPageFactory; 
            $this->settingsDataFactory = $settingsDataFactory;  
            $this->httpClientFactory = $httpClientFactory;
            $this->messageManager = $messageManager;
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
                                $settingsData->setPcaKey('');
                                
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
                        $pcaKey = $this->getRequest()->getParam('license_key');

                        $customjavascript = $this->getRequest()->getParam('custom_javascript');
                        $fieldmappings = $this->getRequest()->getParam('field_mappings');

                        $settings = $this->settingsDataFactory->create();
                        try 
                        {
                            $settingsData = $settings->load(1);
                            $settingsData->setAccountCode($accCode);
                            $settingsData->setAccountToken($accTok);
                            $settingsData->setPcaKey($pcaKey);

                            $settingsData->setfieldMappings($fieldmappings);
                            $settingsData->setCustomJavascript($customjavascript);

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
            return $this->_authorization->isAllowed('PCAPredict_Tag::settings');
        }
    }
