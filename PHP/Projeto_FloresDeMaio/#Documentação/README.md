#Flor de Maio — "Poesia Viva"

---

## 1. Escopo e Contexto da Organização

O projeto **Flor de Maio** consiste em uma plataforma de e-commerce voltada para a comercialização de arranjos e flores, com uma proposta de valor baseada em memórias afetivas e poesia. 

**Objetivo do Sistema:** Fornecer uma experiência de compra simples para clientes e um painel de gerenciamento de estoque e pedidos para funcionários, eliminando complexidades logísticas avançadas de pagamentos reais (simulação).

---

## 2. Sistema Geral

O sistema define o controle de acesso com base em dois perfis de usuários com escopos separados:

| Perfil | Nível de Acesso | Responsabilidades no Sistema |
| :--- | :--- | :--- |
| **Cliente** | Externo | Navegação no catálogo, adição de itens ao carrinho, simulação de checkout e envio de feedback. |
| **Funcionário** | Interno (Admin) | Manutenção do catálogo (CRUD), alteração de status de pedidos na fila e monitoramento de avaliações de clientes. |

---

## 3. Suporte e Recursos

A infraestrutura tecnológica para garantir a operação e a identidade visual do sistema é composta por:

* **Linguagem Backend:** PHP (processamento no lado do servidor e controle de sessões).
* **Linguagem Frontend:** HTML5 e CSS3.
* **Banco de Dados:** PostgreSQL (armazenamento relacional seguro).
* **Identidade Visual (UI/UX):** Estética "Vintage".
    * **Paleta:** Vinho Nostálgico (`#84434B`), Verde Oliva (`#7C8D75`), Rosa Antigo (`#C9918E`), Branco Pérola (`#F9F6EE`).
    * **Tipografia:** `Libre Caslon Text` (Títulos), `Courier Prime` (Corpo), `Source Sans 3` (Interface).

---

## 4. Operação: Requisitos do Sistema

O funcionamento do software foi feito através de requisitos rigorosos para atender às necessidades dos usuários.

### 4.1. Requisitos Funcionais (RF)
* **RF01:** O sistema deve permitir o cadastro e autenticação de usuários, diferenciando a interface entre Cliente e Funcionário.
* **RF02:** O sistema deve exibir um catálogo de produtos com foto, nome e preço.
* **RF03:** O cliente deve poder adicionar produtos a um carrinho de compras temporário e visualizar o valor total.
* **RF04:** O sistema deve simular o fechamento de um pedido, gerando um registro com status `Pendente`.
* **RF05:** O cliente deve conseguir enviar notas (1 a 5) e comentários via formul
* **RF06:** O funcionário deve ter acesso a um CRUD (Criar, Ler, Atualizar, Excluir) completo para o catálogo de produtos.
* **RF07:** O funcionário deve poder visualizar a fila de pedidos em ordem cronológica e alterar o status de `Pendente` para `Concluído`.

### 4.2. Requisitos Não Funcionais (RNF)
* **RNF01 (Desempenho/Arquitetura):** O carrinho de compras deve ser gerenciado puramente via Sessão (`$_SESSION`) no PHP, sem sobrecarregar o banco de dados com tabelas temporárias.
* **RNF02 (Usabilidade):** O sistema não deve exigir upload complexo de imagens; os produtos utilizarão URLs de imagens já hospedadas externamente.
* **RNF03 (Controle de Sessão):** O acesso a qualquer arquivo localizado dentro da pasta `/admin/` deve ser restrito e verificado obrigatoriamente por um script validador (`auth_check.php`). Qualquer tentativa de acesso direto via URL por utilizadores não autenticados ou sem o perfil 'admin' deve resultar no redirecionamento imediato para a página de login.
* **RNF04 (Proteção de Credenciais):** Todas as senhas de utilizadores gravadas na tabela `usuarios` devem ser obrigatoriamente criptografadas antes da sua inserção no banco de dados, utilizando a função nativa `password_hash()` do PHP com o algoritmo seguro padrão do sistema (BCRYPT ou equivalente).
* **RNF05 (Integridade Referencial):** O banco de dados PostgreSQL deve impor restrições estritas de chaves estrangeiras (`FOREIGN KEY`), utilizando regras como `ON DELETE RESTRICT` para impedir a exclusão acidental de produtos ou utilizadores que possuam vínculos históricos em pedidos realizados.
* **RNF06 (Modularidade do Código):** O código fonte da aplicação deve ser estruturado de forma modular e organizada em diretórios específicos (`config/`, `includes/`, `admin/`, `css/`). Elementos repetitivos de interface devem ser unificados em arquivos isolados (`header.php` e `footer.php`) e incluídos dinamicamente via `require_once`, eliminando redundâncias de código e facilitando futuras expansões.
* **RNF07 (Persistência do Status):** O status de um pedido alterado no painel administrativo deve ter persistência garantida, atualizando o estado do registro diretamente no banco de dados de modo a manter a fila cronológica.

---

## 5. Arquitetura de Telas e Navegação

O mapa do site está dividido nas seguintes rotas operacionais:

### 5.1. Ambiente do Cliente
* **`index.php` (Home):** História poética da marca, vitrine de destaques (4 produtos) e mural de últimos depoimentos.
* **`catalogo.php` e `produto.php`:** Grade completa de arranjos florais e página de detalhes técnicos para adição ao carrinho.
* **`carrinho.php`:** Resumo de compras, cálculos de subtotal e simulação de checkout seguro.
* **`contato.php`:** SAC e formulário de satisfação com armazenamento direto.
* **`login.php`:** Porta de entrada unificada para clientes e administração.

### 5.2. Ambiente Administrativo (`/admin/`)
* **`dashboard.php`:** Painel central de controle com acesso rápido aos módulos operacionais.
* **`catalogo.php`:** Interface administrativa contendo a tabela de produtos e formulário para cadastro/edição.
* **`pedidos.php`:** Fila de expedição e logística, controle de pendências.
* **`avaliacoes.php`:** Auditoria de qualidade e leitura dos feedbacks recebidos.

---

## 6. Modelagem de Dados

A rastreabilidade dos dados é garantida por um modelo relacional normalizado:

* **`usuarios`**: Entidade central de autenticação (id, nome, email, senha, tipo_usuario).
* **`produtos`**: Armazena os ativos do e-commerce (id, nome, preco, descricao, categoria, url_imagem).
* **`pedidos`**: Cabeçalho de compras consolidadas (id, usuario_id, valor_total, status, data_pedido).
* **`itens_pedido`**: Relacionamento 1:N que detalha o que compõe cada pedido (id, pedido_id, produto_id, quantidade, preco_unitario).
* **`avaliacoes`**: Entidade de auditoria e qualidade com as notas dos clientes (id, nome, nota, comentario, data_envio).