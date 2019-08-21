<?php

namespace App\Controller;

use App\Entity\StDeportes;
use App\Form\StDeportesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/st/deportes")
 */
class StDeportesController extends AbstractController
{
    /**
     * @Route("/", name="st_deportes_index", methods={"GET"})
     */
    public function index(): Response
    {
        $stDeportes = $this->getDoctrine()
            ->getRepository(StDeportes::class)
            ->findAll();

        return $this->render('st_deportes/index.html.twig', [
            'st_deportes' => $stDeportes,
        ]);
    }

    /**
     * @Route("/new", name="st_deportes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $stDeporte = new StDeportes();
        $form = $this->createForm(StDeportesType::class, $stDeporte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($stDeporte);
            $entityManager->flush();

            return $this->redirectToRoute('st_deportes_index');
        }

        return $this->render('st_deportes/new.html.twig', [
            'st_deporte' => $stDeporte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="st_deportes_show", methods={"GET"})
     */
    public function show(StDeportes $stDeporte): Response
    {
        return $this->render('st_deportes/show.html.twig', [
            'st_deporte' => $stDeporte,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="st_deportes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StDeportes $stDeporte): Response
    {
        $form = $this->createForm(StDeportesType::class, $stDeporte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('st_deportes_index');
        }

        return $this->render('st_deportes/edit.html.twig', [
            'st_deporte' => $stDeporte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="st_deportes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, StDeportes $stDeporte): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stDeporte->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($stDeporte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('st_deportes_index');
    }
}
