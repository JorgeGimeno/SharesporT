<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FiltroBusquedaController extends AbstractController
{
    /**
     * @Route("/filtro_busqueda", name="filtro_busqueda")
     */
    public function index(Request $req)
    {


        return $this->render('filtro_busqueda/index.html.twig', [
            'controller_name' => 'FiltroBusquedaController',
        ]);
    }
}
