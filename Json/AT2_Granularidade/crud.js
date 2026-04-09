const fs = require("fs");
const prompt = require("prompt-sync");

// Menu Principal
function menu() {
    console.log("\nMenu de Contato");
    console.log("1. Adicionar Contato");
    console.log("2. Listar Contatos");
    console.log("3. Atualizar Contato");
    console.log("4. Excluir Contato");
    console.log("5. Sair");
}

function escolherGrupo() {
    console.log("\nTipo de Contato");
    console.log("1. Aluno");
    console.log("2. Professor");

    const opcao = prompt("Escolha: ");

    // Ternária --> Simplificação de uma operação 
    if (opcao === "1") return "alunos";
    if (opcao === "2") return "professores";

    console.log("Opção Inválida!");
    return null;
}

// Leitura do JSON
function lerDados() {
    const dados = fs.readFileSync("contatos.json", "utf-8");
    return JSON.parse(dados);
}

function salvarDados(dados) {
    fs.writeFileSync("contatos.json", JSON.stringify(dados, null, 2));
}

// Função para adicionar
function adicionar() {
    const grupo = escolherGrupo();
    if (!grupo) return;

    const nome = prompt("Nome: ");
    const telefone = prompt("Telefone: ");

    const dados = lerDados();
    dados[grupo].push({nome, telefone});

    salvarDados(dados);
    console.log("Contato Adicionado!");
}

// Função para listar
function listar() {
    const grupo = escolherGrupo();
    if(!grupo) return;

    const dados = lerDados();
    console.log(`\nLista de ${grupo.toUpperCase()}: `);
    dados[grupo].forEach((contato, index) => {
        console.log(`${index + 1}. ${contato.nome} - ${contato.telefone}`);
    });
}

// Função atualizar 
function atualizar() {
    const grupo = escolherGrupo();
    if (!grupo) return;

    const dados = lerDados();
    const index = parseInt(prompt("Index do Contato: ")) -1;
    if (index >= 0 && index < dados[grupo].length){
        const nome = prompt("Novo nome: ");
        const telefone = prompt("Novo telefone: ");

        dados[grupo][index] = { nome, telefone };
        salvarDados(dados);

        console.log("Contato Atualizado!");
    }

    else {
        console.log("Índice Inválido!");
    }
}

// Função deletar
function excluir() {
    const grupo = escolherGrupo();
    if (!grupo) return;

    const dados = lerDados();
    const index = prseInt(prompt("Número do contato; ")) -1;

    if (index >= 0 && index < dados[grupo].length){
        dados[grupo].splice(index, 1);
        salvarDados(dados);

        console.log("Contato Excluído!");
    }

    else {
        console.log("Índice Inválido");
    }
}

// Programa principal
function main() {
    let opcao;

    do {
        menu();
        opcao = prompt("Escolha uma opção: ");
        switch (opcao){
            case "1":
                adicionar(); // Chama a função para adicionar
                break;
            case "2":
                listar(); // Chama a função listar
                break;
            case "3":
                atualizar(); // Chama a função atualizar
                break;
            case "4":
                excluir(); // Chama a função para excluir
                break;
            case "5":
                console.log("Saindo do programa..."); // Sai do programa
                break;
            default: // Caso o valor digitado não tiver opção
                console.log("Opção inválida. Tente novamente!");
        }
    } while (opcao !== "5");
}

main();