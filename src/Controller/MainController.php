<?php

namespace App\Controller;

use App\Entity\StPosts;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class MainController extends AbstractController
{
    /**
     * @Route("/main/{currentPage}", name="main")
     * 
     */
    public function index($currentPage = 1)
    {
        
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'currentPage' => $currentPage,
        ]);
    }
}
