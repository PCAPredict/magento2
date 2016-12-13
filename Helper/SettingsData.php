<?php
namespace PCAPredict\Tag\Helper;

class SettingsData extends \Magento\Framework\App\Helper\AbstractHelper
{

	/**
	 * @var \Magento\Framework\Escaper
	 */
	protected $escaper;

    /**
     * @var \PCAPredict\Tag\Model\SettingsDataFactory
     */
    protected $settingsDataFactory;

	/**
	 * @param \Magento\Framework\App\Helper\Context $context
	 * @param \Magento\Framework\Escaper $escaper
     * @param \PCAPredict\Tag\Model\SettingsDataFactory $settingsDataFactory
	 */
	public function __construct(
		\Magento\Framework\App\Helper\Context       $context,
		\Magento\Framework\Escaper                  $escaper,
        \PCAPredict\Tag\Model\SettingsDataFactory     $settingsDataFactory
	) {
		$this->escaper = $escaper;
        $this->settingsDataFactory = $settingsDataFactory;
		parent::__construct($context);
	}
    
    
    
    public function getAccountCode() 
    {
        $settings = $this->settingsDataFactory->create();
        $this->settingsData = $settings->load(1);
        return $this->escaper->escapeHtml(
            $this->settingsData->getAccountCode()
        );
    }


    public function getAccountToken()
    {
        $settings = $this->settingsDataFactory->create();
        $this->settingsData = $settings->load(1);
        return $this->settingsData->getAccountToken();
    }
    
    
    public function getFieldMappings() 
    {
        $settings = $this->settingsDataFactory->create();
        $this->settingsData = $settings->load(1);
        return $this->settingsData->getFieldMappings();
    }


    public function getCustomJavaScript()
    {
        $settings = $this->settingsDataFactory->create();
        $this->settingsData = $settings->load(1);
        return $this->settingsData->getCustomJavascript();
    }


    public function getLicenseKey()
    {
        $settings = $this->settingsDataFactory->create();
        $this->settingsData = $settings->load(1);
        return $this->settingsData->getLicenseKey();
    }

    public function getDefaultMappings() 
    {
        return 'capturePlusMappings=[{element:"company",field:"{Company}",mode:7},{element:"street[0]",field:"{Line1}",mode:3},{element:"street[1]",field:"{Line2}",mode:2},{element:"city",field:"{City}",mode:2},{element:"region",field:"{Province}",mode:2},{element:"region_id",field:"{ProvinceName}",mode:2},{element:"postcode",field:"{PostalCode}",mode:3},{element:"country_id",field:"{CountryName}",mode:10},{element:"address[1][company]",field:"{Company}",mode:7},{element:"address[1][street][0]",field:"{Line1}",mode:3},{element:"address[1][street][1]",field:"{Line2}",mode:2},{element:"address[1][city]",field:"{City}",mode:2},{element:"address[1][region]",field:"{Province}",mode:2},{element:"address[1][region_id]",field:"{ProvinceName}",mode:2},{element:"address[1][postcode]",field:"{PostalCode}",mode:3},{element:"address[1][country_id]",field:"{CountryName}",mode:10},{element:"address[2][company]",field:"{Company}",mode:7},{element:"address[2][street][0]",field:"{Line1}",mode:3},{element:"address[2][street][1]",field:"{Line2}",mode:2},{element:"address[2][city]",field:"{City}",mode:2},{element:"address[2][region]",field:"{Province}",mode:2},{element:"address[2][region_id]",field:"{ProvinceName}",mode:2},{element:"address[2][postcode]",field:"{PostalCode}",mode:3},{element:"address[2][country_id]",field:"{CountryName}",mode:10},{element:"address[3][company]",field:"{Company}",mode:7},{element:"address[3][street][0]",field:"{Line1}",mode:3},{element:"address[3][street][1]",field:"{Line2}",mode:2},{element:"address[3][city]",field:"{City}",mode:2},{element:"address[3][region]",field:"{Province}",mode:2},{element:"address[3][region_id]",field:"{ProvinceName}",mode:2},{element:"address[3][postcode]",field:"{PostalCode}",mode:3},{element:"address[3][country_id]",field:"{CountryName}",mode:10},{element:"address[4][company]",field:"{Company}",mode:7},{element:"address[4][street][0]",field:"{Line1}",mode:3},{element:"address[4][street][1]",field:"{Line2}",mode:2},{element:"address[4][city]",field:"{City}",mode:2},{element:"address[4][region]",field:"{Province}",mode:2},{element:"address[4][region_id]",field:"{ProvinceName}",mode:2},{element:"address[4][postcode]",field:"{PostalCode}",mode:3},{element:"address[4][country_id]",field:"{CountryName}",mode:10},{element:"address[5][company]",field:"{Company}",mode:7},{element:"address[5][street][0]",field:"{Line1}",mode:3},{element:"address[5][street][1]",field:"{Line2}",mode:2},{element:"address[5][city]",field:"{City}",mode:2},{element:"address[5][region]",field:"{Province}",mode:2},{element:"address[5][region_id]",field:"{ProvinceName}",mode:2},{element:"address[5][postcode]",field:"{PostalCode}",mode:3},{element:"address[5][country_id]",field:"{CountryName}",mode:10},{element:"address[new_0][company]",field:"{Company}",mode:7},{element:"address[new_0][street][0]",field:"{Line1}",mode:3},{element:"address[new_0][street][1]",field:"{Line2}",mode:2},{element:"address[new_0][city]",field:"{City}",mode:2},{element:"address[new_0][region]",field:"{Province}",mode:2},{element:"address[new_0][region_id]",field:"{ProvinceName}",mode:2},{element:"address[new_0][postcode]",field:"{PostalCode}",mode:3},{element:"address[new_0][country_id]",field:"{CountryName}",mode:10},{element:"address[new_1][company]",field:"{Company}",mode:7},{element:"address[new_1][street][0]",field:"{Line1}",mode:3},{element:"address[new_1][street][1]",field:"{Line2}",mode:2},{element:"address[new_1][city]",field:"{City}",mode:2},{element:"address[new_1][region]",field:"{Province}",mode:2},{element:"address[new_1][region_id]",field:"{ProvinceName}",mode:2},{element:"address[new_1][postcode]",field:"{PostalCode}",mode:3},{element:"address[new_1][country_id]",field:"{CountryName}",mode:10},{element:"address[new_2][company]",field:"{Company}",mode:7},{element:"address[new_2][street][0]",field:"{Line1}",mode:3},{element:"address[new_2][street][1]",field:"{Line2}",mode:2},{element:"address[new_2][city]",field:"{City}",mode:2},{element:"address[new_2][region]",field:"{Province}",mode:2},{element:"address[new_2][region_id]",field:"{ProvinceName}",mode:2},{element:"address[new_2][postcode]",field:"{PostalCode}",mode:3},{element:"address[new_2][country_id]",field:"{CountryName}",mode:10},{element:"address[new_3][company]",field:"{Company}",mode:7},{element:"address[new_3][street][0]",field:"{Line1}",mode:3},{element:"address[new_3][street][1]",field:"{Line2}",mode:2},{element:"address[new_3][city]",field:"{City}",mode:2},{element:"address[new_3][region]",field:"{Province}",mode:2},{element:"address[new_3][region_id]",field:"{ProvinceName}",mode:2},{element:"address[new_3][postcode]",field:"{PostalCode}",mode:3},{element:"address[new_3][country_id]",field:"{CountryName}",mode:10},{element:"address[new_4][company]",field:"{Company}",mode:7},{element:"address[new_4][street][0]",field:"{Line1}",mode:3},{element:"address[new_4][street][1]",field:"{Line2}",mode:2},{element:"address[new_4][city]",field:"{City}",mode:2},{element:"address[new_4][region]",field:"{Province}",mode:2},{element:"address[new_0][region_id]",field:"{ProvinceName}",mode:2},{element:"address[new_4][postcode]",field:"{PostalCode}",mode:3},{element:"address[new_4][country_id]",field:"{CountryName}",mode:10}]; phoneMappings=[{element:"telephone",field:"{Phone}",mode:7},{element:"country_id",field:"{CountrySource}"},{element:"address[1][telephone]",field:"{Phone}",mode:7},{element:"address[1][country_id]",field:"{CountrySource}"},{element:"address[2][telephone]",field:"{Phone}",mode:7},{element:"address[2][country_id]",field:"{CountrySource}"},{element:"address[3][telephone]",field:"{Phone}",mode:7},{element:"address[3][country_id]",field:"{CountrySource}"},{element:"address[4][telephone]",field:"{Phone}",mode:7},{element:"address[4][country_id]",field:"{CountrySource}"},{element:"address[5][telephone]",field:"{Phone}",mode:7},{element:"address[5][country_id]",field:"{CountrySource}"},{element:"address[new_0][telephone]",field:"{Phone}",mode:7},{element:"address[new_0][country_id]",field:"{CountrySource}"},{element:"address[new_1][telephone]",field:"{Phone}",mode:7},{element:"address[new_1][country_id]",field:"{CountrySource}"},{element:"address[new_2][telephone]",field:"{Phone}",mode:7},{element:"address[new_2][country_id]",field:"{CountrySource}"},{element:"address[new_3][telephone]",field:"{Phone}",mode:7},{element:"address[new_3][country_id]",field:"{CountrySource}"},{element:"address[new_4][telephone]",field:"{Phone}",mode:7},{element:"address[new_4][country_id]",field:"{CountrySource}"}]; emailMappings=[{element:"customer-email",field:"{Email}",mode:7},{element:"email_address",field:"{Email}",mode:7},{element:"customer[email]",field:"{Email}",mode:7}];';
     }
}
