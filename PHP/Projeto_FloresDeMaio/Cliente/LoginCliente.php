<?php
    require '#conexao.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email']);
        $senha = $_POST['senha'];

        // Buscamos o usuário pelo email
        $stmt = $pdo->prepare("SELECT * FROM clientes WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        // Comparação direta
        if ($cliente && $senha === $cliente['senha']) {
            $_SESSION['cliente_id'] = $cliente['id'];
            $_SESSION['cliente_nome'] = $cliente['nome'];

            header("Location: TelaInicial.php");
            exit;
        } else {
            echo "Email ou senha incorretos.";
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login | Cliente</title>
</head>
<body>
    <?php require 'Header.php'?>
    <form method="post" action="LoginCliente.php">
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Senha:</label>
        <input type="password" name="senha" required>
            
        <a href="LoginFuncionario.php">Administrador</a>
        <a href="CadastroCliente.php">Não tem uma conta?</a>

        <button type="submit">Entrar</button>
     </form>

    <?php require 'Footer.php'?>
</body>
</html>