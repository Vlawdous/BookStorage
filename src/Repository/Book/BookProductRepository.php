<?php

namespace App\Repository\Book;

use App\Entity\Base\Product;
use App\Entity\Base\Rating;
use App\Entity\Book\BookProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\QueryBuilder;
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
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookProduct::class);
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

    public function generatorNewHighRatingBooks(int $daysInterval)
    {
        $qb = $this->getNewHighRatingBooksQueryBuilder($daysInterval);
        foreach ($qb->getQuery()->toIterable() as $book) {
            yield $book;
        }
    }

    private function getNewHighRatingBooksQueryBuilder(int $daysInterval): QueryBuilder
    {
        $dateStartSearch = (new \DateTime("-{$daysInterval} days"));
        $selectingColumns = ['b.id', 'p.name', 'p.price', 'b.imageSrc', 'b.publisher', 'b.circulation'];

        $qb = $this->getBookQueryBuilder($selectingColumns);
        $qb = $this->addNewSelectable($qb, $dateStartSearch);
        $qb = $this->addRatingSorting($qb, $selectingColumns);

        return $qb;
    }

    private function getBookQueryBuilder(array $selectingColumns): QueryBuilder
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select($selectingColumns)
            ->distinct()        // Используется для возможности итерации
            ->from('App:Book\BookProduct', 'b')
            ->innerJoin('b.product', 'p');
    }

    private function addRatingSorting(QueryBuilder $qb, array $groupingColumns): QueryBuilder
    {
        return $qb
            ->addSelect('AVG(r.ratingValue) AS avgRating')
            ->innerJoin('p.ratings', 'r')
            ->groupBy(implode(',', $groupingColumns))
            ->orderBy('avgRating', 'DESC');
    }

    private function addNewSelectable(QueryBuilder $qb, \DateTime $dateStartSearch): QueryBuilder
    {
        return $qb->where($qb->expr()->gte('b.datePublicate', ':datePublicate'))
            ->setParameter('datePublicate', $dateStartSearch, Types::DATE_MUTABLE);
    }
}
