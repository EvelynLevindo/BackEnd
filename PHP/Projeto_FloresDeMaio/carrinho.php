<?php 
require_once 'config/db.php'; 
require_once 'includes/header.php'; 

// Ação de Limpar/Remover item
if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    unset($_SESSION['carrinho'][(int)$_GET['id']]);
    header("Location: carrinho.php");
    exit;
}

// Checkout Simulado (Regra de Negócio Acadêmica)
if (isset($_POST['checkout'])) {
    if (!isset($_SESSION['id_usuario'])) {
        header("Location: login.php?msg=Precisa fazer login para fechar o pedido!");
        exit;
    }
    
    if (!empty($_SESSION['carrinho'])) {
        $id_usuario = $_SESSION['id_usuario'];
        $valor_total = (float)$_POST['total'];
        
        // Insere Pedido Pendente
        $res_ped = pg_query_params($db, "INSERT INTO pedidos (id_usuario, valor_total, status) VALUES ($1, $2, 'Pendente') RETURNING id", array($id_usuario, $valor_total));
        $ped = pg_fetch_assoc($res_ped);
        $id_pedido = $ped['id'];
        
        // Insere itens do pedido
        foreach ($_SESSION['carrinho'] as $id_prod => $qtd) {
            $res_p = pg_query_params($db, "SELECT preco FROM produtos WHERE id = $1", array($id_prod));
            $p = pg_fetch_assoc($res_p);
            pg_query_params($db, "INSERT INTO itens_pedido (id_pedido, id_produto, quantidade, preco_unitario) VALUES ($1, $2, $3, $4)", array($id_pedido, $id_prod, $qtd, $p['preco']));
        }
        
        // Limpa Carrinho
        unset($_SESSION['carrinho']);
        $sucesso = true;
    }
}
?>

<div class="container">
    <h2>Seu Carrinho de Compras</h2><br>
    
    <?php if (isset($sucesso)): ?>
        <blockquote style="background: #d4edda; color: #155724; padding: 20px; border-left: 5px solid #28a745;">
            <strong>Pedido Realizado com Sucesso (Simulação)!</strong> O status do seu pedido está como 'Pendente'.
        </blockquote>
    <?php elseif (empty($_SESSION['carrinho'])): ?>
        <p>Seu carrinho está vazio. Visite nosso <a href="catalogo.php">Catálogo</a>.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Qtd</th>
                    <th>Valor Unitário</th>
                    <th>Subtotal</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total_geral = 0;
                foreach ($_SESSION['carrinho'] as $id_prod => $qtd): 
                    $res = pg_query_params($db, "SELECT * FROM produtos WHERE id = $1", array($id_prod));
                    $prod = pg_fetch_assoc($res);
                    $subtotal = $prod['preco'] * $qtd;
                    $total_geral += $subtotal;
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($prod['nome']); ?></td>
                    <td><?php echo $qtd; ?></td>
                    <td>R$ <?php echo number_format($prod['preco'], 2, ',', '.'); ?></td>
                    <td>R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                    <td><a href="carrinho.php?action=remove&id=<?php echo $id_prod; ?>" class="btn btn-danger" style="padding: 2px 7px;">Remover</a></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" style="text-align: right; font-weight: bold;">Valor Total Acumulado:</td>
                    <td colspan="2" style="font-weight: bold; color: var(--primary);">R$ <?php echo number_format($total_geral, 2, ',', '.'); ?></td>
                </tr>
            </tbody>
        </table>
        
        <br>
        <form method="POST" style="text-align: right;">
            <input type="hidden" name="total" value="<?php echo $total_geral; ?>">
            <button type="submit" name="checkout" class="btn btn-primary">Confirmar Pedido</button>
        </form>
    <?php endif; ?>
</div>

<?php require_once 'includes/footer.php'; ?>