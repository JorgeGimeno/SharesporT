<?php

namespace App\Repository;

use App\Entity\StUsuarios;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StUsuarios|null find($id, $lockMode = null, $lockVersion = null)
 * @method StUsuarios|null findOneBy(array $criteria, array $orderBy = null)
 * @method StUsuarios[]    findAll()
 * @method StUsuarios[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StUsuariosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StUsuarios::class);
    }

    // /**
    //  * @return StUsuarios[] Returns an array of StUsuarios objects
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
    public function findOneBySomeField($value): ?StUsuarios
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findById($id)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
        ;
    }

    

}
