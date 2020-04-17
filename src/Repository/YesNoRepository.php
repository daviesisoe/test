<?php

namespace App\Repository;

use App\Entity\YesNo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method YesNo|null find($id, $lockMode = null, $lockVersion = null)
 * @method YesNo|null findOneBy(array $criteria, array $orderBy = null)
 * @method YesNo[]    findAll()
 * @method YesNo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class YesNoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, YesNo::class);
    }

    // /**
    //  * @return YesNo[] Returns an array of YesNo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('y')
            ->andWhere('y.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('y.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?YesNo
    {
        return $this->createQueryBuilder('y')
            ->andWhere('y.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
