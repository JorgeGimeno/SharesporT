<?php

namespace App\Repository;

use App\Entity\StPosts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StPosts|null find($id, $lockMode = null, $lockVersion = null)
 * @method StPosts|null findOneBy(array $criteria, array $orderBy = null)
 * @method StPosts[]    findAll()
 * @method StPosts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StPostsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StPosts::class);
    }

    // /**
    //  * @return StPosts[] Returns an array of StPosts objects
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
    public function findOneBySomeField($value): ?StPosts
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
