<?php

namespace App\Repository;

use App\Entity\Emarger;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Emarger>
 *
 * @method Emarger|null find($id, $lockMode = null, $lockVersion = null)
 * @method Emarger|null findOneBy(array $criteria, array $orderBy = null)
 * @method Emarger[]    findAll()
 * @method Emarger[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmargerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Emarger::class);
    }

    //    /**
    //     * @return Emarger[] Returns an array of Emarger objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Emarger
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
