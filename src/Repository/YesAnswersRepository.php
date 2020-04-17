<?php

namespace App\Repository;

use App\Entity\YesAnswers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method YesAnswers|null find($id, $lockMode = null, $lockVersion = null)
 * @method YesAnswers|null findOneBy(array $criteria, array $orderBy = null)
 * @method YesAnswers[]    findAll()
 * @method YesAnswers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class YesAnswersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, YesAnswers::class);
    }

    // /**
    //  * @return YesAnswers[] Returns an array of YesAnswers objects
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
    public function findOneBySomeField($value): ?YesAnswers
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
