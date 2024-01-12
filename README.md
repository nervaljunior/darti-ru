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
