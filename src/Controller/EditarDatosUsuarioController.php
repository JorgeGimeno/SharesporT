<?php

namespace App\Controller;

use App\Entity\StUsuarios;
use App\Form\EditUserDataType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EditarDatosUsuarioController extends AbstractController
{
    /**
     * @Route("/editar/datos/usuario", name="editar_datos_usuario")
     */
    public function index()
    {
        return $this->render('editar_datos_usuario/index.html.twig', [
            'controller_name' => 'EditarDatosUsuarioController',
         ]);
    }

    /**
     * @Route("/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $usuarioSesion=$this->getUser();
        $form = $this->createForm(EditUserDataType::class, $usuarioSesion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $usuarioSesion->setPassword(
                $passwordEncoder->encodePassword(
                    $usuarioSesion,
                    $form->get('password')->getData()
                )
            );
        

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($usuarioSesion);
        $entityManager->flush();

        return $this->redirectToRoute('main');
        }

        return $this->render('editar_datos_usuario/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
