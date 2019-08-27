<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListPostController extends AbstractController
{
    /**
     * @Route("/post_list", name="post_list")
     */
    public function index()
    {
        return $this->render('list_post/index.html.twig', [
            'controller_name' => 'ListPostController',
        ]);
    }
}
