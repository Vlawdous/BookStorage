<?php

namespace App\Utils\ProductSort\Sorting\Index\CategorySorting;

use App\Utils\ProductSort\Sorting\Base\AbstractSort;
use Doctrine\ORM\QueryBuilder;

class BookCategorySort extends AbstractSort
{
    public function addSort($qb): QueryBuilder
    {
        return $qb->where("b.category = {$this->sortOption->getCategoryId()}");
    }
}