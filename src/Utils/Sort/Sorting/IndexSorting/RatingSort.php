<?php

namespace App\Utils\Sort\Sorting\IndexSorting;

use App\Utils\Sort\Helper\SortOptions;
use App\Utils\Sort\Sorting\Base\SelectiveSort;
use Doctrine\ORM\QueryBuilder;

class RatingSort extends SelectiveSort
{

    public static function isCurrentSorting(SortOptions $sortOption): bool
    {
        return $sortOption->getIndex() === 'Rating';
    }

    protected function preload(): void
    {
        // TODO: Implement preload() method.
    }

    protected function sort(): QueryBuilder
    {
        // TODO: Implement sort() method.
    }
}