<?php

namespace App\Controller;

use App\Entity\StPosts;
use App\Entity\StReacciones;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
* @Route("/reaccionar", name="reaccionar")
*/
class ReaccionarController extends AbstractController
{
    /**
     * @Route("/reacc", name="reacc")
     */
    public function index()
    {
        return $this->render('reaccionar/index.html.twig', [
            'controller_name' => 'ReaccionarController',
        ]);
    }

    /**
     * @Route("/cambiarReaccion/{idPost}/{reacc}", name="molar", methods={"GET"})
     */
    public function cambiarReaccion(int $idPost, String $reacc)
    {
        $pr = $this->getDoctrine()->getRepository(StPosts::class);
        $post = $pr->find($idPost);

        $reacRepo = $this->getDoctrine()->getRepository(StReacciones::class);
        $r=$reacRepo->existeReaccion($this->getUser(),$post);

        if($r==null){//Anyade reaccion a base de datos
            $reaccion= new StReacciones;
            $reaccion->setUsuario($this->getUser());
            $reaccion->setReaccion($reacc);
            $reaccion->setPost($post);
    
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reaccion);
            $entityManager->flush();
        }else{//Actualiza reaccion de usuario a ese post en base de datos
            $reacRepo->actualizarContenidoReaccion($this->getUser(),$post,$reacc);
        }

        return new Response();

    }
}
