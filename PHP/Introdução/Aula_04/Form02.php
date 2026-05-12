<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário - 02</title>
</head>
<body>
    <form method="post">
        <label>Email: </label>
        <input type="email" name="email" id="email" placeholder="email@dominio.com">
        <br>
        <label>Senha: </label>
        <input type="password" name="senha" id="senha">
        <input type="submit" value="Enviar">
    </form>

    <?php 
        $email = $_GET["email"];
        echo "Email Informado: $email";
        echo "Login Confirmado!"
    ?>
</body>
</html>