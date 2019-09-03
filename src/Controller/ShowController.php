<?php

namespace App\Controller;

use App\Entity\StPosts;
use App\Entity\StUsuarios;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


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
        

        $pr = $this->getDoctrine()->getRepository(StPosts::class);
        $arrayDePost = $pr->postsOrdenadosPorFecha(5);

        $tablaReacciones = [];
        foreach ($arrayDePost as $p){
            array_push($tablaReacciones, $p->cuentaReacciones());
        }
        
        

        return $this->render('st_posts/show.html.twig', [
            'arrayPost' => $arrayDePost,
            'reacciones' => $tablaReacciones,
            
        ]);
    }    

}