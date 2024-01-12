<?php

namespace App\Controller;

use App\Entity\Alimento;
use App\Form\AlimentoType;
use App\Repository\AlimentoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/alimento')]
class AlimentoController extends AbstractController
{
    #[Route('/', name: 'app_alimento_index', methods: ['GET'])]
    public function index(AlimentoRepository $alimentoRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        /*         $this->denyAccessUnlessGranted('ROLE_USER');
                $this->denyAccessUnlessGranted('ROLE_ADMIN');
                $this->denyAccessUnlessGranted('ROLE_NUTRICIONISTA'); */
        return $this->render('alimento/index.html.twig', [
            'alimentos' => $alimentoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_alimento_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $alimento = new Alimento();
        $form = $this->createForm(AlimentoType::class, $alimento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($alimento);
            $entityManager->flush();

            return $this->redirectToRoute('app_alimento_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('alimento/new.html.twig', [
            'alimento' => $alimento,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_alimento_show', methods: ['GET'])]
    public function show(Alimento $alimento): Response
    {
        return $this->render('alimento/show.html.twig', [
            'alimento' => $alimento,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_alimento_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Alimento $alimento, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AlimentoType::class, $alimento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_alimento_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('alimento/edit.html.twig', [
            'alimento' => $alimento,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_alimento_delete', methods: ['POST'])]
    public function delete(Request $request, Alimento $alimento, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$alimento->getId(), $request->request->get('_token'))) {
            $entityManager->remove($alimento);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_alimento_index', [], Response::HTTP_SEE_OTHER);
    }
}
