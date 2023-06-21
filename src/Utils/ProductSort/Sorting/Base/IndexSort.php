<?php

namespace App\Utils\ProductSort\Sorting\Base;

use App\Utils\ProductSort\Exception\UnknownProductTypeForIndexSorting;
use App\Utils\ProductSort\Helper\SortOptions;
use Doctrine\ORM\QueryBuilder;

abstract class IndexSort extends SelectiveSort
{

    public function addSort(): QueryBuilder
    {
        $productType = strtolower($this->sortOption->getProductType());
        switch($productType) {
            case 'book':
                return $this->sortForBook();
            case 'household':
                return $this->sortForHousehold();
            case 'stationery':
                return  $this->sortForStationery();
        }

        throw new UnknownProductTypeForIndexSorting();
    }

    abstract function sortForBook(): QueryBuilder;

    abstract function sortForHousehold(): QueryBuilder;

    abstract function sortForStationery(): QueryBuilder;
}