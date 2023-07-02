<?php

namespace App\Utils\ProductSort\Sorting\Index\CategorySorting;

use App\Utils\ProductSort\Sorting\Base\AbstractSort;
use Doctrine\ORM\QueryBuilder;

class StationeryCategorySort extends AbstractSort
{
    public function addSort($qb): QueryBuilder
    {
        return $qb->where("st.category = {$this->sortOption->getCategoryId()}");
    }
}