<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConfiguracaoController extends AbstractController
{
    #[Route('/configuracao', name: 'app_configuracao')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('configuracao/index.html.twig', [
            'controller_name' => 'ConfiguracaoController',
        ]);
    }
}
