<?php

namespace App\Repository\Household;

use App\Entity\Household\HouseholdProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HouseholdProduct>
 *
 * @method HouseholdProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method HouseholdProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method HouseholdProduct[]    findAll()
 * @method HouseholdProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HouseholdProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HouseholdProduct::class);
    }

    public function save(HouseholdProduct $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(HouseholdProduct $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return HouseholdProduct[] Returns an array of HouseholdProduct objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?HouseholdProduct
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
