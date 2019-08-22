<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/st/borrar")
 */
class ZzborrarController extends AbstractController
{
    /**
     * @Route("/zzborrar", name="zzborrar")
     */
    public function index()
    {
        return $this->render('zzborrar/index.html.twig', [
            'controller_name' => 'ZzborrarController',
        ]);
    }
}
