<?php

namespace App\Controller;

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

        $ciudadObtenida;
        $deporteObtenidad;
        $bandera = false;

        $form = $this->createForm(FiltroBusquedaType::class);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid()){

            $bandera = true;

            $deporte = $req->query->get('deportes');
            $ciudad = $req->query->get('ciudades');

            $ciudadObtenidad = "entro if ciudad submit";
            $deporteObtenidad = "entro if deporte submit";

            return $this->redirectToRoute('filtro_busqueda');

        }

        if(!$bandera){
            $ciudadObtenidad = "esperando submit ciudad";
            $deporteObtenidad = "esperando submit deporte";
        }

        return $this->render('filtro_busqueda/index.html.twig', [
            'form' => $form->createView(),
            'deporte' => $deporteObtenidad,
            'ciudad' => $ciudadObtenidad,
        ]);
    }
}
