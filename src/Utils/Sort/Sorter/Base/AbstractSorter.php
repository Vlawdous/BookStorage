<?php

namespace App\Utils\Sort\Sorter\Base;

use App\Utils\Sort\Helper\SortOptions;
use Doctrine\ORM\QueryBuilder;

abstract class AbstractSorter
{
    protected SortOptions $sortOptions;

    public function __construct(SortOptions $sortOptions)
    {
        $this->sortOptions = $sortOptions;
    }

    abstract function addSort(QueryBuilder $qb): QueryBuilder;
}