<?php
namespace PCAPredict\Tag\Helper;

class SelectedCountries extends \Magento\Framework\App\Helper\AbstractHelper
{
	public function __construct(
        \Magento\Framework\App\Helper\Context $context, 
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
        parent::__construct($context);
		$this->_scopeConfig = $scopeConfig;
	} 
 
    public function getSelectedCountries(){
        $data = $this->_scopeConfig->getValue('general/country/allow', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return $data;
    }
}
