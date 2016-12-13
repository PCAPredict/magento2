<?php
namespace PCAPredict\Tag\Model\ResourceModel\SettingsData;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('PCAPredict\Tag\Model\SettingsData','PCAPredict\Tag\Model\ResourceModel\SettingsData');
    }
}
