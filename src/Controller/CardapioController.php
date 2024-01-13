<?php

namespace App\Controller;

use App\Entity\Cardapio;
use App\Form\CardapioType;
use App\Repository\CardapioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cardapio')]
class CardapioController extends AbstractController
{
    #[Route('/', name: 'app_cardapio_index', methods: ['GET'])]
    public function index(CardapioRepository $cardapioRepository): Response
    {        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        /*         $this->denyAccessUnlessGranted('ROLE_USER');
                $this->denyAccessUnlessGranted('ROLE_ADMIN');
                $this->denyAccessUnlessGranted('ROLE_NUTRICIONISTA'); */
        return $this->render('cardapio/index.html.twig', [
            'cardapios' => $cardapioRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_cardapio_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $cardapio = new Cardapio();
        $form = $this->createForm(CardapioType::class, $cardapio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cardapio);
            $entityManager->flush();

            return $this->redirectToRoute('app_cardapio_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cardapio/new.html.twig', [
            'cardapio' => $cardapio,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cardapio_show', methods: ['GET'])]
    public function show(Cardapio $cardapio): Response
    {
        
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('cardapio/show.html.twig', [
            'cardapio' => $cardapio,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cardapio_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cardapio $cardapio, EntityManagerInterface $entityManager): Response
    {
        
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $form = $this->createForm(CardapioType::class, $cardapio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_cardapio_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cardapio/edit.html.twig', [
            'cardapio' => $cardapio,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cardapio_delete', methods: ['POST'])]
    public function delete(Request $request, Cardapio $cardapio, EntityManagerInterface $entityManager): Response
    {
        
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        if ($this->isCsrfTokenValid('delete'.$cardapio->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cardapio);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_cardapio_index', [], Response::HTTP_SEE_OTHER);
    }
}
