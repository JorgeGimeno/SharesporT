<?php

namespace App\Controller;

use App\Entity\StUsuarios;
use App\Form\EditUserDataType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
        
            $file=$form->get('foto')->getData();
            // si no esta informado le agregamso la foto por defecto
            if ($file == null){
                $file= file('/public/images/user.png');
            }
            // obtenemos la foto desde la ruta para grabarla
            $contenido=file_get_contents($file);
            
            $usuarioSesion->setFoto($contenido);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($usuarioSesion);
            $entityManager->flush();

            return $this->redirectToRoute('main');
        }
        $image = base64_encode(stream_get_contents($usuarioSesion->getFoto()));  
        return $this->render('editar_datos_usuario/index.html.twig', [
            'form' => $form->createView(),
            'foto' => $image,
        ]);
    }
}
