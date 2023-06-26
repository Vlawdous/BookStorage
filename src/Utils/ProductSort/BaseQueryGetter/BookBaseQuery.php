<?php

namespace App\Utils\ProductSort\BaseQueryGetter;

use App\Utils\ProductSort\BaseQueryGetter\Base\ABaseQueryGetter;
use Doctrine\ORM\QueryBuilder;

class BookBaseQuery extends ABaseQueryGetter
{
    function getBaseQuery(): QueryBuilder
    {
        return $this->entityManager->createQueryBuilder()
            ->select('b.id, p.name, p.price, p.imageSrc, b.publisher, b.circulation')
            ->from('App:Book\BookProduct', 'b')
            ->innerJoin('b.product', 'p');
    }
}