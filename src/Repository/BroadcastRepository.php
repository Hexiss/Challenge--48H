<?php

namespace App\Repository;

use App\Entity\Broadcast;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Broadcast|null find($id, $lockMode = null, $lockVersion = null)
 * @method Broadcast|null findOneBy(array $criteria, array $orderBy = null)
 * @method Broadcast[]    findAll()
 * @method Broadcast[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BroadcastRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Broadcast::class);
    }

    // /**
    //  * @return Broadcast[] Returns an array of Broadcast objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Broadcast
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
