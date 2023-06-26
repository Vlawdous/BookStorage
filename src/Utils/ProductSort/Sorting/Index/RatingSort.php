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
        $columns = $qb->getDQLPart('select');

        return $qb->leftJoin('p.rating', 'r')
            ->addSelect('AVG(r.value) as avgRating')
            ->addGroupBy($columns)
            ->orderBy('avgRating',  strtoupper($this->sortOption->getMode()));
    }
}