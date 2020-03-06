<?php

namespace App\Repository;

use App\Entity\ParDate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ParDate|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParDate|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParDate[]    findAll()
 * @method ParDate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParDateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParDate::class);
    }

    // /**
    //  * @return ParDate[] Returns an array of ParDate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ParDate
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
