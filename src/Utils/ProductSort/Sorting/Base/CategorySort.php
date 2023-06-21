<?php

namespace App\Utils\ProductSort\Sorting\Base;

use App\Utils\ProductSort\Helper\SortOptions;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;

abstract class CategorySort extends AbstractSort
{
    protected QueryBuilder $qb;

    public function __construct(QueryBuilder $qb, EntityManager $entityManager, SortOptions $sortOption)
    {
        $this->qb = $qb;
        parent::__construct($entityManager, $sortOption);
    }
}