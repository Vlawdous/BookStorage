<?php

namespace App\Utils\Sort\Sorting\Base;

use App\Utils\Sort\Helper\SortOptions;
use Doctrine\ORM\QueryBuilder;

abstract class AbstractSort
{
    private SortOptions $sortOption;

    private QueryBuilder $qb;

    public function __construct(SortOptions $sortOption, QueryBuilder $qb)
    {
        $this->sortOption = $sortOption;
        $this->qb = $qb;
    }


    public function addSort(): QueryBuilder
    {
        $this->preload();
        return $this->sort();
    }

    abstract protected function preload(): void;

    abstract protected function sort(): QueryBuilder;
}