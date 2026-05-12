<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário - 01</title>
</head>
<body>
    <form method="GET">
        <label name="nome">Nome: </label>
        <input type="text" name="nome" placeholder="Digite seu nome...">
        <input type="submit" value="Enviar">
    </form>

    <?php
        $nome = $_GET["nome"]; // $_GET --> Variável superglobal utilizada para coletar dados enviados por formulários HTML
        echo "<br> Nome Informado: $nome <br>";
        var_dump($_GET); // Mostra informações mais detalhadas sobre as variáveis
    ?>
</body>
</html>