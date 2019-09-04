<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class AdministracionController extends AbstractController
{
    /**
     * @Route("/administracion", name="administracion")
     * @IsGranted("ROLE_ADMIN")
     */
    public function index()
    {
        return $this->render('/administracion/index.html', [
            'controller_name' => 'AdministracionController',
        ]);
    }
}
