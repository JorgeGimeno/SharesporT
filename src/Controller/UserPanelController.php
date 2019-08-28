<?php

namespace App\Controller;

use App\Entity\StUsuarios;
use Symfony\Component\Routing\Annotation\Route;
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

        return $this->render('user_panel/index.html.twig', [
            'Usuario' => $usuario,
            

        ]);
    }
}
