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
        $idResult = $p->findOneBy(array('id'=>201));

        return $this->render('user_panel/index.html.twig', [
            'Usuario' => $idResult,
            

        ]);
    }
}
