<?php

namespace App\Repository;

use App\Entity\LocAchat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LocAchat|null find($id, $lockMode = null, $lockVersion = null)
 * @method LocAchat|null findOneBy(array $criteria, array $orderBy = null)
 * @method LocAchat[]    findAll()
 * @method LocAchat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocAchatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LocAchat::class);
    }

    // /**
    //  * @return LocAchat[] Returns an array of LocAchat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LocAchat
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
