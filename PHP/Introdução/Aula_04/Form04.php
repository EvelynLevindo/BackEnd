<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário - 03</title>
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

        <input type="submit" value="Enviar">
    </form>

    <?php 
        function exibirCampo($label, $valor) {
            echo "$label : $valor <br>";
        }

        if (isset ($_POST["nome"], $_POST["email"])){ // isset --> Usada para verificar se uma variável foi declarada e se seu valor não é nulo
            exibirCampo("Nome: ", $_POST["nome"]);
            exibirCampo("Email: ", $_POST["email"]);
        }

        // Outra maneira de verificar se a variável foi declarada, porém ele aparece "Nome:" e "Email:" diferente do isset que só vai aparecer caso ela não seja nulo
        
        // exibirCampo("Nome: ", $_POST["nome"] ?? "");
        // exibirCampo("Email: ", $_POST["email"] ?? "");
    ?>
</body>
</html>