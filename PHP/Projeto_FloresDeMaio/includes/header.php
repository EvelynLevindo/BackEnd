<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Flor de Maio — Poesia Viva</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header class="<?php echo (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'admin') ? 'admin-header' : ''; ?>">
    <div class="logo">
        <a href="index.php"><img src="image/Logo1.png" alt="Flor de Maio" height="50"></a>
    </div>
    <?php if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 'admin'): ?>
        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="catalogo.php">Controle de Catálogo</a>
            <a href="pedidos.php">Fila de Pedidos</a>
            <a href="avaliacoes.php">Avaliações</a>
        </nav>
        <div class="icons">
            <span style="color: #fff; font-family: var(--font-label);">Olá, administrador</span>
            <a href="../logout.php" class="btn btn-primary" style="padding: 5px 10px; margin-left: 10px;">Sair</a>
        </div>
    <?php else: ?>
        <nav>
            <a href="index.php">Início</a>
            <a href="catalogo.php">Catálogo</a>
            <a href="contato.php">Contato</a>
        </nav>
        <div class="icons">
            <a href="carrinho.php">🛒 Carrinho 
                (<?php echo isset($_SESSION['carrinho']) ? array_sum($_SESSION['carrinho']) : 0; ?>)
            </a>
            <?php if (isset($_SESSION['id_usuario'])): ?>
                <a href="logout.php">Sair</a>
            <?php else: ?>
                <a href="login.php">👤 Login/Cadastro</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</header>