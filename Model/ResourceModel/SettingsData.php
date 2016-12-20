<?php
namespace PCAPredict\Tag\Model\ResourceModel;
class SettingsData extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('pcapredict_tag_settingsdata','pcapredict_tag_settingsdata_id');
    }
}
