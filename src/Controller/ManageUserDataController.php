<?php

namespace App\Controller;

use App\Entity\StDeportes;
use App\Form\StDeportesType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/manageUser")
 */
class ManageUserDataController extends AbstractController
{
    /**
     * @Route("/", name="manageUser_index", methods={"GET"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function index()
    {
        $stDeportes = $this->getDoctrine()
            ->getRepository(StDeportes::class)
            ->findAll();

        return $this->render('/st_deportes/index.html.twig', [
            'st_deportes' => $stDeportes,
        ]);
    }

    /**
     * @Route("/new", name="manageUser_new", methods={"GET","POST"})
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

            return $this->redirectToRoute('manageUser_index');
        }

        return $this->render('st_deportes/new.html.twig', [
            'st_deporte' => $stDeporte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="manageUser_show", methods={"GET"})
     */
    public function show(StDeportes $stDeporte): Response
    {
        return $this->render('st_deportes/show.html.twig', [
            'st_deporte' => $stDeporte,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="manageUser_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StDeportes $stDeporte): Response
    {
        $form = $this->createForm(StDeportesType::class, $stDeporte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('manageUser_index');
        }

        return $this->render('st_deportes/edit.html.twig', [
            'st_deporte' => $stDeporte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="manageUser_delete", methods={"DELETE"})
     */
    public function delete(Request $request, StDeportes $stDeporte): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stDeporte->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($stDeporte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('manageUser_index');
    }
}
