const fs = require("fs");
const info = fs.readFileSync("pedidos.json", "utf-8");
const pedidos = JSON.parse(info);

console.log("=========== PEDIDOS ============\n");
console.log(`Código do Produto: ${pedidos[0].codigoProd}`);
console.log(`Cliente: ${pedidos[0].cliente}`);
console.log(`Produto(s): ${pedidos[0].produto}`);
console.log(`Total do Pedido: R$${pedidos[0].totalPedido}`);
console.log(`Entregue: ${pedidos[0].entregue}`);
console.log("\n==================================\n");