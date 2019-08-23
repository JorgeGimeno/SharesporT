<?php

namespace App\Controller;

use App\Entity\StPosts;
use App\Form\StPostsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/st/posts")
 */
class StPostsController extends AbstractController
{
    /**
     * @Route("/", name="st_posts_index", methods={"GET"})
     */
    public function index(): Response
    {
        $stPosts = $this->getDoctrine()
            ->getRepository(StPosts::class)
            ->findAll();

        return $this->render('st_posts/index.html.twig', [
            'st_posts' => $stPosts,
        ]);
    }

    /**
     * @Route("/new", name="st_posts_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $stPost = new StPosts();
        $form = $this->createForm(StPostsType::class, $stPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($stPost);
            $entityManager->flush();

            return $this->redirectToRoute('st_posts_index');
        }

        return $this->render('st_posts/new.html.twig', [
            'st_post' => $stPost,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="st_posts_show", methods={"GET"})
     */
    public function show(StPosts $stPost): Response
    {
        return $this->render('st_posts/show.html.twig', [
            'st_post' => $stPost,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="st_posts_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StPosts $stPost): Response
    {
        $form = $this->createForm(StPostsType::class, $stPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('st_posts_index');
        }

        return $this->render('st_posts/edit.html.twig', [
            'st_post' => $stPost,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="st_posts_delete", methods={"DELETE"})
     */
    public function delete(Request $request, StPosts $stPost): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stPost->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($stPost);
            $entityManager->flush();
        }

        return $this->redirectToRoute('st_posts_index');
    }

}
