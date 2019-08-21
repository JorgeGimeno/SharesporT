<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EditarDatosUsuarioController extends AbstractController
{
    /**
     * @Route("/editar/datos/usuario", name="editar_datos_usuario")
     */
    public function index()
    {
        return $this->render('editar_datos_usuario/index.html.twig', [
            'controller_name' => 'EditarDatosUsuarioController',
        ]);
    }
}
