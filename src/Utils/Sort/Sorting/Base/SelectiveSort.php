<?php

namespace App\Utils\Sort\Sorting\Base;

use App\Utils\Sort\Helper\SortOptions;

abstract class SelectiveSort extends AbstractSort
{
    abstract public static function isCurrentSorting(SortOptions $sortOption): bool;
}