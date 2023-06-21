<?php

namespace App\Utils\ProductSort;

use App\Utils\ProductSort\Helper\SortOptions;
use Doctrine\ORM\EntityManager;

class ProductSorterFactory
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createSorter(SortOptions $sortOptions): ProductSorter
    {
        return new ProductSorter($this->entityManager, $sortOptions);
    }
}