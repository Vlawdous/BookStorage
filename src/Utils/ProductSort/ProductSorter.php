<?php

namespace App\Utils\ProductSort;

use App\Utils\ProductSort\Exception\UnknownCategorySorting;
use App\Utils\ProductSort\Exception\UnknownProductTypeForPseudoCategory;
use App\Utils\ProductSort\Exception\UnknownPseudoCategorySorting;
use App\Utils\ProductSort\Exception\UnknownIndexSorting;
use App\Utils\ProductSort\Sorting\Base\AbstractSort;
use App\Utils\ProductSort\Helper\SortOptions;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;
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

    public function addSort(QueryBuilder $qb): QueryBuilder
    {
        if ($this->sortOptions->hasIndexSorting()) {
            $qb = $this->addIndexSort();

            if ($this->sortOptions->hasCategorySorting()) {
                $qb = $this->addCategorySorting($qb);
            }
        }

        if ($this->sortOptions->isSortingByPseudoCategory()) {
            $qb = $this->addPseudoCategorySort();
        }

        return $qb;
    }

    private function addIndexSort(): QueryBuilder
    {
        $qb = $this->handleSelectiveSorts(SortConfig::INDEX_SORTING_CLASSES);

        if (!$qb) {
            throw new UnknownIndexSorting();
        }

        return $qb;
    }

    private function addCategorySorting(QueryBuilder $qb): QueryBuilder
    {
        $categorySorts = SortConfig::CATEGORY_SORTING_CLASSES;

        if (!$categorySort = $categorySorts[$this->sortOptions->getProductType()]) {
            throw new UnknownCategorySorting();
        }

        return (new $categorySort($qb, $this->entityManager, $this->sortOptions))->addSort();
    }

    private function addPseudoCategorySort(QueryBuilder $qb): QueryBuilder
    {
        $productType = strtolower($this->sortOptions->getProductType());
        if (!in_array($productType, SortConfig::PSEUDO_CATEGORY_SORTING_CLASSES)) {
            throw new UnknownProductTypeForPseudoCategory();
        }

        $sortingClasses = SortConfig::PSEUDO_CATEGORY_SORTING_CLASSES[$productType];

        $qb = $this->handleSelectiveSorts($sortingClasses);

        if (!$qb) {
            throw new UnknownPseudoCategorySorting();
        }

        return $qb;
    }

    private function handleSelectiveSorts(array $sorts): ?QueryBuilder
    {
        foreach ($sorts as $sortingClass) {
            if ($sortingClass::isCurrentSorting($this->sortOptions)) {
                /**
                 * @var AbstractSort $sortingClass
                 */
                $sortingClass = new $sortingClass($this->entityManager, $this->sortOptions);

                return $sortingClass->addSort();
            }
        }

        return null;
    }
}