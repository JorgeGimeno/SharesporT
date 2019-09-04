<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class PublicidadController extends AbstractController
{
    /**
     * @Route("/publicidad", name="publicidad")
     * @IsGranted("ROLE_USER")
     */
    public function index()
    {
        return $this->render('publicidad/index.html.twig', [
            'controller_name' => 'PublicidadController',
        ]);
    }
}
