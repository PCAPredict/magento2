<?php

namespace PCAPredict\Tag\Controller\Adminhtml\Login;

use Magento\Backend\App\Action\Context;
use Magento\Backend\App\AbstractAction;
use Magento\Framework\Controller\Result\JsonFactory;

use PCAPredict\Tag\Model\SettingsDataFactory;

class Index extends AbstractAction {

    protected $settingsDataFactory;

	public function __construct(Context $context, JsonFactory $resultJsonFactory, SettingsDataFactory $settingsDataFactory) {
		$this->resultJsonFactory = $resultJsonFactory;
        $this->settingsDataFactory = $settingsDataFactory; 
        return parent::__construct($context);
	}

	public function execute() {
		$result = $this->resultJsonFactory->create();

        $accCode = $this->getRequest()->getParam('account_code');
        $accTok = $this->getRequest()->getParam('account_token');
        $settings = $this->settingsDataFactory->create();
        try 
        {
            $settingsData = $settings->load(1);
            $settingsData->setAccountCode($accCode);
            $settingsData->setAccountToken($accTok);
            $settingsData->save();
        }
        catch(\Exception $ex) 
        {
            return $result->setData(['success' => false]);
        }

		return $result->setData(['success' => true]);
	}
}