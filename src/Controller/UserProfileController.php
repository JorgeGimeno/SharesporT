<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserProfileController extends AbstractController
{
    /**
     * @Route("/user/profile", name="user_profile")
     */
    public function traerUsuarios(int $id)
    {
        $p = $this->getDoctrine()->getRepository(StUsuarios::class);
        $idResult = $p->findById($id);

        return $this->render('user_profile/index.html.twig', [
            'arrayId' => $idResult,
         
            
        ]);
    }
}
