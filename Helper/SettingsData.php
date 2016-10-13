<?php
namespace PCAPredict\Tag\Helper;

class SettingsData extends \Magento\Framework\App\Helper\AbstractHelper
{

	/** @var \Magento\Framework\Escaper */
	protected $escaper;
    
	/**
	 * @param \Magento\Framework\App\Helper\Context $context
	 * @param \Magento\Framework\Escaper $escaper
	 */
	public function __construct(
		\Magento\Framework\App\Helper\Context $context,
		\Magento\Framework\Escaper $escaper
	) {
		$this->escaper = $escaper;
		parent::__construct($context);
	}

    /**
     * @return array|string
     */
    public function getAccountCode()
    {
        return $this->escaper->escapeHtml(
            $this->scopeConfig->getValue(
                'pca_settings_section/settings/account_code',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            )
        );
    }

    /**
     * @return string|null
     */
    public function getFieldMappings() 
    {
        return $this->scopeConfig->getValue(
            'pca_settings_section/settings/field_mappings',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }


    /**
     * @return string|null
     */
    public function getCustomJavaScript()
    {
        return $this->scopeConfig->getValue(
            'pca_settings_section/settings/custom_javascript',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
