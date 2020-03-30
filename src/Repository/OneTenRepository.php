<?php

namespace App\Repository;

use App\Entity\OneTen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method OneTen|null find($id, $lockMode = null, $lockVersion = null)
 * @method OneTen|null findOneBy(array $criteria, array $orderBy = null)
 * @method OneTen[]    findAll()
 * @method OneTen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OneTenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OneTen::class);
    }

    // /**
    //  * @return OneTen[] Returns an array of OneTen objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OneTen
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
