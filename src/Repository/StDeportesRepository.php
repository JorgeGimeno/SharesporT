<?php

namespace App\Repository;

use App\Entity\StDeportes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StDeportes|null find($id, $lockMode = null, $lockVersion = null)
 * @method StDeportes|null findOneBy(array $criteria, array $orderBy = null)
 * @method StDeportes[]    findAll()
 * @method StDeportes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StDeportesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StDeportes::class);
    }

    // /**
    //  * @return StDeportes[] Returns an array of StDeportes objects
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
    public function findOneBySomeField($value): ?StDeportes
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
