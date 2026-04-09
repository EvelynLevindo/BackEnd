// Se vamos usar o JSON para armazenamento de dados, então ele será um File System (fs)
// Isso significa que suas informações serão lidas e escritas em hierarquia
const fs = require("fs");
const prompt = require("prompt-sync")();

// Criando o menu de opções
function menu() {
    console.log("\nMenu de Contatos:");
    console.log("1. Adicionar Contato");
    console.log("2. Listar Contatos");
    console.log("3. Atualizar Contatos");
    console.log("4. Excluir Contato");
    console.log("5. Sair");
}

// Função principal para executar o programa
function main() {
    let opcao; // Let --> Só pode ser armazenado dentro de uma função (escopo de variável)
    do { // É um bloco de código de repetição que garante pelo menos uma execução (faça... enquanto)
        menu();
        opcao = prompt("Escolha Uma Opção... \n");
        switch (opcao) {
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
    }
    while (opcao !== "5");
}

// Função para ler os dados do arquivo JSON
function lerDados() {
    const dados = fs.readFileSync("contatos.json", "utf-8"); // Criou uma constante que leu e armazenou as informações do arquivo JSON
    // utf-8 --> Se tiver alguma acentuação diferente no arquivo JSON, ele vai saber ler por conta da especificação de "idioma"
    return JSON.parse(dados || "[]"); // Transformando o JSON em um Array
    // Retorna um Array vazio se não houver dados
}

// Função para adicionar um novo contato
function adicionar() {
    const nome = prompt("Digite o nome do contato: ");
    const telefone = prompt("Digite o telefone do contato: ");
    const contatos = lerDados(); // Associando a constante contatos a função lerDados

    contatos.push({nome, telefone}); // Vai adicionar o nome e o telefone no Array
    salvarDados(contatos);
    console.log("Contato Adicionado!");
}

// Função para listar os contatos
function listar() {
    const contatos = lerDados();
    console.log("Contatos: ");
    contatos.forEach((contato, index) => {
        console.log(`${index + 1}. ${contato.nome} - ${contato.telefone}`); // Exibindo na tela do usuário as informações vindas do JSON
        // ` e $, indica que está chamando uma variável
    })
}

// Função para atualizar um contato
function atualizar() {
    const indexAtualizar = parseInt(prompt("Digite o ID do contato a ser atualizado: ")) -1; // Pedindo para o usuário digitar o ID, porém fazendo a resposta virar um número e fazendo -1, para assim ficar igual ao indice
    const contatos = lerDados(); // Temos sempre que chamar as informações para serem atualizadas

    if(indexAtualizar >= 0 && indexAtualizar < contatos.length) { // Vai estar verificando se os valores inputados são possiveis (ex: não dá para ter um indice < 0) e se corrsponde aos operadores
        const novoNome = prompt("Digite o novo nome do contato: ");
        const novoTelefone = prompt("Digite o novo número: ");

        contatos[indexAtualizar] = { nome: novoNome, telefone: novoTelefone}; // Vai substituir os valores antigos, pelos novos valores digitados pelo usuário
        salvarDados(contatos);
        console.log("Contato Atualizado!");
    }

    else {
        console.log("Índice Inválido!");
    }
}

// Função para excluir um contato
function excluir() {
    const indexExcluir = parseInt(prompt("Digite o número do contato a ser excluído: ") -1); // Vai fazer a mesma coisa  que o atualizar contatos
    const contatos = lerDados();

    if(indexExcluir >= 0 && indexExcluir < contatos.length) {
        contatos.splice(indexExcluir, 1); // Vai cortar a posição indicada
        salvarDados(contatos);
        console.log("Contato Excluído!");
    }

    else {
        console.log("Índice Inválido!")
    }
}

// Função para "salvar"/gravar os dados no JSON
function salvarDados(contatos) {
    fs.writeFileSync("contatos.json", JSON.stringify(contatos, null, 2));
}

// Inicia o programa
main();