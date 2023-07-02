<?php

namespace App\Utils\ProductSort\Sorting\Index\CategorySorting;

use App\Utils\ProductSort\Sorting\Base\AbstractSort;
use Doctrine\ORM\QueryBuilder;

class HouseholdCategorySort extends AbstractSort
{
    public function addSort($qb): QueryBuilder
    {
        return $qb->where("hh.category = {$this->sortOption->getCategoryId()}");
    }
}