<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnunciosController extends AbstractController
{
    /**
     * @Route("/anuncios", name="anuncios")
     */
    public function index()
    {
        return $this->render('anuncios/index.html.twig', [
            'controller_name' => 'AnunciosController',
        ]);
    }
}
