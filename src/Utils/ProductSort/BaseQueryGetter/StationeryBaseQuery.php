<?php

namespace App\Utils\ProductSort\BaseQueryGetter;

use App\Utils\ProductSort\BaseQueryGetter\Base\AbstractBaseQueryGetter;
use Doctrine\ORM\QueryBuilder;

class StationeryBaseQuery extends AbstractBaseQueryGetter
{
    function getBaseQuery(): QueryBuilder
    {
        $columns = 'st.id, p.name, p.price, p.imageSrc';

        return $this->entityManager->createQueryBuilder()
            ->select($columns)
            ->addSelect('AVG(r.value) as avgRating')
            ->from('App:Stationery\StationeryProduct', 'st')
            ->innerJoin('st.product', 'p')
            ->leftJoin('p.ratings', 'r')
            ->groupBy($columns);
    }
}