<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class AnunciosController extends AbstractController
{
    /**
     * @Route("/anuncios", name="anuncios")
     * @IsGranted("ROLE_USER")
     */
    public function index()
    {
        return $this->render('anuncios/index.html.twig', [
            'controller_name' => 'AnunciosController',
        ]);
    }
}
