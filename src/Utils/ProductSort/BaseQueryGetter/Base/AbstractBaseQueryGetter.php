<?php

namespace App\Utils\ProductSort\BaseQueryGetter\Base;

use App\Utils\ProductSort\Helper\SortOptions;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use Doctrine\ORM\QueryBuilder;

abstract class AbstractBaseQueryGetter
{
    protected EntityManager $entityManager;
    protected SortOptions $sortOptions;

    public function __construct(EntityManager $entityManager, SortOptions $sortOptions)
    {
        $this->entityManager = $entityManager;
        $this->sortOptions = $sortOptions;
    }

    abstract function getBaseQuery(): QueryBuilder;
}