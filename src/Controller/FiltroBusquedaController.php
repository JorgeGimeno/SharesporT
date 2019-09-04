<?php

namespace App\Controller;

use App\Entity\DatosFiltro;
use App\Form\FiltroBusquedaType;
use App\Repository\StPostsRepository;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class FiltroBusquedaController extends AbstractController
{
    /**
     * @Route("/post_filter", name="post_filter")
     */
    public function index()
    {

        $form = $this->createForm(FiltroBusquedaType::class);

        return $this->render('filtro_busqueda/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/postsFiltered/{deporte}/{ciudad}", name="postsFiltered", methods={"GET"})
     */
    public function postsFiltrados(int $deporte, string $ciudad, StPostsRepository $repoPosts)
    {
        $listadoPostsFiltrados = array();

            if($deporte != 0 && $ciudad != "0"){
                $listadoPostsFiltrados = $repoPosts->postsCiudadDeporte($ciudad, $deporte, 5);
            }
            if($deporte == 0 && $ciudad != "0"){
                $listadoPostsFiltrados = $repoPosts->postsCiudad($ciudad, 5);
            }
            if($deporte != 0 && $ciudad == "0"){
                $listadoPostsFiltrados = $repoPosts->postsDeporte($deporte, 5);
            }

        return $this->render('filtro_busqueda/postsFiltro.html.twig', [
            'listaPosts' => $listadoPostsFiltrados,
        ]);

    }
}
