<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionários</title>
    <style>
        /* Paleta: FFA630, CADF9E, 4DA1A9, 2E5077, 611C35 */
        body { /* Estilização de todo o body */
            background-color: #CADF9E;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2E5077;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

         .container {  /* Formatação da caixa de cadastro */
            background-color: white;
            padding: 30px;
            border-radius: 20px;
            width: 320px;
            box-shadow: 8px 8px 0px #4DA1A9;
        }

        h2 { 
            color: #611C35; 
            margin-top: 0; 
        }

        input { /* Padrão de estilo dos inputs */
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 2px solid #2E5077;
            border-radius: 8px;
            box-sizing: border-box;
        }

        input[type="submit"] { /* Estilo único do input do botão */
            background-color: #FFA630;
            color: #611C35;
            font-weight: bold;
            cursor: pointer;
            border: none;
            transition: 0.3s;
        }

        input[type="submit"]:hover { /* Deixa com a mãozinha ao passar o mouse por cima */
            background-color: #4DA1A9; 
            color: white; 
        }

        .resultado { /* Estilização da caixa dados salvas */
            margin-top: 20px;
            padding: 15px;
            background-color: #2E5077;
            color: white;
            border-radius: 10px;
            width: 320px;
        }
    </style>
</head>
<body>

    <!-- Estruturação do formulário -->
    <div class="container">
        <h2>Cadastro</h2>
        <form method="post">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite seu nome...">
            
            <label>Email:</label>
            <input type="email" name="email" placeholder="usuario@exemplo.com">
            
            <label>Senha:</label>
            <input type="password" name="senha" placeholder="Digite a senha...">
            
            <input type="submit" value="Enviar Dados">
        </form>
    </div>

    <?php 

        // Programação do formulário para devolver as informações do input
        function exibirCampo($label, $valor) {
            echo "<strong>$label</strong> $valor <br>";
        }

        if (isset($_POST["nome"], $_POST["email"], $_POST["senha"])) {  // isset --> Usada para verificar se uma variável foi declarada e se seu valor não é nulo
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            
            /* Estrutura do container para a caixa de dados salvos */
            echo "<div class='resultado'>";
            echo "<h3>Dados Salvos:</h3>";
            exibirCampo("Nome:", $nome);
            exibirCampo("Email:", $email);
            echo "</div>";
        }
    ?>
</body>
</html>