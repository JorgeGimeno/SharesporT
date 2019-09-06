<?php

namespace App\Controller;

use App\Entity\StUsuarios;
use App\Form\StUsuariosType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/st/usuarios")
 */
class StUsuariosController extends AbstractController
{
    /**
     * @Route("/", name="st_usuarios_index", methods={"GET"})
     */
    public function index(): Response
    {
        $stUsuarios = $this->getDoctrine()
            ->getRepository(StUsuarios::class)
            ->findAll();

        return $this->render('st_usuarios/index.html.twig', [
            'st_usuarios' => $stUsuarios,
        ]);
    }

    /**
     * @Route("/new", name="st_usuarios_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $stUsuario = new StUsuarios();
        $form = $this->createForm(StUsuariosType::class, $stUsuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($stUsuario);
            $entityManager->flush();

            return $this->redirectToRoute('st_usuarios_index');
        }

        return $this->render('st_usuarios/new.html.twig', [
            'st_usuario' => $stUsuario,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="st_usuarios_show", methods={"GET"})
     */
    public function show(StUsuarios $stUsuario): Response
    {
        return $this->render('st_usuarios/show.html.twig', [
            'st_usuario' => $stUsuario,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="st_usuarios_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StUsuarios $stUsuario): Response
    {
        $form = $this->createForm(StUsuariosType::class, $stUsuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('st_usuarios_index');
        }
       
        return $this->render('st_usuarios/edit.html.twig', [
            'st_usuario' => $stUsuario,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="st_usuarios_delete", methods={"DELETE"})
     */
    public function delete(Request $request, StUsuarios $stUsuario): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stUsuario->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($stUsuario);
            $entityManager->flush();
        }

        return $this->redirectToRoute('st_usuarios_index');
    }
}
