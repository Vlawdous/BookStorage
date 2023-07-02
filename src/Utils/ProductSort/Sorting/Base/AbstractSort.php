<?php

namespace App\Utils\ProductSort\Sorting\Base;

use App\Utils\ProductSort\Helper\SortOptions;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;

abstract class AbstractSort
{
    protected EntityManager $entityManager;

    protected SortOptions $sortOption;

    public function __construct(EntityManager $entityManager, SortOptions $sortOption)
    {
        $this->entityManager = $entityManager;
        $this->sortOption = $sortOption;
    }


    abstract public function addSort(QueryBuilder $qb): QueryBuilder;

}