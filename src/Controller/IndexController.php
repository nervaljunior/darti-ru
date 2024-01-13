<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CardapioRepository;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(CardapioRepository $cardapioRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
/*         $this->denyAccessUnlessGranted('ROLE_USER');
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $this->denyAccessUnlessGranted('ROLE_NUTRICIONISTA'); */
        $resultSelectAll = 10;
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'resultSelectAll' => $resultSelectAll,
            'cardapios' => $cardapioRepository->findAll(),
        ]);
    }
}

