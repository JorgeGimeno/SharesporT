<?php

namespace App\Controller;

use App\Entity\StUsuarios;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserPanelController extends AbstractController
{
    /**
     * @Route("/userpanel", name="userpanel", methods={"GET"})
     */
    public function traerUsuarios()
    {
        $p = $this->getDoctrine()->getRepository(StUsuarios::class);

        $usuario = $this->getUser();
        //$idResult = $p->findOneBy(array('id'=>$id));
        $image = base64_encode(stream_get_contents($usuario->getFoto()));
        return $this->render('user_panel/index.html.twig', [
            'Usuario' => $usuario,
            'foto'=>$image,
        ]);
    }
    
   
}
