<?php

namespace App\Utils\ProductSort\BaseQueryGetter\Base;

use App\Utils\ProductSort\Helper\SortOptions;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;

abstract class ABaseQueryGetter
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