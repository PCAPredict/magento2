<?php

namespace PCAPredict\Tag\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class SettingsData extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('pcapredict_tag_settingsdata','pcapredict_tag_settingsdata_id');
    }
}
