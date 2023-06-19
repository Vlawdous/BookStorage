<?php

namespace App\Repository\Book;

use App\Entity\Book\BookProduct;
use App\Utils\Pagination\Factory\PaginatorFactory;
use App\Utils\Pagination\Paginator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BookProduct>
 *
 * @method BookProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookProduct[]    findAll()
 * @method BookProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookProductRepository extends ServiceEntityRepository
{
    private PaginatorFactory $paginatorFactory;

    public function __construct(ManagerRegistry $registry, PaginatorFactory $paginatorFactory)
    {
        parent::__construct($registry, BookProduct::class);
        $this->paginatorFactory = $paginatorFactory;
    }

    public function save(BookProduct $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(BookProduct $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getBooksPaginator(): Paginator
    {
        $qb = $this->getEntityManager()
            ->createQueryBuilder()
            ->select(['b.id', 'p.name', 'p.price', 'p.imageSrc', 'b.publisher', 'b.circulation'])
            ->from('App:Book\BookProduct', 'b')
            ->innerJoin('b.product', 'p');

        return $this->paginatorFactory->create($qb);
    }
}
