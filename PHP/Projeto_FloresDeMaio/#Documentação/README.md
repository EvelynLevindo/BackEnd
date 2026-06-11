# Documento de Requisitos
## Projeto: Flor de Maio — "Poesia Viva"
##### Prototipagem: 

---

## 1. Visão Geral

O projeto **Flor de Maio** é um ecommerce focado em uma experiência simples de compra e gerenciamento de estoque/pedidos, sem complexidades logísticas ou de alta segurança.

* **Identidade Visual:** Estética *Vintage* (cores nostálgicas e fontes serifadas).
* **Back-end:** PHP.
* **Front-end:** HTML5 e CSS3.
* **Banco de Dados:** PostgreSQL.

### Tabela de Controle de Acesso
| Perfil | Telas Acessíveis | Objetivo Principal |
| :--- | :--- | :--- |
| **Cliente** | Home, Catálogo, Carrinho, Contato, Login/Cadastro | Navegar, escolher produtos e simular a compra. |
| **Funcionário** | Dashboard, Controle de Catálogo, Fila de Pedidos, Avaliações | Cadastrar produtos, atualizar pedidos e ler feedbacks. |

---

## 2. Elementos Globais (Layout)

* **Área do Cliente:** Header com logotipo (link para a Home), links para *Catálogo* e *Contato*, ícones para *Carrinho* e *Perfil/Login*. Footer simples com o texto fixo: `Flor de Maio - Poesia Viva`.
* **Área do Funcionário:** Header com logotipo centralizado e botão de *Sair (Logout)*. Footer idêntico ao do cliente.

---

## 3. Arquitetura de Telas — Visão do Cliente

### 3.1. Tela Inicial (Home)
* **História:** Texto curto e poético sobre a floricultura.
* **Destaques:** Vitrine simples com 3 ou 4 produtos do catálogo.
* **Depoimentos:** Exibição de comentários reais de clientes puxados direto do banco de dados.

### 3.2. Catálogo de Produtos
* **Listagem:** Exibição dos produtos em grade (card com foto, nome, preço e botão "Ver Detalhes").
* **Página do Produto:** Detalhes do item (descrição, tipo de flor) e o botão **"Adicionar ao Carrinho"**.

### 3.3. Carrinho de Compras e Checkout
* **Listagem do Carrinho:** Exibe os itens adicionados, a quantidade, o valor individual e o valor total acumulado.
* **Finalização:** Botão **"Confirmar Pedido"**.
> **Regra Acadêmica:** O pagamento é apenas uma simulação. Ao clicar, o sistema gera o pedido no banco com o status `Pendente` e limpa o carrinho da sessão.

### 3.4. Contato e Avaliações
* **Informações:** Links fictícios de redes sociais e e-mail de contato.
* **Formulário de Feedback:** Campos para *Nome*, *Nota (1 a 5)* e *Comentário*. O envio grava os dados diretamente no banco.

### 3.5. Cadastro e Login
* Formulário básico para autenticação. A validação diferencia se o usuário é Cliente ou Funcionário e faz o redirecionamento correto.

---

## 4. Arquitetura de Telas — Visão do Funcionário (Painel Admin)

### 4.1. Dashboard Admin
* Tela central de controle com cartões de acesso rápido para as três funções administrativas:
  1. Gerenciar Catálogo
  2. Gerenciar Pedidos
  3. Ver Avaliações

### 4.2. Gestão do Catálogo (CRUD)
* **Visualização:** Tabela com todos os produtos cadastrados e botões explícitos para **Editar** e **Excluir**.
* **Formulário:** Botão *"Adicionar Novo Produto"* que abre campos para: *Nome*, *Preço*, *Descrição*, *Categoria* e *URL da Imagem* (usar links de imagens hospedadas para evitar a complexidade de upload de arquivos via PHP).

### 4.3. Gestão de Pedidos
* **Fila de Pedidos:** Listagem em ordem cronológica de chegada contendo: ID do pedido, Nome do cliente, Itens comprados, Valor Total e Status atual.
* **Alteração de Status:** Um botão simples para alternar o status do pedido de **`Pendente`** para **`Concluído`**.

### 4.4. Visualização de Avaliações
* Tela para leitura das mensagens e notas que os clientes enviaram através da página de Contato.

---

## 5. Diretrizes Técnicas de Implementação

### 5.1. Carrinho de Compras via Sessão (PHP)
O carrinho pode ser mantido puramente na memória da sessão do servidor enquanto o cliente navega, sem necessidade de tabelas temporárias no banco.

### 5.2. Controle de Acesso Simplificado
Para fins acadêmicos, a diferenciação de perfis será feita por uma coluna tipo_usuario ('cliente' ou 'admin') na tabela de usuários.
No início de cada arquivo da pasta administrativa, valida-se o acesso.