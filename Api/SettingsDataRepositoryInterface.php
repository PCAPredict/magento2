<?php
namespace PCAPredict\Tag\Api;

use PCAPredict\Tag\Model\SettingsDataInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface SettingsDataRepositoryInterface 
{
    public function save(SettingsDataInterface $page);

    public function getById($id);

    public function getList(SearchCriteriaInterface $criteria);

    public function delete(SettingsDataInterface $page);

    public function deleteById($id);
}
