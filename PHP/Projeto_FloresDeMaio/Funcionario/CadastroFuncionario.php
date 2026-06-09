<?php 
    require '#conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = trim($_POST['nome']);
        $identificacao = trim($_POST['identificacao']);
        $senha = $_POST['senha'];

        try {
            $stmt = $pdo->prepare("INSERT INTO funcionarios (nome, identificacao, senha) VALUES (:nome, :identificacao, :senha)");
            $stmt->execute([
                ':nome' => $nome,
                ':identificacao' => $identificacao,
                ':senha' => $senha
            ]);

            echo "<p>Cadastro realizado com sucesso! Agora faça seu login...</p>";
        } catch (PDOException $e) {
            if ($e->getCode() == 23505) {
                echo "Esta identificação já está cadastrado...";
            } else {
                echo "Erro ao cadastrar: " . $e->getMessage();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
</head>
<body>
    <?php require 'Header.php'?>
    <form method="post" action="CadastroFuncionario.php">
        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Identificador:</label>
        <input type="text" name="identificacao" required>

        <label>Senha:</label>
        <input type="password" name="senha" required>
            
        <a href="CadastroCliente.php">Cliente</a>
        <a href="LoginFuncionario.php">Já tem uma conta?</a>

        <button type="submit">Entrar</button>
     </form>

    <?php require 'Footer.php'?>
</body>
</html>