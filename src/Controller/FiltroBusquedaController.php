<?php

namespace App\Controller;

use App\Entity\DatosFiltro;
use App\Form\FiltroBusquedaType;
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
        $datos = new datosFiltro();

        $form = $this->createForm(FiltroBusquedaType::class, $datos);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid()){



            return $this->redirectToRoute('new_post');

        }

        return $this->render('filtro_busqueda/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
