<?php

namespace App\Controller;

use DateTime;
use App\Entity\StPosts;
use App\Form\StPostsType;
use App\Entity\StDeportes;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewPostController extends AbstractController
{
    /**
     * @Route("/new_post", name="new_post", methods={"GET","POST"} )
     */
    public function index(Request $req)
    {

        //Obtenemos la lista de deportes
        $listaDeportes = $this->getDoctrine()
            ->getRepository(StDeportes::class)
            ->findAll();

        //creamos un objeto post
        $newPost = new StPosts();
        $form = $this->createForm(StPostsType::class, $newPost);
        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) { 

            $newPost->setFecha(new DateTime());
            //$newPost->setContenido($req->request->get('contenido'));
            $newPost->setIdUsuario($this->getUser()->getId());
            $newPost->setIdDeporte(2);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newPost);
            $entityManager->flush();

            return $this->redirectToRoute('new_post');
             
        } else {
            return $this->render('new_post/index.html.twig', [
                'deportes' => $listaDeportes,
                'form' => $form->createView()
            ]);
        }

    }

}
