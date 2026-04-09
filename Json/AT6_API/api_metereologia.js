// Importa o módulo readline para interagir com o terminal
const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

// Função utilitária para transformar o rl.question em uma Promise
const question = (str) => new Promise((resolve) => rl.question(str, resolve));

async function consultarClima() {
  console.log("--- CONSULTA METEOROLÓGICA ---");

  try {
    // Recebe o nome da cidade de forma linear com await
    const cidade = await question("Digite o nome da cidade (ex: Sao Paulo,SP): ");
    
    if (!cidade) {
      throw new Error("O nome da cidade não pode estar vazio.");
    }

    // Chave da API (Lembre-se de substituir pela sua chave real)
    const API_KEY = "SUA_CHAVE"; 
    const url = `https://api.hgbrasil.com/weather?key=${API_KEY}&city_name=${encodeURIComponent(cidade)}`;

    console.log("Consultando satélites...\n");

    // Faz a requisição HTTP GET
    const resposta = await fetch(url);
    const dados = await resposta.json();
    
    // A HG Brasil retorna os dados dentro de 'results'
    const clima = dados.results;

    // Verificação de erro da API (HG Brasil retorna campo 'city_name' se encontrar)
    if (!clima || clima.city_name === null) {
      throw new Error("Cidade não encontrada ou erro na API.");
    }

    // Exibe os dados tratados no console
    console.log(`Previsão para: ${clima.city_name}`);
    console.log(`================================`);
    console.log(`Temperatura:   ${clima.temp}°C`);
    console.log(`Condição:      ${clima.description}`);
    console.log(`Umidade:       ${clima.humidity}%`);
    console.log(`Vento:         ${clima.wind_speedy}`);
    console.log(`Nascer do Sol: ${clima.sunrise}`);
    console.log(`Pôr do Sol:    ${clima.sunset}`);
    console.log(`================================`);

  } catch (erro) {
    console.log("\n[ERRO]:", erro.message);
  } finally {
    rl.close();
  }
}

// Inicia o programa
consultarClima();