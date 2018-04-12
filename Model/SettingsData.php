<?php

namespace PCAPredict\Tag\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

class SettingsData extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'pcapredict_tag_settingsdata';

    protected function _construct()
    {
        $this->_init('PCAPredict\Tag\Model\ResourceModel\SettingsData');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
