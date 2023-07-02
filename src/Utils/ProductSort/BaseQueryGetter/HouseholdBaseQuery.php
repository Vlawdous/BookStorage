<?php

namespace App\Utils\ProductSort\BaseQueryGetter;

use App\Utils\ProductSort\BaseQueryGetter\Base\AbstractBaseQueryGetter;
use Doctrine\ORM\QueryBuilder;

class HouseholdBaseQuery extends AbstractBaseQueryGetter
{
    function getBaseQuery(): QueryBuilder
    {
        $columns = 'hh.id, p.name, p.price, p.imageSrc';

        return $this->entityManager->createQueryBuilder()
            ->select($columns)
            ->addSelect('AVG(r.value) as avgRating')
            ->from('App:Household\HouseholdProduct', 'hh')
            ->innerJoin('hh.product', 'p')
            ->leftJoin('p.ratings', 'r')
            ->groupBy($columns);
    }
}