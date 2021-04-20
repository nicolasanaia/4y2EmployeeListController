<?php

namespace App\Repository;

use App\Entity\Employee; 
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class EmployeeRepository extends ServiceEntityRepository 
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employee::class);
    }

    public function save(Employee $employee) {
        $em = $this->getEntityManager();
        $em->beginTransaction();
        $em->persist($employee);
        $em->commit();
        $em->flush();
    }
}