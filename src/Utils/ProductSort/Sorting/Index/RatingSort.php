<?php

namespace App\Utils\ProductSort\Sorting\Index;

use App\Utils\ProductSort\Helper\SortOptions;
use App\Utils\ProductSort\Sorting\Base\SelectiveSort;
use Doctrine\ORM\QueryBuilder;

class RatingSort extends SelectiveSort
{
    public static function isCurrentSorting(SortOptions $sortOption): bool
    {
        return $sortOption->getIndex() === 'Rating';
    }

    public function addSort(QueryBuilder $qb): QueryBuilder
    {
        return $qb->addOrderBy('avgRating',  strtoupper($this->sortOption->getMode()));
    }
}