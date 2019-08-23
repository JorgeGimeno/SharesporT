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



    // Devuelve un array de los últimos $numeroPosts publicados
    public function postsOrdenadosPorFecha(int $numeroPosts)
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.fechaHora', 'DESC')
            ->setMaxResults($numeroPosts)
            ->getQuery()
            ->getResult()
        ;
    }



    // Devuelve un array de los últimos $numeroPosts publicados del deporte con id $id_deporte
    public function postsDeporte(int $id_deporte, int $numeroPosts)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.idDeporte = :id_d')
            ->setParameter('id_d',$id_deporte)
            ->orderBy('s.fechaHora', 'DESC')
            ->setMaxResults($numeroPosts)
            ->getQuery()
            ->getResult()
        ;
    }


    //Devuelve un array de los últimos $numeroPosts publicados por el usuario con id $id_usuario
    public function postsDeUsuario(int $id_usuario, int $numeroPosts)
    {
        return $this->createQueryBuilder('s')
        ->andWhere('s.idUsuario = :id_u')
        ->setParameter('id_u',$id_usuario)
        ->orderBy('s.fechaHora', 'DESC')
        ->setMaxResults($numeroPosts)
        ->getQuery()
        ->getResult()
    ;
    }


    //Devuelve el número de post que ha publicado el usuario de id $id_usuario
    public function numeroDePostDeUsuario(int $id_usuario)
    {
        return $this->createQueryBuilder('s')
        ->andWhere('s.idUsuario = :id_u')
        ->setParameter('id_u',$id_usuario)
        ->getQuery()
        ->getScalarResult()
    ;
    }
}
