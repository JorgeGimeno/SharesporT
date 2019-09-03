<?php

namespace App\Repository;

use App\Entity\StPosts;
use App\Entity\StUsuarios;
use App\Entity\StReacciones;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method StReacciones|null find($id, $lockMode = null, $lockVersion = null)
 * @method StReacciones|null findOneBy(array $criteria, array $orderBy = null)
 * @method StReacciones[]    findAll()
 * @method StReacciones[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StReaccionesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StReacciones::class);
    }

    // /**
    //  * @return StReacciones[] Returns an array of StReacciones objects
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
    public function findOneBySomeField($value): ?StReacciones
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function recuentoDeReacciones ()
    {
        return $this->createQueryBuilder('s')
        ->addSelect('id_post, reaccion, COUNT(reaccion)')
        ->addGroupBy('reaccion')
        ->setMaxResults(1000)
        ->getQuery()
        ->getResult()
    ;    
    }

    //Si existe la reaccion de un usuario a un post, devuelve la reaccion, si no, devuelve nulo
    public function existeReaccion(StUsuarios $usuario, StPosts $post): ?StReacciones
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.usuario = :user and s.post = :p')
            ->setParameter('user', $usuario)
            ->setParameter('p', $post)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    //Actualiza la reaccion de un usuario a un post concreto
    public function actualizarContenidoReaccion(StUsuarios $usuario, StPosts $post, String $reaccion)
    {
        return $this->createQueryBuilder('r')
            ->update()
            ->set('r.reaccion', ':reac')
            ->where('r.usuario = :user and r.post = :p')
            ->setParameter('user', $usuario)
            ->setParameter('p', $post)
            ->setParameter('reac',$reaccion)
            ->getQuery()
            ->execute()
        ;
    }
}
