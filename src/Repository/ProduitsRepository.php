<?php

namespace App\Repository;

use App\Entity\Produits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Produits|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produits|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produits[]    findAll()
 * @method Produits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produits::class);
    }

    // /**
    //  * @return Produits[] Returns an array of Produits objects
    //  */

    public function findProduit($value)
    {
        return $this->createQueryBuilder('p')

            ->innerJoin('p.zip', 'z', 'WITH', ' z.id = p.zip')
            ->innerJoin('p.typeProduit', 't', 'WITH', ' t.id = p.typeProduit')
            ->innerJoin('p.locAchat', 'l', 'WITH', ' l.id = p.locAchat')

            ->andWhere('p.adresse = :val')
            ->orWhere('p.prixHt like :val')
            ->orWhere('p.nombreChambre like :val')
            ->orWhere('p.surface like :val')
            ->orWhere('p.longitude like :val')
            ->orWhere('p.latitude like :val')
            ->orWhere('p.dateDeCreation like :val')
            ->orWhere('p.description like :val')
            ->orWhere('z.zip like :val')
            ->orWhere('t.typeProduit like :val')
            ->orWhere('l.locAchat like :val')
            ->orWhere('p.prix like :val')
            ->orWhere('p.nom like :val')

            ->setParameter('val', '%'.$value.'%')
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Produits
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findAllVisibleQuery()
    {return $this->createQueryBuilder('p')
        ->getQuery()
        ->getResult();
    }

    public function rechercheProduit($champs){
        $result = $this->createQueryBuilder('p');
        if($champs->getLocAchat() != null ){
            $result->andWhere('p.LocAchat=:locAchat')
                ->setParameter('locAchat', $champs->getLocAchat()->getId());

        }
        if($champs->getTypeProduits() != null ){
            $result->andWhere('p.typeProduits=:typeProduit')
                ->setParameter('typeProduit', $champs->getTypeProduits()->getId());
        }
        if($champs->getNombreChambre() != null ){
            $result->andWhere('p.nombreChambre>=:nombreChambre')
                ->setParameter('nombreChambre', $champs->getNombreChambre());

        }
        if($champs->getVille() != null ){
            $result->andWhere('p.ville=:zip')
                ->setParameter('zip', $champs->getVille()->getId());

        }
        if($champs->getPrixHt() != null ){
            $result->andWhere('p.prixHt<=:prixHt')
                ->setParameter('prixHt', $champs->getPrixHt());
        }
        return $result->getQuery()->getResult();
    }
}
