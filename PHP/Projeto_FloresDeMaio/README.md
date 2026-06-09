# Documentação do Projeto: Flor de Maio 🌸

## 1. Visão Geral
**Flor de Maio** é um sistema de e-commerce para uma floricultura com identidade visual e conceitual focada no estilo vintage. O objetivo do projeto é oferecer uma experiência de compra delicada e personalizável, mesclando a venda de arranjos tradicionais com um sistema de assinaturas e uma ferramenta interativa de montagem de buquês.

---

## 2. Tecnologias e Ferramentas
* **Linguagem Backend:** PHP
* **Linguagem Frontend:** HTML5, CSS3
* **Banco de Dados:** PostgreSQL

---

## 3. Diferenciais do Sistema
* **Montador de Buquês Interativo:** Uma interface visual onde o cliente pode escolher e visualizar as flores, vasos e complementos em tempo real.
* **Cartão Multimídia via QR Code:** Os presentes podem ir acompanhados de um cartão físico com QR Code, direcionando o recebedor para uma mensagem de vídeo, áudio ou texto especial gravada pelo comprador.
* **Guia de Sobrevivência da Flor:** Instruções detalhadas (físicas e digitais) enviadas aos clientes para maximizar a durabilidade e o cuidado com cada tipo de planta.

---

## 4. Requisitos do Sistema

### 4.1. Requisitos Funcionais (RF)
Os Requisitos Funcionais descrevem as ações, comportamentos e recursos que o sistema deve executar para atender às necessidades dos usuários.

#### Gerenciamento de Usuários e Autenticação
* **RF-001 (Cadastro de Cliente):** O sistema deve permitir que novos clientes criem uma conta informando e-mail, nome de usuário e senha.
* **RF-002 (Login de Cliente):** O sistema deve permitir que o cliente realize a autenticação utilizando o nome de usuário ou e-mail juntamente com a senha cadastrada.
* **RF-003 (Níveis de Acesso):** O sistema deve diferenciar os acessos entre clientes comuns e funcionários da floricultura, exibindo funcionalidades administrativas apenas para o perfil de funcionário.

#### Navegação, Catálogo e Busca
* **RF-004 (Visualização da Home):** O sistema deve exibir na página inicial os buquês mais vendidos, a seção institucional "Nossa História" e um carrossel com depoimentos recentes de clientes.
* **RF-005 (Navegação por Categorias):** O catálogo de produtos ("Nosso Jardim") deve organizar e exibir itens em formato de carrossel divididos em: *Mais Vendidos*, *Buquês Temáticos* e *Kits Presentes*.
* **RF-006 (Busca e Filtragem):** O sistema deve oferecer uma barra de pesquisa que permita buscar itens por nome (da flor, buquê ou kit) e aplicar filtros por faixa de preço, cor e tamanho.
* **RF-007 (Assinaturas Botânicas):** O sistema deve apresentar os planos de assinatura com seus respectivos valores, benefícios (como Mimos de Fidelidade) e um botões para ver mais.

#### Customização e Compra
* **RF-008 (Montador de Buquê Interativo):** O sistema deve disponibilizar uma tela interativa onde o cliente monte o seu próprio buquê, escolhendo flores, complementos (ramos, folhas, enfeites), embalagens (vasos, papel ou tecido) e decorações extras, mostrando uma prévia visual do arranjo.
* **RF-009 (Carrinho de Compras):** O sistema deve permitir a adição, remoção e atualização da quantidade de itens no carrinho de compras, exibindo o subtotal atualizado.
* **RF-010 (Atendimento Pré-Compra):** O sistema deve disponibilizar um canal de chat/contato direto com a floricultura dentro do carrinho, permitindo tirar dúvidas ou solicitar alterações antes de fechar o pedido.
* **RF-011 (Checkout e Pagamento):** O sistema deve coletar dados de entrega (CEP), dados fiscais e de contato e processar as informações de pagamento do cliente.
* **RF-012 (Cartão Multimídia):** O comprador deve ter a opção de anexar uma mensagem multimídia (vídeo, áudio ou texto) que gerará um QR Code impresso em um cartão físico junto ao pedido enviado.

#### Painel Administrativo (Funcionário)
* **RF-013 (Gestão do Catálogo):** O funcionário deve ser capaz de cadastrar, editar ou remover itens do catálogo (buquês, kits, complementos, etc.) diretamente pelo painel.
* **RF-014 (Monitoramento de Pedidos):** O sistema deve exibir para o funcionário a fila de itens comprados organizada em ordem cronológica de chegada (priorizando os mais antigos no topo).
* **RF-015 (Chat Administrativo):** O funcionário deve conseguir interagir com os clientes através de um chat vinculado à tela de pedidos recebidos para gerenciar solicitações de alteração.
* **RF-016 (Moderação de Avaliações):** O funcionário deve visualizar as avaliações enviadas pelos clientes para aprovação e monitoramento de feedback pós-venda.

---

### 4.2. Requisitos Não Funcionais (RNF)
Os Requisitos Não Funcionais especificam os critérios de qualidade, restrições e propriedades que o sistema deve possuir.

* **RNF-001 (Tecnologia de Desenvolvimento):** O backend do sistema deve ser obrigatoriamente construído em PHP e as interfaces do frontend desenvolvidas utilizando HTML5 e CSS3 de forma nativa.
* **RNF-002 (Persistência e Banco de Dados):** O sistema deve utilizar o sistema de gerenciamento de banco de dados relacional PostgreSQL para o armazenamento e consistência das tabelas de usuários, produtos e pedidos.
* **RNF-003 (Responsividade e Design):** O design de todas as páginas deve se adaptar a diferentes tamanhos de tela, mantendo estritamente a identidade estética vintage.
* **RNF-004 (Desempenho e Tempo de Carregamento):** O carregamento das páginas do catálogo e o processamento da prévia em tempo real no Montador de Buquê Interativo devem ocorrer em um tempo inferior a 2 segundos em condições normais de conexão.
* **RNF-005 (Usabilidade):** O Montador de Buquês e os carrosséis devem possuir interfaces intuitivas e limpas, de modo que qualquer usuário consiga customizar um arranjo e finalizar a compra sem a necessidade de instruções externas adicionais.

---

## 5. Estruturação de Páginas e Prototipagem

### 5.1. Interface do Cliente

* **Página Inicial (Home):**
    * Cabeçalho de navegação limpo (Catálogo, Assinaturas, Buquê Montável) e ícone de Carrinho.
    * *Hero Section* com uma pequena introdução sobre a floricultura e um botão para começar a usar o site.
    * Seção "Nossa História", trazendo o storytelling da marca para engajar o usuário.
    * Carrossel de depoimentos e avaliações.

* **Catálogo (Nosso Jardim):**
    * Barra de pesquisa.
    * Trilhas de produtos categorizados em formato de carrossel de cards.
    * Banner de destaque central.
    * Filtros integrados à pesquisa.

* **Assinaturas Botânicas:**
    * Apresentação da proposta de envios recorrentes.
    * Cards verticais detalhando os diferentes planos de assinatura com valores e botões de compra.
    * Painel inferior destacando benefícios exclusivos para assinantes.

* **Montagem de Pedido (Buquê Montável):**
    * Interface de customização.
    * Painel esquerdo dedicado à visualização do buquê sendo montado.
    * Painel direito dividido em abas interativas de seleção.
    * Botão "Continuar" para consolidar a criação e enviar ao carrinho.

* **Navegação de Apoio e Conversão:**
    * **Cadastro:** Tela limpa solicitando email, nome de usuário e senha.
    * **Login:** Autenticação via nome de usuário ou email e senha.
    * **Contatos & FAQ:** Disponibiliza número de telefone, localização física da loja, Instagram e um guia de dúvidas frequentes.
    * **Carrinho:** Armazena os itens selecionados com visualização de subtotal. 
    * **Feature especial:** Integração de um chat/contato direto com a floricultura antes da finalização do pedido para tirar dúvidas ou fazer solicitações especiais (semelhante a apps de delivery).
    * **Tela de Pagamento (Checkout):** Formulário final de conversão solicitando CEP, CPF, número de telefone e dados de pagamento.

---

### 5.2. Interface do Funcionário/Administrador

* **Painel Inicial (Dashboard):**
    * Visão geral do sistema com layout familiar ao do usuário final, porém habilitado com opções de cadastro e edição de produtos.
    * Menu de navegação administrativo com links rápidos para os painéis de acompanhamento (Pedidos, Avaliações, Mensagens).

* **Gestão de Pedidos (Itens Comprados):**
    * Tela de monitoramento visualizando os pedidos dos clientes.
    * Fila de produção organizada por ordem cronológica de chegada.

* **Atendimento Integrado (Chat com os Clientes):**
    * Central de comunicação acessada pela tela de pedidos.
    * Permite que o atendente visualize e interaja em tempo real com as mensagens e solicitações de alterações feitas pelos clientes no carrinho.

* **Moderação de Avaliações:**
    * Painel de monitoramento do *feedback* pós-compra.
    * Possibilita identificar o que os clientes postaram e utilizar essas informações para atualizar o carrossel de depoimentos da página inicial.


=======================================================================================


    FLORES DE MAIO:
- 80% Planejamento e Documentação.
- 20% Código.
Ferramentas: PHP, HTML, CSS, PostgreSQL.

Passo a Passo:
- Arquivo README sobre a descrição e desenvolvimento do projeto
- Montagem de telas principais no Figma
	- Escolha de paletas, fontes e desing (Retro ou Vintage)
- Desenvolvimento do HTML e CSS
- Programação em PHP
- Montagem do banco de dados (dump)

TELA --> Funcionário
- Login ✅
- Cadastro ✅
- Dashboard Inicial
- Gestão do Catálogo (CRUD)
- Gestão de Pedidos (Fila Cronológica)
- Central de Chat (Atendimento) --> usar a ideia do professor de levar ao zap zap
- Painel de Moderação de Avaliações


TELA --> Usuário
- Login ✅
- Cadastro ✅
- Tela inicial (institucional e avaliações)
- Catálogo
- Assinaturas
- Montador de buquê interativo
- Carrinho de compras e chat interativo --> usar a ideia do professor de levar ao zap zap
- Contatos e FAQ


<a href="EditaProduto.php?id=<?php echo $produto\\\['id']; ?>" class="btn-edit">Editar</a>
<a href="ExcluirProduto.php?id=<?php echo $produto\\\['id']; ?>" class="btn-delete">Excluir</a>

Mobile: Sistema de entregas de controle de entregas
