<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Cliente</title>
</head>
<body>
    <?php require "Header.php"; ?>  <!-- Copiando as informações do header para está página -->
    <div class="container">

        <!-- Formulário para o cadastro do usuário -->
        <h2>Cadastro</h2>
        <form method="post" action="telaInicial.php">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite seu nome..." required>
            
            <label>Email:</label>
            <input type="email" name="email" placeholder="usuario@exemplo.com" required>
            
            <label>Senha:</label>
            <input type="password" name="senha" placeholder="Digite a senha..." required>
            
            <input type="submit" value="Enviar Dados">
        </form>
    </div>

    <?php require "Footer.php"; ?> <!-- Copiando as informações do footer para está página -->
</body>
</html>