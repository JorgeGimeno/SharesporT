<?php

namespace App\Controller;

use App\Entity\StUsuarios;
use App\Form\StRegistrationFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistroController extends AbstractController
{

    /**
     * @Route("/registro", name="registro")
     */
    public function registro(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new StUsuarios();
        $form = $this->createForm(StRegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            // capturamos la foto del form
            $file=$form->get('foto')->getData();
            // si no esta informado le agregamso la foto por defecto
            if ($file == null){
                $file= file('/public/images/user.png');
            }
            // obtenemos la foto desde la ruta para grabarla
            $contenido=file_get_contents($file);
            
            $user->setFoto($contenido);
            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $this->redirectToRoute('index');
        }

        return $this->render('registro/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }


}
