<?php

namespace App\Utils\Sort\Sorter;

use App\Utils\Sort\Exception\NotFoundCategoryForProductType;
use App\Utils\Sort\Exception\UnknownCategorySorting;
use App\Utils\Sort\Exception\UnknownIndexSorting;
use App\Utils\Sort\Helper\SortConfig;
use App\Utils\Sort\Sorter\Base\AbstractSorter;
use App\Utils\Sort\Sorting\Base\AbstractSort;
use Doctrine\ORM\QueryBuilder;

class ProductSorter extends AbstractSorter
{
    public function addSort(QueryBuilder $qb): QueryBuilder
    {
        if ($this->sortOptions->hasIndexSorting()) {
            $qb = $this->addIndexSort($qb);
        }

        if ($this->sortOptions->hasCategorySorting()) {
            if ($this->sortOptions->isSortingByPseudoCategory()) {
                $qb = $this->addPseudoCategorySort($qb);
            } else {
                $qb = $this->addCategorySort($qb);
            }
        }

        return $qb;
    }

    private function addIndexSort(QueryBuilder $qb): QueryBuilder
    {
        $qb = $this->handleSorts(SortConfig::INDEX_SORTING_CLASSES, $qb);

        if (!$qb) {
            throw new UnknownIndexSorting();
        }

        return $qb;
    }

    private function addCategorySort(QueryBuilder $qb): QueryBuilder
    {
        $productType = strtolower($this->sortOptions->getProductType());
        if (!in_array($productType, SortConfig::CATEGORY_SORTING_CLASSES)) {
            throw new NotFoundCategoryForProductType();
        }

        $sortingClassName = SortConfig::CATEGORY_SORTING_CLASSES[$productType];

        return (new $sortingClassName())->addSort($qb);
    }

    private function addPseudoCategorySort(QueryBuilder $qb): QueryBuilder
    {
        $productType = strtolower($this->sortOptions->getProductType());
        if (!in_array($productType, SortConfig::PSEUDOCATEGORY_SORTING_CLASSES)) {
            throw new NotFoundCategoryForProductType();
        }

        $sortingClasses = SortConfig::PSEUDOCATEGORY_SORTING_CLASSES[$productType];

        $qb = $this->handleSorts($sortingClasses, $qb);

        if (!$qb) {
            throw new UnknownCategorySorting();
        }

        return $qb;
    }

    private function handleSorts(array $sorts, QueryBuilder $qb): ?QueryBuilder
    {
        foreach ($sorts as $sortingClass) {
            if ($sortingClass::isCurrentSorting($this->sortOptions, $qb)) {
                /**
                 * @var AbstractSort $sortingClass
                 */
                $sortingClass = new $sortingClass($this->sortOptions, $qb);

                return $sortingClass->addSort();
            }
        }

        return null;
    }
}