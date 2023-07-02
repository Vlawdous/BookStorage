<?php

namespace App\Utils\ProductSort\Sorting\Index;

use App\Utils\ProductSort\Helper\SortOptions;
use App\Utils\ProductSort\Sorting\Base\SelectiveSort;
use Doctrine\ORM\QueryBuilder;

class PriceSort extends SelectiveSort
{
    public static function isCurrentSorting(SortOptions $sortOption): bool
    {
        return $sortOption->getIndex() === 'Price';
    }

    public function addSort(QueryBuilder $qb): QueryBuilder
    {
        return $qb->addOrderBy('p.price', strtoupper($this->sortOption->getMode()));
    }
}