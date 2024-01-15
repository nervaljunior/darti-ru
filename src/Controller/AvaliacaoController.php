<?php

namespace App\Controller;

use App\Entity\Avaliacao;
use App\Form\AvaliacaoType;
use App\Form\Anexo1Type;
use App\Form\Anexo2Type;
use App\Form\Anexo3Type;
use App\Form\Anexo4Type;
use App\Form\Anexo5Type;
use App\Repository\AvaliacaoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/avaliacao')]
class AvaliacaoController extends AbstractController
{
    #[Route('/', name: 'app_avaliacao_index', methods: ['GET', 'POST'])]
    public function index(Request $request, AvaliacaoRepository $avaliacaoRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $pontuacaoTotal = 0;
        $classificacao = '';
        $mensagem = '';

        // Obtenha o valor do parâmetro de consulta 'unidade_id'
        $unidade = $request->query->get('unidade_id');

        if ($request->isMethod('POST')) {
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

            $mensagem = "Classificação: " . $classificacao;
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



    #[Route('/anexo1', name: 'avaliacao_anexo1')]
    public function anexo1(Request $request): Response
    {
        $avaliacao = new Avaliacao();
        $form = $this->createForm(Anexo1Type::class, $avaliacao);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            return $this->redirectToRoute('avaliacao_success', ['anexo' => 'Anexo 1']);
        }

        return $this->render('avaliacao/anexo1.html.twig', [
            'form' => $form->createView(),
            'anexo' => 'Anexo 1',
        ]);
    }
    #[Route('/anexo2', name: 'avaliacao_anexo2')]
    public function anexo2(Request $request): Response
    {
        $avaliacao = new Avaliacao();
        $form = $this->createForm(Anexo2Type::class, $avaliacao);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Lógica para salvar a avaliação no banco de dados
            // ...

            return $this->redirectToRoute('avaliacao_success', ['anexo' => 'Anexo 2']);
        }

        return $this->render('avaliacao/anexo2.html.twig', [
            'form' => $form->createView(),
            'anexo' => 'Anexo 2',
        ]);
    }
    
    #[Route('/anexo3', name: 'avaliacao_anexo3')]
    public function anexo3(Request $request): Response
    {
        $avaliacao = new Avaliacao();
        $form = $this->createForm(Anexo3Type::class, $avaliacao);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Lógica para salvar a avaliação no banco de dados
            // ...

            return $this->redirectToRoute('avaliacao_success', ['anexo' => 'Anexo 3']);
        }

        return $this->render('avaliacao/anexo3.html.twig', [
            'form' => $form->createView(),
            'anexo' => 'Anexo 3',
        ]);
    }
    #[Route('/anexo4', name: 'avaliacao_anexo4')]
    public function anexo4(Request $request): Response
    {
        $avaliacao = new Avaliacao();
        $form = $this->createForm(Anexo4Type::class, $avaliacao);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Lógica para salvar a avaliação no banco de dados
            // ...

            return $this->redirectToRoute('avaliacao_success', ['anexo' => 'Anexo 4']);
        }

        return $this->render('avaliacao/anexo4.html.twig', [
            'form' => $form->createView(),
            'anexo' => 'Anexo 4',
        ]);
    }
    #[Route('/anexo5', name: 'avaliacao_anexo5')]
    public function anexo5(Request $request): Response
    {
        $avaliacao = new Avaliacao();
        $form = $this->createForm(Anexo5Type::class, $avaliacao);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Lógica para salvar a avaliação no banco de dados
            // ...

            return $this->redirectToRoute('avaliacao_success', ['anexo' => 'Anexo 5']);
        }

        return $this->render('avaliacao/anexo5.html.twig', [
            'form' => $form->createView(),
            'anexo' => 'Anexo 5',
        ]);
    }

    #[Route('/avaliacao/success/{anexo}', name: 'avaliacao_success')]
    public function success(string $anexo): Response
    {
        return $this->render('avaliacao/success.html.twig', ['anexo' => $anexo]);
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
 