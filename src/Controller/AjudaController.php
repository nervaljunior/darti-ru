<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjudaController extends AbstractController
{
    #[Route('/ajuda', name: 'app_ajuda')]
    public function index(): Response
    {
        return $this->render('ajuda/index.html.twig', [
            'controller_name' => 'AjudaController',
        ]);
    }
}
