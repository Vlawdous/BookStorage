<?php

namespace App\Utils\Pagination\Factory;

use App\Utils\Pagination\Paginator;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PaginatorFactory
{
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function create(QueryBuilder $qb, ?int $pageSize = null): Paginator
    {
        if ($pageSize == null) {
            $pageSize = $this->container->getParameter('app.page_size');
        }

        return new Paginator($qb, $pageSize);
    }
}