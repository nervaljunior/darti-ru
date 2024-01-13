<?php

namespace App\Controller;

use App\Entity\Avaliacao;
use App\Form\AvaliacaoType;
use App\Repository\AvaliacaoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/avaliacao')]
class AvaliacaoController extends AbstractController
{
    #[Route('/', name: 'app_avaliacao_index', methods: ['GET'])]
    public function index(Request $request,AvaliacaoRepository $avaliacaoRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $pontuacaoTotal = 0;
        $classificacao = '';
        $mensagem = '';

        if ($request->isMethod('POST')) {
            $unidade = $request->request->get('unidade');

            $pontuacoes = [
                'rotinasDoServico' => $request->request->get('rotinasDoServico') ?? 0,
                'maoDeObra' => $request->request->get('maoDeObra') ?? 0,
                'controleRefeicaoTransportada' => $request->request->get('controleRefeicaoTransportada') ?? 0,
                'planejamentoOrganizacao' => $request->request->get('planejamentoOrganizacao') ?? 0,
                'coordenacaoAtividadesTecnicas' => $request->request->get('coordenacaoAtividadesTecnicas') ?? 0,
                'saudeSalarios' => $request->request->get('saudeSalarios') ?? 0,
            ];

            $pontuacaoTotal = $this->calcularPontuacaoTotal($unidade, $pontuacoes);

            if ($pontuacaoTotal >= 8.1) {
                $classificacao = "Muito Bom";
            } elseif ($pontuacaoTotal >= 7.64 && $pontuacaoTotal <= 8.09) {
                $classificacao = "Bom";
            } elseif ($pontuacaoTotal >= 6.75 && $pontuacaoTotal <= 7.64) {
                $classificacao = "Regular";
            } else {
                $classificacao = "Insatisfatório";
            }
        }

        $atividades = [
            'rotinasDoServico' => 'Rotinas do Serviço',
            'maoDeObra' => 'Mão de Obra',
            'controleRefeicaoTransportada' => 'Controle Refeição Transportada',
            'planejamentoOrganizacao' => 'Planejamento e Organização',
            'coordenacaoAtividadesTecnicas' => 'Coordenação Atividades Técnicas',
            'saudeSalarios' => 'Saúde, Salários',
        ];
        return $this->render('avaliacao/index.html.twig', [
            'avaliacaos' => $avaliacaoRepository->findAll(),
            'unidade' => $unidade ?? null,
            'pontuacaoTotal' => $pontuacaoTotal,
            'classificacao' => $classificacao,
            'controller_name' => 'AvaliacaoController',
            'atividades' => $atividades,
            'mensagem' => $mensagem,
        ]);
    }

    private function calcularPontuacaoTotal($unidade, $pontuacoes)
    {
        $ponderacoes = [
            'grupo1' => [
                'rotinasDoServico' => 0.6,
                'maoDeObra' => 0.4,
            ],
            'grupo2' => [
                'controleRefeicaoTransportada' => 0.4,
                'planejamentoOrganizacao' => 0.6,
            ],
            'grupo3' => [
                'coordenacaoAtividadesTecnicas' => 0.6,
                'saudeSalarios' => 0.4,
            ],
        ];

        $pontuacaoTotal = 0;

        foreach ($ponderacoes as $grupo => $itens) {
            foreach ($itens as $item => $percentual) {
                $pontuacaoTotal += $pontuacoes[$item] * $percentual;
            }
        }

        return $pontuacaoTotal;
    }


    /* parte do CRUD do codigo antigo, revisar e refazer */
/* 
    #[Route('/new', name: 'app_avaliacao_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avaliacao = new Avaliacao();
        $form = $this->createForm(AvaliacaoType::class, $avaliacao);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($avaliacao);
            $entityManager->flush();

            return $this->redirectToRoute('app_avaliacao_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('avaliacao/new.html.twig', [
            'avaliacao' => $avaliacao,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_avaliacao_show', methods: ['GET'])]
    public function show(Avaliacao $avaliacao): Response
    {
        return $this->render('avaliacao/show.html.twig', [
            'avaliacao' => $avaliacao,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_avaliacao_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Avaliacao $avaliacao, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AvaliacaoType::class, $avaliacao);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_avaliacao_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('avaliacao/edit.html.twig', [
            'avaliacao' => $avaliacao,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_avaliacao_delete', methods: ['POST'])]
    public function delete(Request $request, Avaliacao $avaliacao, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avaliacao->getId(), $request->request->get('_token'))) {
            $entityManager->remove($avaliacao);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_avaliacao_index', [], Response::HTTP_SEE_OTHER);
    }*/
}
 