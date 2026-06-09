<?php
    require '#conexao.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $identificacao = trim($_POST['identificacao']);
        $senha = $_POST['senha'];

        // Buscamos o usuário pelo email
        $stmt = $pdo->prepare("SELECT * FROM funcionarios WHERE identificacao = :identificacao");
        $stmt->execute([':identificacao' => $identificacao]);
        $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Comparação direta
        if ($funcionario && $senha === $funcionario['senha']) {
            $_SESSION['funcionario_id'] = $funcionario['id'];
            $_SESSION['funcionario_nome'] = $funcionario['nome'];

            header("Location: Dashboard.php");
            exit;
        } else {
            echo "Identificação ou senha incorretos.";
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login | Administrador</title>
</head>
<body>
    <?php require 'Header.php'?>
    <form method="post" action="LoginFuncionario.php">
        <label>Identificação:</label>
        <input type="text" name="identificacao" required>

        <label>Senha:</label>
        <input type="password" name="senha" required>
            
        <a href="LoginCliente.php">Cliente</a>
        <a href="CadastroFuncionario.php">Não tem uma conta?</a>

        <button type="submit">Entrar</button>
     </form>

    <?php require 'Footer.php'?>
</body>
</html>