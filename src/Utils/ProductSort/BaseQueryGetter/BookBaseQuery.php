<?php

namespace App\Utils\ProductSort\BaseQueryGetter;

use App\Utils\ProductSort\BaseQueryGetter\Base\AbstractBaseQueryGetter;
use Doctrine\ORM\QueryBuilder;

class BookBaseQuery extends AbstractBaseQueryGetter
{
    function getBaseQuery(): QueryBuilder
    {
        $columns = 'b.id, p.name, p.price, p.imageSrc, b.publisher, b.circulation';

        return $this->entityManager->createQueryBuilder()
            ->select($columns)
            ->addSelect('AVG(r.ratingValue) as avgRating')
            ->from('App:Book\BookProduct', 'b')
            ->innerJoin('b.product', 'p')
            ->leftJoin('p.ratings', 'r')
            ->groupBy($columns);
    }
}