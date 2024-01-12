# darti-ru - Sistema de Fiscalização para Restaurante Universitário da UFMA
sistema para controle nutricional da universidade federal do maranhão


Este projeto visa desenvolver um sistema baseado no framework Symfony para otimizar o processo de avaliação e fiscalização dos serviços prestados nos restaurantes universitários da Universidade Federal do Maranhão (UFMA). O sistema será projetado para atender as diretrizes estabelecidas nos "Protocolos de Fiscalização em Unidade de Alimentação e Nutrição: Restaurante Universitário da UFMA" elaborados em julho de 2019 pela equipe técnica responsável.

## Objetivos do Sistema

- **Automatização da Fiscalização:** O sistema irá automatizar o processo de fiscalização da execução dos serviços nas Unidades de Alimentação e Nutrição (UAN) dos restaurantes universitários, conforme os protocolos estabelecidos.

- **Gestão de Cardápios:** Facilitar a elaboração, apresentação, aprovação e modificação dos cardápios mensais, garantindo conformidade com as normativas e regulamentações alimentares.

- **Controle de Aquisição de Insumos:** Gerenciar a aquisição de gêneros alimentícios e outros materiais de consumo, assegurando que atendam aos padrões de qualidade estabelecidos.

- **Monitoramento do Pré-Preparo e Preparo dos Alimentos:** Registrar e controlar o pré-preparo e preparo dos alimentos, garantindo a observância das normas de tempo e temperatura.

- **Controle Bacteriológico:** Registrar as atividades relacionadas ao controle bacteriológico, incluindo a coleta diária de amostras, conforme as normativas sanitárias.

- **Avaliação e Pontuação:** Implementar um sistema de avaliação mensal da contratada, baseado nos critérios e pontuações estabelecidos nos protocolos, utilizando o Instrumento de Medição e Resultado (IMR).

## Requisitos do Sistema

### Tecnologias Utilizadas

- Symfony Framework
- Banco de Dados MySQL ou PostgreSQL
- Linguagem de Programação PHP
- HTML, CSS, JavaScript

### Instalação

1. Clone este repositório.
2. Instale as dependências usando o Composer.
   ```bash
   composer install
   ```
3. Configure o banco de dados.
4. Execute as migrações para criar as tabelas necessárias.
   ```bash
   php bin/console doctrine:migrations:migrate
   ```
5. Inicie o servidor local.
   ```bash
   php bin/console server:run
   ```

## Utilização do Sistema

O sistema será acessado por meio de um navegador web. Após o login, os usuários terão acesso a funcionalidades específicas de acordo com suas permissões.

## Contribuições

Este projeto está aberto a contribuições da comunidade. Sinta-se à vontade para reportar problemas, sugerir melhorias e enviar pull requests.

---

* Ajude com contribuições *



## Anexos

- Anexo 1

# AQUISIÇÃO DOS GÊNEROS ALIMENTÍCIOS E OUTROS MATERIAIS DE CONSUMO

A aquisição de gêneros deverá respeitar o PADRÃO DE IDENTIDADE E QUALIDADE (PIQ) estabelecido pela CONTRATANTE, embasado pelas Instruções Normativas do Ministério da Agricultura, Pecuária e Abastecimento e pelas Normas Legislativas do Ministério da Saúde, conforme ANEXO 1. A CONTRATANTE poderá solicitar à CONTRATADA a substituição do gênero, caso este não esteja dentro dos padrões estabelecidos.


- Anexo 2
# PRÉ- PREPARO E PREPARO DOS ALIMENTOS

Os alimentos levados à pré-preparo e preparo, deverão obedecer aos critérios de tempo e temperatura, conforme legislação vigente. Após a finalização do preparo, as preparações deverão ser mantidas em condições ideais de tempo e temperatura até o seu envase e distribuição de acordo com o ANEXO 2 e ANEXO 2-A.

- Anexo 3

A avaliação das preparações prontas, do Restaurante Universitário (Almoço e Jantar) e Colégio Universitário (Lanche matutino e vespertino), será realizada mediante formulários disponibilizados no ANEXO 3 E ANEXO 3-A.
- Anexo 4

# CONTROLE BACTERIOLÓGICO

Para controle de qualidade da alimentação a ser servida, a CONTRATADA deverá coletar diariamente amostras de no mínimo 100g de todas as preparações do cardápio diário servido, no Restaurante Universitário central, no Centro Pedagógico Paulo Freire, e no Colégio Universitário, de acordo com a INSTRUÇÃO NORMATIVA DIVISA/SVS/DF Nº 16, DE 23 DE MAIO DE 2017 (ANEXO 4).

# AVALIAÇÃO DA CONTRATADA

INSTRUMENTO DE MEDIÇÃO E RESULTADO (IMR). 
A avaliação do desempenho e da qualidade dos serviços prestados pela CONTRATADA será realizada por meio do IMR (ANEXO 6), no qual serão analisados 3 Grupos de Atividades em cada uma das cinco unidades da CONTRATANTE (Restaurante Universitário Central, Centro Pedagógico Paulo Freire, Colégio Universitário, Fábrica Santa Amélia e Faculdade de Medicina).

No formulário IMR (ANEXO 6), que será preenchido mensalmente, devem ser atribuídos os seguintes pontos e conceitos para cada atividade avaliada: 3 (três) “Realizada”, 1(um) “Parcialmente Realizada” ou 0 (zero) “Não Realizada”.

```<?php

function calcularPontuacaoTotal($unidade, $pontuacoes)
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

$pontuacaoTotal = 0;  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $unidade = $_POST['unidade'];

    $pontuacoes = [
        'rotinasDoServico' => $_POST['rotinasDoServico'] ?? 0,
        'maoDeObra' => $_POST['maoDeObra'] ?? 0,
        'controleRefeicaoTransportada' => $_POST['controleRefeicaoTransportada'] ?? 0,
        'planejamentoOrganizacao' => $_POST['planejamentoOrganizacao'] ?? 0,
        'coordenacaoAtividadesTecnicas' => $_POST['coordenacaoAtividadesTecnicas'] ?? 0,
        'saudeSalarios' => $_POST['saudeSalarios'] ?? 0,
    ];

    $pontuacaoTotal = calcularPontuacaoTotal($unidade, $pontuacoes);

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

?>

<!DOCTYPE html>
<html lang="en">
<body>

    <h1>Avaliação de Serviços</h1>

    <form action="" method="post">
        <label for="unidade">Escolha a unidade:</label>
        <select name="unidade" required>
            <option value="ruCentral">RU Central</option>
            <option value="ruCPPF">RU CPPF</option>
            <option value="fabricaSantaAmelia">Fábrica Santa Amélia</option>
            <option value="faculdadeMedicina">Faculdade de Medicina</option>
            <option value="colun">COLUN</option>
        </select><br>

        <?php
        $atividades = [
            'rotinasDoServico' => 'Rotinas do Serviço',
            'maoDeObra' => 'Mão de Obra',
            'controleRefeicaoTransportada' => 'Controle Refeição Transportada',
            'planejamentoOrganizacao' => 'Planejamento e Organização',
            'coordenacaoAtividadesTecnicas' => 'Coordenação Atividades Técnicas',
            'saudeSalarios' => 'Saúde, Salários',
        ];

        foreach ($atividades as $nomeCampo => $rotulo) {
            echo "<label for=\"$nomeCampo\">$rotulo:</label>";
            echo "<input type=\"number\" name=\"$nomeCampo\" step=\"0.1\" min=\"0\" max=\"3\" required><br>";
        }
        ?>

        <input type="submit" value="Calcular Pontuação">
    </form>

    <?php if ($pontuacaoTotal > 0): ?>
        <p>Pontuação Total para <?php echo $unidade; ?>: <?php echo $pontuacaoTotal; ?></p>
        <p>Classificação: <?php echo $classificacao; ?></p>
    <?php endif; ?>

    <?php
    if ($pontuacaoTotal >= 8.1) {
        $classe = 'muito-bom';
        $mensagem = 'Muito Bom';
    } elseif ($pontuacaoTotal >= 7.64 && $pontuacaoTotal <= 8.09) {
        $classe = 'bom';
        $mensagem = 'Bom';
    } elseif ($pontuacaoTotal >= 6.75 && $pontuacaoTotal <= 7.64) {
        $classe = 'regular';
        $mensagem = 'Regular';
    } else {
        $classe = 'insatisfatorio';
        $mensagem = 'Insatisfatório';
    }

    echo "<div class='caixa $classe'>$mensagem</div>";
    ?>

</body>
</html>
```

| Grupos                                                  | Percentual de Ponderação | Pontuação Máxima | RU Central | RU CPPF | Fábrica Santa Amélia | Faculdade de Medicina |
|---------------------------------------------------------|---------------------------|------------------|------------|---------|----------------------|------------------------|
| Grupo 1 – Atividades de Planejamento e Adequação à Legislação |                           |                  |            |         |                      |                        |
| - Rotinas do Serviço                                      | 60%                       | 1,8              | 1,8        | 1,8     | 1,8                  | 1,8                    |
| - Mão de obra                                             | 40%                       | 1,2              | 1,2        | 1,2     | 1,2                  | 1,2                    |
| - Subtotal                                               | 100%                      | 3,0              | 3,0        | 3,0     | 3,0                  | 3,0                    |
| Grupo 2 – Avaliação do Fluxograma Produtivo              |                           |                  |            |         |                      |                        |
| - Controle da refeição transportada                       | 40%                       | 1,2              | 1,2        | 1,2*    | 1,2*                 | 1,2*                   |
| - Planejamento, Organização e Coordenação da Qualidade das Refeições | 60%               | 1,8              | 1,8        | 1,8     | 1,8                  | 1,8                    |
| - Subtotal                                               | 100%                      | 3,0              | 3,0        | 3,0     | 3,0                  | 3,0                    |
| Grupo 3 - Gestão Técnica Administrativa e Legal           |                           |                  |            |         |                      |                        |
| - Coordenação e Comando das Atividades Técnicas e Operacionais | 60%                   | 1,8              | 1,8        | 1,8     | 1,8                  | 1,8                    |
| - Saúde, salários, benefícios e obrigações trabalhistas    | 40%                       | 1,2              | 1,2        | 1,2     | 1,2                  | 1,2                    |
| - Subtotal                                               | 100%                      | 3,0              | 3,0        | 3,0     | 3,0                  | 3,0                    |
| Pontuação Média Final                                    |                           | 9 pontos         |            |         |                      |                        |


---
dessa forma irá criar uma media de classificação

| Desempenho          | Nota                     | Cor da Nota  |
|---------------------|--------------------------|--------------|
| Muito Bom           | 9,0 a 8,1 pontos         | <span style="color:green">Verde Forte</span> |
| Bom                 | 8,09 a 7,65 pontos       | <span style="color:lightgreen">Verde Fraco</span> |
| Regular             | 7,64 a 6,75 pontos       | <span style="color:yellow">Amarelo</span> |
| Insatisfatório      | Abaixo de 6,75 pontos    | <span style="color:red">Vermelho</span> |
