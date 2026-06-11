<?php 
require_once 'auth_check.php';
require_once '../Projeto_FloresDeMaio/config/db.php'; 
require_once '../includes/header.php';
?>

<div class="container">
    <h2>Avaliações Recebidas</h2>
    <p>Mensagens coletadas diretamente do formulário de contato.</p><br>
    
    <div class="grid">
        <?php
        $res = pg_query($db, "SELECT * FROM avaliacoes ORDER BY data_envio DESC");
        if (pg_num_rows($res) == 0) { echo "<p>Nenhum feedback recebido ainda.</p>"; }
        while ($av = pg_fetch_assoc($res)):
        ?>
        <div class="card" style="text-align: left; background: #fff;">
            <h4><?php echo htmlspecialchars($av['nome']); ?></h4>
            <p style="color: orange; font-size: 1.2em; margin-bottom: 10px;">
                <?php echo str_repeat("★", $av['nota']) . str_repeat("☆", 5 - $av['nota']); ?>
            </p>
            <p style="font-style: italic;">"<?php echo nl2br(htmlspecialchars($av['comentario'])); ?>"</p><br>
            <small style="color: #777;">Enviado em: <?php echo date('d/m/Y H:i', strtotime($av['data_envio'])); ?></small>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>