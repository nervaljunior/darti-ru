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

# login
![image](https://github.com/nervaljunior/darti-ru/assets/108685222/61b57d4d-549b-4207-8635-831cc2bbfbdb)


### Tecnologias Utilizadas

- Symfony Framework
- Banco de Dados MySQL ou PostgreSQL
- Linguagem de Programação PHP
- HTML, CSS, JavaScript

![image](https://github.com/nervaljunior/darti-ru/assets/108685222/1212bfb5-f61d-4a98-9532-abf3ae43b4db)

![image](https://github.com/nervaljunior/darti-ru/assets/108685222/3b1b6b8a-0d7d-410b-99b7-e1f42bd0f1fd)


![image](https://github.com/nervaljunior/darti-ru/assets/108685222/50051a75-e72b-4c1c-997d-c3ad6720a04a)


![image](https://github.com/nervaljunior/darti-ru/assets/108685222/90c53aa0-a920-415f-98ee-25c8a1a31be2)


![image](https://github.com/nervaljunior/darti-ru/assets/108685222/d5906a9a-92f1-4a54-ad08-c0c3bfaf9b66)



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



## Anexo 1



# AQUISIÇÃO DOS GÊNEROS ALIMENTÍCIOS E OUTROS MATERIAIS DE CONSUMO

A aquisição de gêneros deverá respeitar o PADRÃO DE IDENTIDADE E QUALIDADE (PIQ) estabelecido pela CONTRATANTE, embasado pelas Instruções Normativas do Ministério da Agricultura, Pecuária e Abastecimento e pelas Normas Legislativas do Ministério da Saúde, conforme ANEXO 1. A CONTRATANTE poderá solicitar à CONTRATADA a substituição do gênero, caso este não esteja dentro dos padrões estabelecidos.


## Anexo 2
# PRÉ- PREPARO E PREPARO DOS ALIMENTOS

Os alimentos levados à pré-preparo e preparo, deverão obedecer aos critérios de tempo e temperatura, conforme legislação vigente. Após a finalização do preparo, as preparações deverão ser mantidas em condições ideais de tempo e temperatura até o seu envase e distribuição de acordo com o ANEXO 2 e ANEXO 2-A.

## Anexo 3

A avaliação das preparações prontas, do Restaurante Universitário (Almoço e Jantar) e Colégio Universitário (Lanche matutino e vespertino), será realizada mediante formulários disponibilizados no ANEXO 3 E ANEXO 3-A.

## Anexo 4

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


![image](https://github.com/nervaljunior/darti-ru/assets/108685222/67eee95f-d66b-4400-bca0-3b21f356ddbb)

---

# ANEXO 1 - PADRÃO DE IDENTIDADE E QUALIDADE (PIQ) DOS GÊNEROS UTILIZADOS NO RESTAURANTE UNIVERSITÁRIO DA UNIVERSIDADE FEDERAL DO MARANHÃO: HORTIFRUTIGRANJEIROS, CARNES, ESTOCÁVEIS, MATERIAL DE LIMPEZA E DESCARTÁVEIS.

### DESCRIÇÃO DO PRODUTO

- **Abacaxi**: maduro, íntegro, de 1ª qualidade, uniforme (polpa firme, doce, sem danos físicos e mecânicos) sem sujidades (ausência de terras ou corpos estranhos), sem parasitas (insetos, larvas e moluscos).

### CRITÉRIOS DE RECEBIMENTO

Aspectos a serem analisados:

- Grau de maturação
- Consistência da polpa
- Adocicada e firme
- Ausência de danos físicos e mecânicos
- Uniformidade de tamanho
- Ausência de parasitas (insetos, larvas e moluscos)
- Ausência de sujidades (terras ou corpos estranhos aderentes à superfície)

### AVALIAÇÃO

| Critério                       | Avaliação |
|---------------------------------|-----------|
| Grau de maturação               |           |
| Consistência da polpa           |           |
| Adocicada e firme               |           |
| Ausência de danos físicos        |           |
| Uniformidade de tamanho         |           |
| Ausência de parasitas            |           |
| Ausência de sujidades            |           |

### JUSTIFICATIVA/MEDIDA CORRETIVA

- [ ] Aprovação
- [ ] Não Aprovação

## ALGORITMO PARA O FORMULÁRIO

1. Solicitar a avaliação de cada critério.
2. Registrar a justificativa ou medida corretiva, se necessário.
3. Marcar a aprovação ou não aprovação.
4. Repetir o processo para cada produto e critério.

---

# ANEXO 2 - CRITÉRIOS DE TEMPERATURA E TEMPO NO RESTAURANTE UNIVERSITÁRIO CENTRAL E CENTRO PEDAGÓGICO PAULO FREIRE

## Etapas e Critérios

| Etapas                                                   | Temperatura           | Tempo             |
|----------------------------------------------------------|-----------------------|-------------------|
| Temperaturas de Armazenamento de Alimentos Preparados     |                       |                   |
| - Refrigerados                                           | 5ºC                   |                   |
| - Congelados                                             | -18ºC                 |                   |
| Conservação da Temperatura das Preparações para Distribuição |                       |                   |
| - Preparações Quentes                                    | Superior a 60ºC       | Máximo 6 horas    |
| - Preparações Frias                                      | Inferior a 5ºC        |                   |
| Temperatura dos Equipamentos e Alimentos                  |                       |                   |
| - Alimentos ou preparações congeladas                     | Igual ou inferior a -18ºC |                   |
| - Alimentos ou preparações refrigerados                   | Inferior a 5ºC        |                   |
| - Alimentos ou preparações quentes                        | Superior a 60ºC       |                   |
| Temperatura de Preparo do Alimento                         | Mínimo de 70 ºC¹     |                   |
| - Óleos e gorduras aquecidos                               | Até 180ºC²          |                   |
| Temperatura de Descongelamento                            | Inferior a 5ºC        |                   |
| Temperatura de Resfriamento de Alimento Preparado          |                       |                   |
| - Resfriamento de alimento aquecido preparado              | Redução de 60ºC a 10 ºC | 2 horas           |
| - Refrigeração inferior a 5ºC                             | 5 dias                |
| - Congelamento igual ou inferior a -18 ºC                 |                       |

### Notas de Rodapé:

¹ Temperaturas inferiores podem ser utilizadas no tratamento térmico desde que as combinações de tempo e temperatura sejam suficientes para assegurar a qualidade higiênico-sanitária dos alimentos.

² Deverá ser substituído imediatamente sempre que houver alteração evidente das características físico-químicas ou sensoriais, tais como aroma e sabor, e formação intensa de espuma e fumaça.

## Prazo de Validade para Produtos Congelados e Refrigerados

### Produtos Congelados

| Temperatura Recomendada (Graus Celsius) | Prazo de Validade (Dias) |
|-----------------------------------------|---------------------------|
| 0 a -5                                 | 10                        |
| -6 a -10                                | 20                        |
| -11 a -18                               | 30                        |
| <-18                                    | 90                        |

### Produtos Refrigerados

| Produtos Resfriados                                | Temperatura Recomendada (Graus Celsius) | Prazo de Validade (Dias) |
|----------------------------------------------------|-----------------------------------------|---------------------------|
| Pescados e seus produtos                            | Máximo 2(dois graus)                     | 3                         |
| Manipulados crus.                                    | Máximo 2(dois graus)                     | 1                         |
| Pescados pós cocção.                                 | Máximo 4 (quatro graus)                  | 3                         |
| Alimentos pós cocção, Exceto pescados.               | Máximo 4 (quatro graus)                  | 3                         |
| Carnes bovina e suína, aves, entre outras, e seus produtos manipulados crus. | Máximo 4 (quatro graus)                  | 3                         |
| Espetos mistos, bife rolê, carnes empanadas cruas e preparações com carne moída | Máximo 4 (quatro graus)                  | 2                         |
| Frios e embutidos, fatiados, picados ou moídos        | Máximo 4 (quatro graus)                  | 3                         |
| Maionese e misturas de maionese com outros alimentos | Máximo 4 (quatro graus)                  | 2                         |
| Sobremesas e outras preparações com laticínios       | Máximo 4 (quatro graus)                  | 3                         |
| Demais alimentos preparados                          | Máximo 4 (quatro graus)                  | 3                         |
| Produtos de panificação e confeitaria com coberturas e recheios, prontos para o consumo | Máximo 5 (cinco graus)                  | 5                         |
| Frutas, verduras e legumes higienizados, fracionados ou descascados; sucos e polpas de frutas | Máximo 5 (cinco graus)                  | 3                         |
| Leite e derivados                                     | Máximo 7 (sete graus)                    | 5                         |
| Ovos                                                 | Máximo 10 (dez graus)                    | 7                         |

Referência: Portaria CVS-5/2013 Centro de Vigilância Sanitária da Secretaria de Estado da Saúde de São Paulo, de 09 de Abril de 2013.

---

# ANEXO 2-A - CRITÉRIOS ESPECÍFICOS DE TEMPERATURAS E TEMPO NOS RESTAURANTES UNIVERSITÁRIOS

## Etapas e Critérios Específicos

| Etapas                                | Temperatura      | Tempo               |
|---------------------------------------|------------------|---------------------|
| Água do balcão térmico                | 80 a 90º C       | -                   |
| Balcão refrigerado                   | Máximo 8º C      | -                   |
| Câmara frigorífica para resíduos sólidos | Máximo 10º C   | -                   |
| Cocção no centro do alimento          | 70º C            | 2 minutos           |
|                                        | 74º C            | 5 segundos          |
| Distribuição de alimentos quentes      | Mínimo 60º C     | Máximo 6 horas      |
| Distribuição de alimentos refrigerados | Máximo 10º C     | Máximo 4 horas      |
| Espera para distribuição de alimentos quentes | Mínimo 65º C | -                   |
| Espera para distribuição de alimentos frios | Máximo 10º C  | -                   |
| Reaquecimento de alimentos (temperatura interna) | 74º C  | 5 segundos          |
| Sobremesas refrigeradas (armazenamento) | Máximo 4º C    | 72 horas            |
| Sucos e polpas resfriados             | Máximo 10º C     | Indicado pelo fabricante |
| Transporte de alimentos quentes        | Mínimo 60 º C    | -                   |
| Transporte de alimentos frios         | Máximo 10º C     | -                   |

## Referências

- Portaria CVS-5/2013 Centro de Vigilância Sanitária da Secretaria de Estado da Saúde de São Paulo, de 09 de Abril de 2013.
- Resolução – RDC/ ANVISA n° 216, de 15 de setembro de 2004.

---

# ANEXO 3 - AVALIAÇÃO DOS CARDÁPIOS DO RESTAURANTE UNIVERSITÁRIO

## Refeição: Almoço (   )   Jantar (   )

**Data:** [Insira a data aqui]

| Preparações         | Avaliação               |
|----------------------|-------------------------|
| **Salada**           |                         |
|                      |                         |
|                      |                         |
|                      |                         |
| **Prato Principal**  |                         |
|                      |                         |
|                      |                         |
|                      |                         |
| **Guarnição**        |                         |
|                      |                         |
|                      |                         |
|                      |                         |
| **Cereal**           |                         |
|                      |                         |
|                      |                         |
|                      |                         |
| **Leguminosa**       |                         |
|                      |                         |
|                      |                         |
|                      |                         |
| **Sobremesa**        |                         |
|                      |                         |
|                      |                         |
|                      |                         |

### Justificativa/Medida Corretiva

- [ ] Em acordo com o cardápio
- [ ] Aprovação
  - [ ] Sim
  - [ ] Não

**Fiscal Responsável:** [Insira o nome do fiscal responsável]

---

Este formulário destina-se à avaliação dos cardápios do Restaurante Universitário para as refeições de almoço ou jantar. Preencha as avaliações para cada categoria de preparação, indique se está de acordo com o cardápio e, se necessário, forneça justificativas ou medidas corretivas. Marque a aprovação e indique o fiscal responsável.



---



# ANEXO 3-A - AVALIAÇÃO DO CARDÁPIO DO COLÉGIO UNIVERSITÁRIO

## Refeição: Lanche Matutino (    )   Lanche Vespertino (    )

**Data:** [Insira a data aqui]

| Preparação           | Avaliação               |
|-----------------------|-------------------------|
|                      |                         |
|                      |                         |
|                      |                         |
|                      |                         |
|                      |                         |
|                      |                         |
|                      |                         |
|                      |                         |

### Justificativa/Medida Corretiva

- [ ] Em acordo com o cardápio
- [ ] Aprovação
  - [ ] Sim
  - [ ] Não

**Fiscal Responsável:** [Insira o nome do fiscal responsável]

---

Este formulário destina-se à avaliação do cardápio do Colégio Universitário para as refeições de lanche matutino ou lanche vespertino. Preencha as avaliações para cada preparação, indique se está de acordo com o cardápio e, se necessário, forneça justificativas ou medidas corretivas. Marque a aprovação e indique o fiscal responsável.

---

# ANEXO 4 - PROTOCOLO DE COLETA DE AMOSTRAS DE ALIMENTOS PARA CONTROLE BACTERIOLÓGICO

Para realizar a coleta de amostras de alimentos para controle bacteriológico, siga o protocolo abaixo de acordo com a referência:

## Procedimento de Coleta

1. Proceda à higienização das mãos.
2. Identifique as embalagens de primeiro uso ou sacos esterilizados/desinfetados com o nome do estabelecimento, nome do produto, data, horário e nome do responsável pela coleta.
3. Abra a embalagem ou o saco sem tocá-lo internamente e sem soprá-lo.
4. Coloque a amostra do alimento, garantindo no mínimo 100 (cem) gramas.
5. Utilize uma embalagem separada para cada tipo de preparação.
6. Se possível, retire o ar da embalagem e feche-a.
7. Guarde a amostra por 72 (setenta e duas) horas, observando as temperaturas a seguir:
   - Alimentos distribuídos sob refrigeração: Máximo 4º C (quatro graus Celsius)
   - Alimentos distribuídos quentes: Sob congelamento a -18ºC (dezoito graus Celsius negativos)
   - Alimentos líquidos: Sob refrigeração a 4º C (quatro graus Celsius)

## Referência

- **Instrução Normativa DIVISA/SVS/DF Nº 16, de 23 de maio de 2017.**

Este protocolo tem como objetivo garantir a correta coleta de amostras de alimentos para controle bacteriológico, seguindo as normas estabelecidas na referência mencionada.


---

# ANEXO 5 - ROTINA DE FISCALIZAÇÃO DO RESTAURANTE UNIVERSITÁRIO CENTRAL E SUBUNIDADES

## Restaurante Universitário Central

### Setor: Recebimento de Gêneros

**Rotinas Diárias:**
1. **Conferência das Condições Higiênicas da Área de Recebimento:**
   - Avaliação:
     - [ ] Adequado
     - [ ] Inadequado
   - Justificativa/Medida Corretiva:

2. **Conferência das Condições Higiênicas do Entregador e do Transporte:**
   - Avaliação:
     - [ ] Adequado
     - [ ] Inadequado
   - Justificativa/Medida Corretiva:

3. **Conferência dos Aspectos Qualitativos Seguindo os Critérios do PIQ:**
   - Avaliação:
     - [ ] Adequado
     - [ ] Inadequado
   - Justificativa/Medida Corretiva:

4. **Conferência dos Gêneros Quanto aos Aspectos Quantitativos e Pesagem:**
   - Avaliação:
     - [ ] Adequado
     - [ ] Inadequado
   - Justificativa/Medida Corretiva:

5. **Conferência da Rotulagem e Registro da Temperatura:**
   - Avaliação:
     - [ ] Adequado
     - [ ] Inadequado
   - Justificativa/Medida Corretiva:

6. **Rejeição de Produtos Inaceitáveis:**
   - Avaliação:
     - [ ] Adequado
     - [ ] Inadequado
   - Justificativa/Medida Corretiva:

7. **Conferência da Retirada das Embalagens e Lavagem dos Gêneros:**
   - Avaliação:
     - [ ] Adequado
     - [ ] Inadequado
   - Justificativa/Medida Corretiva:

8. **Conferência do Acondicionamento e Transporte dos Gêneros:**
   - Avaliação:
     - [ ] Adequado
     - [ ] Inadequado
   - Justificativa/Medida Corretiva:

9. **Conferência da Higienização dos Monoblocos e Áreas de Armazenamento:**
   - Avaliação:
     - [ ] Adequado
     - [ ] Inadequado
   - Justificativa/Medida Corretiva:

### Fiscal Responsável:
Fiscal Responsável: [Insira o nome do fiscal responsável]

---

Este documento descreve as rotinas diárias de fiscalização no setor de Recebimento de Gêneros do Restaurante Universitário Central. Cada item deve ser avaliado, indicando se a rotina está adequada ou inadequada, e fornecendo justificativas ou medidas corretivas quando necessário. O fiscal responsável deve assinar ao final da avaliação.
