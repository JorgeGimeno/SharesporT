<?php

namespace App\Controller;

use App\Entity\StPosts;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("pruebas/bbdd")
 */
class PruebasBBDDController extends AbstractController
{
    /**
     * @Route("/", name="PruebasBBDDindex", methods={"GET"})
     */
    public function index()
    {
        return $this->render('pruebas_bbdd/index.html.twig', [
            'controller_name' => 'PruebasBBDDController',
        ]);
    }

    
    /**
     * @Route("/probarListadoPost/{num}", name="probarListadoPost", methods={"GET"})
     */
    public function probarListadoPost(int $num)
    {
        $r = $this->getDoctrine()->getRepository(StPosts::class);
        $posts = $r->postsOrdenadosPorFecha($num);
        return $this->render('pruebas_bbdd/pruebaListaPost.html.twig', [
            'posts' => $posts,
        ]);
    }
        
    /**
     * @Route("/probarListadoPostDeporte/{deporte}/{num}", name="probarListadoPostDeporte", methods={"GET"})
     */
    public function probarListadoPostDeporte(int $deporte, int $num)
    {
        $r = $this->getDoctrine()->getRepository(StPosts::class);
        $posts = $r->postsDeporte($deporte, $num);
        return $this->render('pruebas_bbdd/pruebaListaPostDeporte.html.twig', [
            'posts' => $posts,
            'deporte' => $deporte,
        ]);
    }
    
    /**
     * @Route("/probarListadoPostUsuario/{usuario}/{num}", name="probarListadoPostUsuario", methods={"GET"})
     */
    public function probarListadoPostUsuario(int $usuario, int $num)
    {
        $r = $this->getDoctrine()->getRepository(StPosts::class);
        $posts = $r->postsDeUsuario($usuario, $num);
        $numResults = $r->numeroDePostDeUsuario($usuario);
        return $this->render('pruebas_bbdd/pruebaListaPostUsuario.html.twig', [
            'posts' => $posts,
            'usuario' => $usuario,
            'nPostPorUsuario' => $numResults,
        ]);
    }     
}
