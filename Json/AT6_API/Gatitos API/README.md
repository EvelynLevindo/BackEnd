# Documentação: Raças de Gatos

Este script em Node.js permite que o usuário digite o nome de uma raça de gato no console e receba informações detalhadas como **origem**, **temperamento**, **expectativa de vida** e **descrição**.

## 🛠️ Tecnologias Utilizadas
* **Node.js**: Ambiente de execução.
* **Interface Readline**: Para capturar a digitação do usuário no terminal.
* **Fetch API**: Para realizar requisições HTTP (nativo a partir do Node.js v18).
* **TheCatAPI**: Fonte de dados externa.

## 🚀 Como Executar
1. Certifique-se de ter o Node.js instalado (versão 18 ou superior).
2. Salve o arquivo como `api_gatos.js`.
3. No terminal, execute:
   ```bash
   node api_gatos.js
   ```
4. Digite o nome de uma raça (ex: `Siberian`, `Maine Coon` ou `Persian`).

---

## 📂 Estrutura do Código

O script é dividido em três partes principais:

| Parte | Descrição |
| :--- | :--- |
| **Configuração** | Importa o módulo `readline` e configura a entrada/saída de dados via console. |
| **Função `buscarRacaDeGato`** | Função assíncrona que faz o `fetch` na API, trata o JSON e exibe os dados formatados. |
| **Interface de Usuário** | Pergunta ao usuário qual raça ele deseja pesquisar e valida se a entrada não está vazia. |

---

## ⚠️ Observação Importante (Correção de Bug)

Notei um pequeno detalhe: no final do seu código, você está chamando a função como `racaGato(respUsu)`, mas o nome da função definida lá no topo é `buscarRacaDeGato`. 

Para o código funcionar sem erros, a chamada final deve ser:
```javascript
// Onde está assim:
racaGato(respUsu);

// Mude para:
buscarRacaDeGato(respUsu);
```

---

## 📝 Exemplo de Saída
Ao pesquisar por "Bengal", o console exibirá algo como:
> **DADOS DA RAÇA: BENGAL**
> 
> **Origem:** United States  
> **Temperamento:** Alert, Agile, Energetic, Gentle, Intelligent  
> **Tempo de Vida:** 12 - 15 anos  
> **Descrição:** Bengals are a lot of fun to live with, but they're definitely not the cat for everyone...

---

## 🛡️ Tratamento de Erros
O código já inclui um bloco `try...catch` para lidar com:
* Falhas de conexão com a API.
* Nomes de raças que não existem no banco de dados da API.
* Encerramento seguro do processo com `rl.close()`.