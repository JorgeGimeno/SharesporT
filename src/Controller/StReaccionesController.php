<?php

namespace App\Controller;

use App\Entity\StReacciones;
use App\Form\StReaccionesType;
use App\Repository\StReaccionesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/st/reacciones")
 */
class StReaccionesController extends AbstractController
{
    /**
     * @Route("/", name="st_reacciones_index", methods={"GET"})
     */
    public function index(StReaccionesRepository $stReaccionesRepository): Response
    {
        return $this->render('st_reacciones/index.html.twig', [
            'st_reacciones' => $stReaccionesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="st_reacciones_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $stReaccione = new StReacciones();
        $form = $this->createForm(StReaccionesType::class, $stReaccione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($stReaccione);
            $entityManager->flush();

            return $this->redirectToRoute('st_reacciones_index');
        }

        return $this->render('st_reacciones/new.html.twig', [
            'st_reaccione' => $stReaccione,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="st_reacciones_show", methods={"GET"})
     */
    public function show(StReacciones $stReaccione): Response
    {
        return $this->render('st_reacciones/show.html.twig', [
            'st_reaccione' => $stReaccione,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="st_reacciones_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StReacciones $stReaccione): Response
    {
        $form = $this->createForm(StReaccionesType::class, $stReaccione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('st_reacciones_index');
        }

        return $this->render('st_reacciones/edit.html.twig', [
            'st_reaccione' => $stReaccione,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="st_reacciones_delete", methods={"DELETE"})
     */
    public function delete(Request $request, StReacciones $stReaccione): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stReaccione->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($stReaccione);
            $entityManager->flush();
        }

        return $this->redirectToRoute('st_reacciones_index');
    }
}
