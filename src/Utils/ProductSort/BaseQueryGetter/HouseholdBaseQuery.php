<?php

namespace App\Utils\ProductSort\BaseQueryGetter;

use App\Utils\ProductSort\BaseQueryGetter\Base\ABaseQueryGetter;
use Doctrine\ORM\QueryBuilder;

class HouseholdBaseQuery extends ABaseQueryGetter
{
    function getBaseQuery(): QueryBuilder
    {
        return $this->entityManager->createQueryBuilder()
            ->select('hh.id, p.name, p.price, p.imageSrc')
            ->from('App:Household\HouseholdProduct', 'hh')
            ->innerJoin('hh.product', 'p');
    }
}