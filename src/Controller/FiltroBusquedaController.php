<?php

namespace App\Controller;

use App\Entity\StPosts;
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
     * @Route("/postsFiltered/{deporte}/{ciudad}/{currentPage}", name="postsFiltered", methods={"GET"})
     */
    public function postsFiltrados(int $deporte, string $ciudad, $currentPage = 1)
    {
        $em = $this->getDoctrine()->getManager();

        $limit = 3;
        $postResult;
        $postQueryCompleta;

        $listadoPostsFiltrados = array();

            if($deporte != 0 && $ciudad != "0"){
                $listadoPostsFiltrados = $em->getRepository(StPosts::class)->postsCiudadDeporte($ciudad, $deporte, 5, $currentPage, $limit);
            }
            if($deporte == 0 && $ciudad != "0"){
                $listadoPostsFiltrados = $em->getRepository(StPosts::class)->postsCiudad($ciudad, 5, $currentPage, $limit);
            }
            if($deporte != 0 && $ciudad == "0"){
                $listadoPostsFiltrados = $em->getRepository(StPosts::class)->postsDeporte($deporte, 5, $currentPage, $limit);
            }

            if($listadoPostsFiltrados['bandera'] == 0){
                $postResult = $listadoPostsFiltrados['paginator'];
                $postQueryCompleta =  $listadoPostsFiltrados['query'];
                $maxPages = ceil($listadoPostsFiltrados['paginator']->count() / $limit);
            } else {
                $postResult = $listadoPostsFiltrados['lista'];
                $maxPages = 1;
                $postQueryCompleta =  $listadoPostsFiltrados['lista'];
            }

            $tablaReacciones = [];
            foreach ($postResult as $p){
                array_push($tablaReacciones, $p->cuentaReacciones());
            }

            return $this->render('st_posts/show.html.twig', array(
                'arrayPost' => $postResult, 
                'maxPages'=>$maxPages,
                'thisPage' => $currentPage,
                'all_items' => $postQueryCompleta,
                'reacciones' => $tablaReacciones,
            ) );
        }
}
