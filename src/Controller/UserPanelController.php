<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserPanelController extends AbstractController
{
    /**
     * @Route("/userpanel", name="userpanel")
     */
    public function index()
    {
        return $this->render('user_panel/index.html.twig', [
            'controller_name' => 'UserPanelController',
            

        ]);
    }
}
