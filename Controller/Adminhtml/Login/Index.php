<?php
namespace PCAPredict\Tag\Controller\Adminhtml\Login;
class Index extends \Magento\Backend\App\AbstractAction {

    protected $settingsDataFactory;

	/**
	 * @param \Magento\Backend\App\Action\Context $context
	 * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
	 */
	public function __construct(
		\Magento\Backend\App\Action\Context                 $context,
		\Magento\Framework\Controller\Result\JsonFactory    $resultJsonFactory,
        \PCAPredict\Tag\Model\SettingsDataFactory             $settingsDataFactory
	) {
		$this->resultJsonFactory = $resultJsonFactory;
        $this->settingsDataFactory = $settingsDataFactory; 
        return parent::__construct($context);
	}

	/**
	 * @return \Magento\Framework\Controller\Result\Json
	 */
	public function execute() {
		/** @var \Magento\Framework\Controller\Result\Json $result */
		$result = $this->resultJsonFactory->create();

        $accCode = $this->getRequest()->getParam('account_code');
        $accTok = $this->getRequest()->getParam('account_token');
        $pcaKey = $this->getRequest()->getParam('license_key');
        $settings = $this->settingsDataFactory->create();
        try 
        {
            $settingsData = $settings->load(1);
            $settingsData->setAccountCode($accCode);
            $settingsData->setAccountToken($accTok);
            $settingsData->setPcaKey($pcaKey);
            $settingsData->save();
        }
        catch(\Exception $ex) 
        {
            return $result->setData(['success' => false]);
        }

		return $result->setData(['success' => true]);
	}
}