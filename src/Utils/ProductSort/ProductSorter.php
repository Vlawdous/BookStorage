<?php

namespace App\Utils\ProductSort;

use App\Utils\ProductSort\Exception\NotFoundBaseQueryForProductType;
use App\Utils\ProductSort\Exception\UnknownCategorySorting;
use App\Utils\ProductSort\Exception\UnknownIndexSorting;
use App\Utils\ProductSort\Exception\UnknownProductTypeForPseudoCategory;
use App\Utils\ProductSort\Exception\UnknownPseudoCategorySorting;
use App\Utils\ProductSort\Helper\SortConfig;
use App\Utils\ProductSort\Helper\SortOptions;
use App\Utils\ProductSort\Sorting\Base\AbstractSort;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;

class ProductSorter
{
    protected SortOptions $sortOptions;

    protected EntityManager $entityManager;

    public function __construct(EntityManager $entityManager, SortOptions $sortOptions)
    {
        $this->entityManager = $entityManager;
        $this->sortOptions = $sortOptions;
    }

    public function addSort(): QueryBuilder
    {
        $qb = $this->getBasePartQuery();

        if ($this->sortOptions->hasIndexSorting()) {
            $qb = $this->addIndexSort($qb);

            if ($this->sortOptions->hasCategorySorting()) {
                $qb = $this->addCategorySorting($qb);
            }
        }

        if ($this->sortOptions->hasPseudoCategorySorting()) {
            $qb = $this->addPseudoCategorySort();
        }

        return $qb;
    }

    private function getBasePartQuery(): QueryBuilder
    {
        $baseClasses = SortConfig::BASE_QUERY_CLASSES;
        $productType = strtolower($this->sortOptions->getProductType());

        if (!$baseClasses[$productType]) {
            throw new NotFoundBaseQueryForProductType();
        }

        return (new $baseClasses[$productType])->getBaseQuery();
    }

    private function addIndexSort(QueryBuilder $qb): QueryBuilder
    {
        foreach (SortConfig::INDEX_SORTING_CLASSES as $sortingClass) {
            if ($sortingClass::isCurrentSorting($this->sortOptions)) {
                /**
                 * @var AbstractSort $sortingClass
                 */
                $sortingClass = new $sortingClass($this->entityManager, $this->sortOptions);

                return $sortingClass->addSort($qb);
            }
        }

        throw new UnknownIndexSorting();
    }

    private function addCategorySorting(QueryBuilder $qb): QueryBuilder
    {
        $categorySorts = SortConfig::CATEGORY_SORTING_CLASSES;

        if (!$categorySort = $categorySorts[$this->sortOptions->getProductType()]) {
            throw new UnknownCategorySorting();
        }

        return (new $categorySort($this->entityManager, $this->sortOptions))->addSort($qb);
    }

    private function addPseudoCategorySort(): QueryBuilder
    {
        $productType = strtolower($this->sortOptions->getProductType());
        if (!in_array($productType, SortConfig::PSEUDO_CATEGORY_SORTING_CLASSES)) {
            throw new UnknownProductTypeForPseudoCategory();
        }

        foreach (SortConfig::PSEUDO_CATEGORY_SORTING_CLASSES[$productType] as $sortingClass) {
            if ($sortingClass::isCurrentSorting($this->sortOptions)) {
                /**
                 * @var AbstractSort $sortingClass
                 */
                $sortingClass = new $sortingClass($this->entityManager, $this->sortOptions);

                return $sortingClass->addSort();
            }
        }

        throw new UnknownPseudoCategorySorting();
    }
}