<?php

namespace App\Repository;

use App\Entity\ScreenGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ScreenGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScreenGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScreenGroup[]    findAll()
 * @method ScreenGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScreenGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScreenGroup::class);
    }

    // /**
    //  * @return ScreenGroup[] Returns an array of ScreenGroup objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ScreenGroup
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
