<?php 
require_once 'config/db.php'; 
require_once 'includes/header.php'; 

$id = (int)$_GET['id'];
$res = pg_query_params($db, "SELECT * FROM produtos WHERE id = $1", array($id));
$prod = pg_fetch_assoc($res);

if (!$prod) {
    echo "<div class='container'><h2>Produto não encontrado!</h2></div>";
    require_once 'includes/footer.php';
    exit;
}

// Lógica de Adicionar ao Carrinho via Sessão
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['carrinho'])) { $_SESSION['carrinho'] = array(); }
    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id]++;
    } else {
        $_SESSION['carrinho'][$id] = 1;
    }
    header("Location: carrinho.php");
    exit;
}
?>

<div class="container" style="display: flex; gap: 40px; align-items: center; flex-wrap: wrap;">
    <div style="flex: 1; min-width: 300px;">
        <img src="<?php echo htmlspecialchars($prod['url_imagem']); ?>" alt="<?php echo htmlspecialchars($prod['nome']); ?>" style="width:100%; max-height:450px; object-fit:cover; border: 1px solid #ddd;">
    </div>
    <div style="flex: 1; min-width: 300px;">
        <h2><?php echo htmlspecialchars($prod['nome']); ?></h2>
        <p style="font-size: 1.2em; color: var(--primary); font-weight: bold; margin: 15px 0;">
            R$ <?php echo number_format($prod['preco'], 2, ',', '.'); ?>
        </p>
        <p><strong>Categoria:</strong> <?php echo htmlspecialchars($prod['categoria']); ?></p><br>
        <p><?php echo nl2br(htmlspecialchars($prod['descricao'])); ?></p><br>
        
        <form method="POST">
            <button type="submit" class="btn btn-primary">Adicionar ao Carrinho 🛒</button>
        </form>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>