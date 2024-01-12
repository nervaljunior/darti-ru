<?php

namespace App\Controller;

use App\Entity\Unidade;
use App\Form\UnidadeType;
use App\Repository\UnidadeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/unidade')]
class UnidadeController extends AbstractController
{
    #[Route('/', name: 'app_unidade_index', methods: ['GET'])]
    public function index(UnidadeRepository $unidadeRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        /*         $this->denyAccessUnlessGranted('ROLE_USER');
                $this->denyAccessUnlessGranted('ROLE_ADMIN');
                $this->denyAccessUnlessGranted('ROLE_NUTRICIONISTA'); */
        return $this->render('unidade/index.html.twig', [
            'unidades' => $unidadeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_unidade_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $unidade = new Unidade();
        $form = $this->createForm(UnidadeType::class, $unidade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($unidade);
            $entityManager->flush();

            return $this->redirectToRoute('app_unidade_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('unidade/new.html.twig', [
            'unidade' => $unidade,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_unidade_show', methods: ['GET'])]
    public function show(Unidade $unidade): Response
    {
        return $this->render('unidade/show.html.twig', [
            'unidade' => $unidade,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_unidade_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Unidade $unidade, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UnidadeType::class, $unidade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_unidade_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('unidade/edit.html.twig', [
            'unidade' => $unidade,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_unidade_delete', methods: ['POST'])]
    public function delete(Request $request, Unidade $unidade, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$unidade->getId(), $request->request->get('_token'))) {
            $entityManager->remove($unidade);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_unidade_index', [], Response::HTTP_SEE_OTHER);
    }
}
