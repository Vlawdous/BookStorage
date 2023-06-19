<?php

namespace App\Utils\Pagination;

use App\Utils\Sort\Sorter\Base\AbstractSorter;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator as DoctrinePaginator;

class Paginator
{
    private ?\ArrayIterator $items = null;

    private ?int $numberPages = null;

    private ?int $currentPage = null;



    private QueryBuilder $qb;

    private ?AbstractSorter $sorter = null;

    private int $pageSize;

    public function __construct(QueryBuilder $qb, ?int $pageSize = null)
    {
        $this->qb = $qb;

        $pageSize = max(1, $pageSize);
        $this->pageSize = $pageSize;
    }

    public function setSorter(AbstractSorter $sorter): self
    {
        $this->sorter = $sorter;

        return $this;
    }

    public function paginate(int $page): self
    {
        $page = max(1, $page);
        $this->currentPage = $page;

        $first = ($page - 1) * $this->pageSize;

        $paginationQb = $this->qb
            ->setFirstResult($first)
            ->setMaxResults($this->pageSize);

        if ($this->sorter) {
            $paginationQb = $this->sorter->addSort($paginationQb);
        }

        $query = $paginationQb->getQuery();
        $paginator = new DoctrinePaginator($query, true);

        $this->numberPages = $paginator->count();
        $this->items = $paginator->getIterator();

        return $this;
    }

    /**
     * @return \ArrayIterator|null
     */
    public function getItems(): ?\ArrayIterator
    {
        return $this->items;
    }

    /**
     * @return int|null
     */
    public function getNumberPages(): ?int
    {
        return $this->numberPages;
    }

    /**
     * @return int|null
     */
    public function getCurrentPage(): ?int
    {
        return $this->currentPage;
    }
}