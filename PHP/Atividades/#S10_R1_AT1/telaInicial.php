<?php 
    // Sempre inicie a sessão no topo do arquivo
    session_start();

    // Verifica se os dados foram enviados via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['nome'] = $_POST['nome'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['senha'] = $_POST['senha'];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tela Inicial</title>
</head>
<body>
    <script>alert('Dados salvos com sucesso!');</script>
    
    <?php 
        require "Header.php";
        if (isset($_SESSION['nome'])) {
            echo "<h2>Bem-Vindo(a), " . htmlspecialchars($_SESSION['nome']) . "!</h2>";
        } else {
            echo "<h2>Bem-Vindo(a), Visitante!</h2>";
        }
    ?> 
    
    <button>Modo Escuro</button>
    
    <?php require "Footer.php"; ?> 
</body>
</html>