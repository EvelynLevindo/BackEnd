<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
</head>
<body>
    <form method="post">
        <label>Nome: </label>
        <br>
        <input type="text" name="nome" id="nome">
        <br>
        <br>

        <label>Email: </label>
        <br>
        <input type="email" name="email" id="email">
        <br>
        <br>

        <label>Mensagem: </label>
        <br>
        <input type="text" name="msg" id="msg">
        <br>
        <br>

        <input type="reset" value="Limpar">
        <input type="submit" value="Enviar">
    </form>

    <h3>Dados Recebidos: </h3>
    <hr>

    <?php 
        // Declarando as variáveis
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $msg = $_POST["msg"];

        // Exibindo as informações
        echo "Nome: $nome <br>";
        echo "Email: $email <br>";
        echo "Mensagem: $msg <br>";
    ?>
</body>
</html>