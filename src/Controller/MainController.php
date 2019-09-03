<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/main/{currentPage}", name="main")
     * @IsGranted("ROLE_USER")
     */
    public function index($currentPage = 1)
    {
      
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'currentPage' => $currentPage
        ]);
    }
}
