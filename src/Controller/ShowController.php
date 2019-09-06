<?php

namespace App\Controller;

use App\Entity\StPosts;
use App\Entity\StUsuarios;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ShowController extends AbstractController
{
    // /**
    //  * @Route("/listadoPost/{num}", name="listadoPost", methods={"GET"})
    //  */
    // public function probarListadoPostUsuario(int $num)
    // {
    //     /*
    //     $r = $this->getDoctrine()->getRepository(StUsuarios::class);
    //     $user = $r->findOneBy(['id' => $idUsuario]);*/
        

    //     $p = $this->getDoctrine()->getRepository(StPosts::class);
    //     $postResult = $p->postsOrdenadosPorFecha(5);


    //     return $this->render('st_posts/show.html.twig', [
    //         'arrayPost' => $postResult,
    //         //'usuario' => $user,
            
    //     ]);
    // } 
    

    /**
    * @Route("/listadoPost/{currentPage}", name="listadoPost", methods={"GET"})
    */
    public function indexAction($currentPage = 1)
    {
        

        $deporte = 0;
        $ciudad = "0";
        $bandera = 0;

        $em = $this->getDoctrine()->getManager();

        $limit = 3;
        $post = $em->getRepository(StPosts::class)->postsOrdenadosPorFecha($currentPage, $limit);
        $postResult = $post['paginator'];
        $postQueryCompleta =  $post['query'];

        $maxPages = ceil($post['paginator']->count() / $limit);

        $tablaReacciones = [];
        foreach ($postResult as $p){
            array_push($tablaReacciones, $p->cuentaReacciones());
        } 
        $tablaMensajes = [];
        $repoPost =$em->getRepository(StPosts::class);
        foreach ($postResult as $p){
            array_push($tablaMensajes, $repoPost->numeroDeComentariosDeUnPost($p));
        } 

        return $this->render('st_posts/show.html.twig', array(
                'arrayPost' => $postResult, 
                'maxPages'=>$maxPages,
                'thisPage' => $currentPage,
                'all_items' => $postQueryCompleta,
                'reacciones' => $tablaReacciones,
                'bandera' => $bandera,
                'deporte' => $deporte,
                'ciudad' => $ciudad,
                'currentPage' => $currentPage,
                'NumerosComentarios' => $tablaMensajes,
            ) );
    }

}