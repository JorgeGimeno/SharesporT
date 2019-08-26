<?php

namespace App\Controller;

use App\Entity\StPosts;
use App\Entity\StUsuarios;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/muro" , name="/muro")
 */
class ShowController extends AbstractController
{
    /**
     * @Route("/listadoPost/{num}", name="listadoPost", methods={"GET"})
     */
    public function probarListadoPostUsuario(int $num)
    {
        /*
        $r = $this->getDoctrine()->getRepository(StUsuarios::class);
        $user = $r->findOneBy(['id' => $idUsuario]);*/
        

        $p = $this->getDoctrine()->getRepository(StPosts::class);
        $postResult = $p->postsOrdenadosPorFecha(5);


        return $this->render('st_posts/show.html.twig', [
            'arrayPost' => $postResult,
            //'usuario' => $user,
            
        ]);
    }    

}