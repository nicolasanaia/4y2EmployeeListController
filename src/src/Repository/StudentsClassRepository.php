<?php

namespace App\Repository;

use App\Entity\StudentsClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StudentsClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentsClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentsClass[]    findAll()
 * @method StudentsClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentsClassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentsClass::class);
    }

    // /**
    //  * @return StudentsClass[] Returns an array of StudentsClass objects
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
    public function findOneBySomeField($value): ?StudentsClass
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
