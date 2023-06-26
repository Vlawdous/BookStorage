<?php

namespace App\Utils\ProductSort\BaseQueryGetter;

use App\Utils\ProductSort\BaseQueryGetter\Base\ABaseQueryGetter;
use Doctrine\ORM\QueryBuilder;

class StationeryBaseQuery extends ABaseQueryGetter
{
    function getBaseQuery(): QueryBuilder
    {
        return $this->entityManager->createQueryBuilder()
            ->select('st.id, p.name, p.price, p.imageSrc')
            ->from('App:Stationery\StationeryProduct', 'st')
            ->innerJoin('st.product', 'p');
    }
}