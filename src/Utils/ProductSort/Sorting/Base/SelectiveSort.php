<?php

namespace App\Utils\ProductSort\Sorting\Base;

use App\Utils\ProductSort\Helper\SortOptions;

abstract class SelectiveSort extends AbstractSort
{
    abstract public static function isCurrentSorting(SortOptions $sortOption): bool;
}