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
     * @Route("/filtro_busqueda", name="filtro_busqueda")
     */
    public function index(Request $req, StPostsRepository $repoPosts)
    {

        $listadoPostsFiltrados = array(); 
        $datos = new datosFiltro();

        $form = $this->createForm(FiltroBusquedaType::class, $datos);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid()){

            $deporteSeleccionado = $form["deportes"]->getData();
            $ciudadSeleccionada = $form["ciudades"]->getData();

            if($deporteSeleccionado != 0 && $ciudadSeleccionada != 0){
                
            }
            if($deporteSeleccionado == 0 && $ciudadSeleccionada != 0){
                $listadoPostsFiltrados = $repoPosts->postsDeporte($deporteSeleccionado, 5);
            }
            if($deporteSeleccionado != 0 && $ciudadSeleccionada == 0){

            }
            
            //return $this->redirectToRoute('new_post');
            var_dump($listadoPostsFiltrados);

        } 

        return $this->render('filtro_busqueda/index.html.twig', [
            'form' => $form->createView(),
            'listaPosts' => $listadoPostsFiltrados,
        ]);
    }
}
