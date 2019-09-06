<?php

namespace App\Repository;

use App\Entity\StPosts;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

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

    // Devuelve los post paginados
    public function paginate($query, $page = 1, $limit = 3)
    {
        $paginator = new Paginator($query);

        $paginator->getQuery()
            ->setFirstResult($limit * ($page - 1)) // Offset
            ->setMaxResults($limit); // Limit

        return $paginator;  
    }

    // Devuelve un array de los últimos $numeroPosts publicados
    /**
     * @return StPosts[] Returns an array of StPosts objects
    */
    public function postsOrdenadosPorFecha($currentPage = 1, $limit = 3)
    {
        $query = $this->createQueryBuilder('p')
            ->andWhere('p.idPostPadre = :id')
            ->setParameter('id',-1)
            ->orderBy('p.fechaHora', 'DESC') 
            ->getQuery()
        ;
        
        $paginator = $this->paginate($query, $currentPage, $limit);

        return array(
            'paginator' => $paginator,
            'query' => $query
        );
    }


    // Devuelve un array de los últimos $numeroPosts publicados
    // public function postsOrdenadosPorFecha(int $numeroPosts)
    // {
    //     return $this->createQueryBuilder('p')
    //         ->orderBy('p.fechaHora', 'DESC')
    //         ->setMaxResults($numeroPosts)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }



    // Devuelve un array de los últimos $numeroPosts publicados del deporte con id $id_deporte
    public function postsDeporte(int $id_deporte, int $numeroPosts, $currentPage = 1, $limit = 3)
    {
        $query =  $this->createQueryBuilder('s')
            ->andWhere('s.deporte = :id_d')
            ->andWhere('s.idPostPadre = :id')
            ->setParameter('id',-1)
            ->setParameter('id_d',$id_deporte)
            ->orderBy('s.fechaHora', 'DESC')
            ->getQuery()
        ;

        $paginator = $this->paginarLista($query, $currentPage, $limit);
        return $paginator;
    }
    
     // Devuelve un array de los últimos $numeroPosts publicados de la ciudad con el nombre $ciudad
     public function postsCiudad(string $ciudad, int $numeroPosts, $currentPage = 1, $limit = 3)
     {
         $query = $this->createQueryBuilder('s')
            ->andWhere('u.ciudad = :ciudad')
            ->andWhere('s.idPostPadre = :id')
            ->setParameter('id',-1)
            ->setParameter('ciudad',$ciudad)
            ->join('s.usuario', 'u')
            ->orderBy('s.fechaHora', 'DESC')
            ->getQuery()
         ;

         $paginator = $this->paginarLista($query, $currentPage, $limit);
         return $paginator;
     }

     // Devuelve un array de los últimos $numeroPosts publicados de la ciudad con el nombre $ciudad
     // y con el id $id_deporte
     public function postsCiudadDeporte(string $ciudad, int $id_deporte, int $numeroPosts, $currentPage = 1, $limit = 3)
     {
        $query = $this->createQueryBuilder('s')
            ->andWhere('u.ciudad = :ciudad')
            ->andWhere('s.deporte = :id_d')
            ->andWhere('s.idPostPadre = :id')
            ->setParameter('id',-1)
            ->setParameter('ciudad',$ciudad)
            ->setParameter('id_d', $id_deporte)
            ->join('s.usuario', 'u')
            ->orderBy('s.fechaHora', 'DESC')
            ->getQuery()
         ;

        $paginator = $this->paginarLista($query, $currentPage, $limit);
        return $paginator;

     }

    //Devuelve un array de los últimos $numeroPosts publicados por el usuario con id $id_usuario
    public function postsDeUsuario(int $id_usuario, int $numeroPosts)
    {
        return $this->createQueryBuilder('s')
        ->andWhere('s.idUsuario = :id_u')
        ->andWhere('p.idPostPadre = :id')
        ->setParameter('id',-1)
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
        ->select('count(s.id)')
        ->andWhere('s.idUsuario = :id_u')
        ->setParameter('id_u',$id_usuario)
        ->getQuery()
        ->getSingleScalarResult()
    ;
    }

    public function paginarLista($query, $currentPage, $limit){

        $res = new Paginator($query);    
        if(count($res) > 1){
            $paginator = $this->paginate($query, $currentPage, $limit);

            return array(
                'paginator' => $paginator,
                'query' => $query,
                'bandera' => 0
            );
        } else {
            return array(
                'lista' => $query->getResult(),
                'bandera' => 1
            );
        }

        
    }

    public function numeroDeComentariosDeUnPost(StPosts $post)
    {
        return $this->createQueryBuilder('s')
        ->select('count(s.id)')
        ->andWhere('s.idPostPadre = :id_p')
        ->setParameter('id_p',$post->getId())
        ->getQuery()
        ->getSingleScalarResult()
    ;
    }

    //Devuelve el array de post que descienden de $id_post (comentarios a ese post)
    public function comentariosDeUnPost(int $id_post)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.id_post_padre = :val')
            ->setParameter('val', $id_post)
            ->orderBy('s.fechaHora', 'DESC')
            ->setMaxResults(100)
            ->getQuery()
            ->getResult()
        ;
    }
}
