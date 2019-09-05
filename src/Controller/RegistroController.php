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
            $file=$form->get('foto')->getData();
            if ($file == null){
                $file= file('/public/images/user.png');
            }
            $user->setFoto($file);
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
