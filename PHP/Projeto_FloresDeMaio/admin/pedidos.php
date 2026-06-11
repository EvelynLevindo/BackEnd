<?php 
require_once 'auth_check.php';
require_once '../Projeto_FloresDeMaio/config/db.php'; 

// Alteração de Status Cronológica simplificada
if (isset($_GET['toggle_status'])) {
    $id_ped = (int)$_GET['toggle_status'];
    pg_query($db, "UPDATE pedidos SET status = 'Concluído' WHERE id = $id_ped");
    header("Location: pedidos.php");
    exit;
}

require_once '../includes/header.php';
?>

<div class="container">
    <h2>Fila de Pedidos</h2>
    <p>Acompanhamento cronológico de compras realizadas no sistema.</p>
    
    <table>
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>Cliente</th>
                <th>Itens Solicitados</th>
                <th>Valor Total</th>
                <th>Status Atual</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query unificando os dados para a listagem exigida
            $sql = "SELECT p.id, u.nome as cliente_nome, p.valor_total, p.status,
                    (SELECT string_agg(pr.nome || ' (x' || i.quantidade || ')', ', ') 
                     FROM itens_pedido i 
                     JOIN produtos pr ON pr.id = i.id_produto 
                     WHERE i.id_pedido = p.id) as itens
                    FROM pedidos p
                    JOIN usuarios u ON u.id = p.id_usuario
                    ORDER BY p.data_pedido ASC";
            
            $res = pg_query($db, $sql);
            while ($ped = pg_fetch_assoc($res)):
            ?>
            <tr>
                <td>#<?php echo $ped['id']; ?></td>
                <td><?php echo htmlspecialchars($ped['cliente_nome']); ?></td>
                <td><?php echo htmlspecialchars($ped['itens']); ?></td>
                <td style="color:var(--primary); font-weight:bold;">R$ <?php echo number_format($ped['valor_total'], 2, ',', '.'); ?></td>
                <td>
                    <span style="padding: 3px 8px; border-radius: 3px; font-weight: bold; background: <?php echo $ped['status'] == 'Pendente' ? '#ffeeba; color:#856404;' : '#d4edda; color:#155724;'; ?>">
                        <?php echo $ped['status']; ?>
                    </span>
                </td>
                <td>
                    <?php if ($ped['status'] == 'Pendente'): ?>
                        <a href="pedidos.php?toggle_status=<?php echo $ped['id']; ?>" class="btn btn-secondary" style="padding: 4px 8px;">Marcar como Concluído</a>
                    <?php else: ?>
                        <span style="color:gray; font-size:0.9em;">Sem pendências</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php require_once '../includes/footer.php'; ?>