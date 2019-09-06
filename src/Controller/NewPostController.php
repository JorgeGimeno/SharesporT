<?php

namespace App\Controller;

use DateTime;
use App\Entity\StPosts;
use App\Form\StPostsType;
use App\Entity\StDeportes;
use Psr\Log\LoggerInterface;
use App\Form\ComentariosType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewPostController extends AbstractController
{
    /**
     * @Route("/new_post", name="new_post", methods={"GET","POST"} )
     */
    public function index(Request $req, LoggerInterface $logger)
    {
        $newPost = new StPosts();
        $form = $this->createForm(StPostsType::class, $newPost);
        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) { 

            $newPost->setFechaHora(new DateTime());
            $newPost->setUsuario($this->getUser());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newPost);
            $entityManager->flush();

            return $this->redirectToRoute('main');
             
        } else {
            return $this->render('new_post/index.html.twig', [
                'form' => $form->createView(),
            ]);
        }

    }

    /**
     * @Route("/new_comment/{id_padre}", name="new_comment", methods={"GET","POST"} )
     */
    public function nuevoComentario(Request $req, LoggerInterface $logger, int $id_padre=-1)
    {
        $newPost = new StPosts();
        $form = $this->createForm(ComentariosType::class, $newPost);
        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) { 

            $newPost->setFechaHora(new DateTime());
            $newPost->setUsuario($this->getUser());
            $newPost->setIdPostPadre($id_padre);


            $pr= $this->getDoctrine()->getRepository(StPosts::class);
            $postPadre = $pr->find($id_padre);

            $newPost->setDeporte($postPadre->getDeporte());

            $entityManager = $this->getDoctrine()->getManager();
            
            $entityManager->persist($newPost);
            $entityManager->flush();

            return $this->redirectToRoute('main');
             
        } else {
            return $this->render('new_post/new_comment.html.twig', [
                'id_padre' => $id_padre,
                'form' => $form->createView(),

            ]);
        }

    }

}
