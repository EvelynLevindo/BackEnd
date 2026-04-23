const readline = require("readline");

// Configura a interface para ler dados do console
const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout,
});

// Função assíncrona para buscar os dados na API
async function buscarRacaDeGato(raca) {
  const url = `https://api.thecatapi.com/v1/breeds/search?q=${raca}`;

  try {
    console.log("\nBuscando informações, aguarde...");

    // Faz a requisição à API
    const resposta = await fetch(url);

    // Converte a resposta para JSON
    const dados = await resposta.json();

    // Tratamento caso a API não encontre a raça
    if (dados.length === 0) {
      console.log(
        `\nNenhuma raça encontrada com o nome "${raca}". Tente nomes como "Bengal" ou "Persian".`,
      );
      return;
    }

    // Pega o primeiro resultado retornado
    const gato = dados[0];

    // Exibe os dados de forma organizada
    console.log("\n" + "=".repeat(40));
    console.log(`DADOS DA RAÇA: ${gato.name.toUpperCase()}`);
    console.log("=".repeat(40));
    console.log(`Origem:       ${gato.origin}`);
    console.log(`Temperamento: ${gato.temperament}`);
    console.log(`Tempo de Vida: ${gato.life_span} anos`);
    console.log(`Peso médio:   ${gato.weight.metric} kg`);
    console.log(`\nDescrição:\n${gato.description}`);
    console.log("=".repeat(40) + "\n");
  } catch (erro) {
    console.log("\nOcorreu um erro ao tentar acessar a API:");
    console.error(erro.message);
  } finally {
    // Encerra o programa
    rl.close();
  }
}

// Solicita a entrada do usuário pelo console
rl.question(
  "Digite o nome de uma raça de gato (ex: bengal, persian, sphynx): ",
  (respostaUsuario) => {
    if (!respostaUsuario.trim()) {
      console.log("Por favor, digite um nome válido!");
      rl.close();
      return;
    }

    buscarRacaDeGato(respostaUsuario);
  },
);
