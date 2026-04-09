// Express para criação de APIs
const express = require('express');

// FS para leitura e escrita de arquivos
const fs = require('fs');

// Cria a aplicação express
const app = express();

// Defini a porta do servidor
const PORT = 3000;

// Permite o servidor entender JSON enviado no Body
// req.body fica unfined
app.use(express.json());

// Chama o arquivo JSON (BD)
const ARQUIVO = "./contatos.json";

// Ler dados
function lerDados() {
    // Lê conteúdo do arquivo
    const dados = fs.readFileSync(ARQUIVO, "utf-8");

    // Converto JSON em objeto JS
    return JSON.parse(dados);
}

function salvarDados(dados) {
    // Converte o objeto em JSON
    // null, 2 para identificação de 2 espaços
    fs.writeFileSync(ARQUIVO, JSON.stringify(dados, null, 2));
}

// Rota para busca de contatos
app.get("/contatos/:grupo", (req, res) => { // onde :grupo é o parâmetro que vamos receber na URL
    const grupo = req.params.grupo; // Faz a requisição dos parametros (grupo)
    const dados = lerDados();

    if (!dados[grupo]) {
        return res.status(404).json({ erro: "Grupo não encontrado..."})
    }

    res.json(dados[grupo]);
});

// Rota para adicionar contatos
app.post("/contatos/:grupo", (req, res) => {
    const grupo = req.params.grupo;
    const {nome, telefone} = req.body;
    const dados = lerDados();

    // Validar se o grupo existe
    if (!dados[grupo]) {
        return res.status(404).json({ erro: "Grupo não encontrado..."});
    }

    // Verifica se o nome e telefone tem valor
    if (!nome || !telefone) {
        return res.status(404).json({ erro: "Grupo não encontrado..."});
    }

    // Adiciona o novo contato
    dados[grupo].push({ nome, telefone});

    // Salvar no JSON
    salvarDados(dados);

    res.status(201).json({
        mensagem: "Contato Adicionado com Sucesso!",
        contato: {nome, telefone}
    });
});

// Rota para atualizar um contato (PUT)
app.put("/contato/:grupo/:index", (req, res) => {
    const grupo = req.params.grupo;
    const index = parseInt(req.params.index);
    const {nome, telefone} = req.body;
    const dados = lerDados();

    // Validar se o grupo existe
    if (!dados[grupo]){
        return res.status(404).json({ erro: "Grupo não encontrado..."});
    }

    if (index < 0 || index >= dados[grupo].length) {
        return res.status(404).json({ erro: "Grupo não encontrado..."});
    }

    // Atualizar o contato
    dados[grupo][index] = {nome, telefone};
    salvarDados(dados);

    // Retorna a confrmação para o usuário
    res.json({
        mensagem: "Contato Atualizado com Sucesso!",
        contato: dados[grupo][index]
    });
});

app.delete("/contato/:grupo/:index", (req, res) => {
    const grupo = req.params.grupo;
    const index = parseInt(req.params.index);
    const dados = lerDados();

    if (!dados[grupo]) {
        return res.status(404).json({ erro: "Contato não encontrado..."});
    }
    const removido = dados[grupo].splice(index, 1);
    salvarDados(dados);

    res.json({
        mensagem: "Contato Excluído com Sucesso!",
        contato: removido[0]
    });
});

app.listen(PORT, () => {
    console.log(`API Rodando em http://localhost:${PORT}`);
});