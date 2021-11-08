<?php

namespace App\Repository;

use App\Entity\Gravite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gravite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gravite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gravite[]    findAll()
 * @method Gravite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GraviteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gravite::class);
    }

    // /**
    //  * @return Gravite[] Returns an array of Gravite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gravite
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
