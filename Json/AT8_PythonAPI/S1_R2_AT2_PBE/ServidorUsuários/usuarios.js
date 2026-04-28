const fs = require("fs");
const info = fs.readFileSync("usuarios.json", "utf-8");
const usuarios = JSON.parse(info);

console.log("============ USUÁRIO ===========\n");
console.log(`Nome: ${usuarios[0].nome}`);
console.log(`Sobrenome: ${usuarios[0].sobrenome}`);
console.log(`Gênero: ${usuarios[0].genero}`);
console.log(`Nacionalidade: ${usuarios[0].nacionalidade}`);
console.log(`Telefone: ${usuarios[0].telefone}`);
console.log(`Email: ${usuarios[0].email}`);
console.log(`CPF: ${usuarios[0].cpf}`);
console.log(`Idade: ${usuarios[0].idade}`);
console.log(`Data de Cadastro: ${usuarios[0].data_cadastro}`);
console.log(`Cliente Ativo: ${usuarios[0].cliente_ativo}`);
console.log("\n==================================\n");