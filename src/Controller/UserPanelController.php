<?php

namespace App\Controller;

use App\Entity\StUsuarios;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserPanelController extends AbstractController
{
    /**
     * @Route("/userpanel/{id}", name="userpanel", methods={"GET"})
     */
    public function traerUsuarios(int $id)
    {
        $p = $this->getDoctrine()->getRepository(StUsuarios::class);
        $idResult = $p->findOneBy(array('id'=>$id));

        return $this->render('user_panel/index.html.twig', [
            'Usuario' => $idResult,
            

        ]);
    }
}
