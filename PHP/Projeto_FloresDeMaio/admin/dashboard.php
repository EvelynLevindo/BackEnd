<?php 
require_once 'auth_check.php';
require_once '../config/db.php'; 
require_once '../includes/header.php'; // Identifica o layout admin automaticamente
?>

<div class="container">
    <h2>Painel Central de Controle</h2>
    <p>Seja bem-vindo ao ambiente operacional Flor de Maio.</p>
    
    <div class="dashboard-menu">
        <a href="catalogo.php" class="card" style="flex: 1; text-decoration: none;">
            <h4>📦 Gerenciar Catálogo</h4>
            <p>Atualize produtos, preços e descrições.</p>
        </a>
        <a href="pedidos.php" class="card" style="flex: 1; text-decoration: none;">
            <h4>📋 Gerenciar Pedidos</h4>
            <p>Veja e mude o status dos pedidos pendentes.</p>
        </a>
        <a href="avaliacoes.php" class="card" style="flex: 1; text-decoration: none;">
            <h4>💬 Ver Avaliações</h4>
            <p>Monitore os testemunhos e notas dos clientes.</p>
        </a>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>