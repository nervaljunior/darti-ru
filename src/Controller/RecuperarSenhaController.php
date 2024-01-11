<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecuperarSenhaController extends AbstractController
{
    #[Route('/recuperar/senha', name: 'app_recuperar_senha')]
    public function index(): Response
    {
        return $this->render('recuperar_senha/index.html.twig', [
            'controller_name' => 'RecuperarSenhaController',
        ]);
    }
}
