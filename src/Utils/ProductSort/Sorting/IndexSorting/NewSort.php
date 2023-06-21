<?php

namespace App\Utils\ProductSort\Sorting\IndexSorting;

use App\Utils\ProductSort\Helper\SortOptions;
use App\Utils\ProductSort\Sorting\Base\IndexSort;
use Doctrine\ORM\QueryBuilder;

class NewSort extends IndexSort
{
    public static function isCurrentSorting(SortOptions $sortOption): bool
    {
        return $sortOption->getIndex() === 'New';
    }

    function sortForBook(): QueryBuilder
    {
        // TODO: Implement sortForBook() method.
    }

    function sortForHousehold(): QueryBuilder
    {
        // TODO: Implement sortForHousehold() method.
    }

    function sortForStationery(): QueryBuilder
    {
        // TODO: Implement sortForStationery() method.
    }
}