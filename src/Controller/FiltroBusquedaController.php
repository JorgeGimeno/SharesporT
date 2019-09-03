<?php

namespace App\Controller;

use App\Entity\DatosFiltro;
use App\Form\FiltroBusquedaType;
use App\Repository\StPostsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FiltroBusquedaController extends AbstractController
{
    /**
     * @Route("/post_filter", name="post_filter")
     */
    public function index(Request $req, StPostsRepository $repoPosts)
    {

        $listadoPostsFiltrados = array(); 

        $form = $this->createForm(FiltroBusquedaType::class);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid()){

            $deporteSeleccionado = $form["deportes"]->getData();
            $ciudadSeleccionada = $form["ciudades"]->getData();

            if($ciudadSeleccionada != "" || $deporteSeleccionado != 0){
                if($deporteSeleccionado != 0 && $ciudadSeleccionada != ""){
                    $listadoPostsFiltrados = $repoPosts->postsCiudadDeporte($ciudadSeleccionada, $deporteSeleccionado, 5);
                }
                if($deporteSeleccionado == 0 && $ciudadSeleccionada != ""){
                    $listadoPostsFiltrados = $repoPosts->postsCiudad($ciudadSeleccionada, 5);
                }
                if($deporteSeleccionado != 0 && $ciudadSeleccionada == 0 && $ciudadSeleccionada == ""){
                    $listadoPostsFiltrados = $repoPosts->postsDeporte($deporteSeleccionado, 5);
                }
            }

        } 

        return $this->render('filtro_busqueda/index.html.twig', [
            'form' => $form->createView(),
            'listaPosts' => $listadoPostsFiltrados,
        ]);
    }


    /**
     * @Route("/postsFiltered/{lista}", name="postsFiltered")
     */
    public function postsFiltrados(array $lista)
    {
        return $this->render('filtro_busqueda/postsFiltro.html.twig', [
            'arrayPost' => $lista,
        ]);

    }
}
