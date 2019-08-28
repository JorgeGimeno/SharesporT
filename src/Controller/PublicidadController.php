<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PublicidadController extends AbstractController
{
    /**
     * @Route("/publicidad", name="publicidad")
     */
    public function index()
    {
        return $this->render('publicidad/index.html.twig', [
            'controller_name' => 'PublicidadController',
        ]);
    }
}
