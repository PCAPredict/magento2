<?php

namespace PCAPredict\Tag\Model\ResourceModel\SettingsData;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('PCAPredict\Tag\Model\SettingsData','PCAPredict\Tag\Model\ResourceModel\SettingsData');
    }
}