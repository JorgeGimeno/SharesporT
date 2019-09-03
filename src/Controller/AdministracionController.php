<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdministracionController extends AbstractController
{
    /**
     * @Route("/administracion", name="administracion")
     */
    public function index()
    {
        return $this->render('/administracion/index.html.twig', [
            'controller_name' => 'AdministracionController',
        ]);
    }
}
