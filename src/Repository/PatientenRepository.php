<?php

namespace App\Repository;

use App\Entity\Patienten;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Patienten|null find($id, $lockMode = null, $lockVersion = null)
 * @method Patienten|null findOneBy(array $criteria, array $orderBy = null)
 * @method Patienten[]    findAll()
 * @method Patienten[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatientenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Patienten::class);
    }

    // /**
    //  * @return Patienten[] Returns an array of Patienten objects
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
    public function findOneBySomeField($value): ?Patienten
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
