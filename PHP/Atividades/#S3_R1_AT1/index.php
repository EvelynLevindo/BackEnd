<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floricultura da Vania</title>
</head>
<body>
    <?php
    // Tipos de Dados
    $nome_empresa = "Floricultura da Vania"; // String
    $filiais = 4; // Inteiro
    $funcionarios = 16; // Inteiro
    $preco_medio = 20.99; // Float
    $fazem_entrega = true; // Booleano

    echo "<h1>$nome_empresa</h1>";
    echo "<p>Filiais da Empresa: $filiais</p>";
    echo "<p>Quantidade de Funcionários: $funcionarios</p>";
    echo "<p>Preço Médio: $preco_medio</p>";
    echo "<p>Fazem Entrega: $fazem_entrega</p>";
    ?>
</body>
</html>