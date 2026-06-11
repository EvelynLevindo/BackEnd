<?php 
require_once 'config/db.php'; 
require_once 'includes/header.php'; 
?>

<div class="container">
    <h2>Nosso Jardim</h2>
    <p style="margin-bottom: 30px;">Uma curadoria botânica inspiradora, onde cada pétala conta uma história de afeto.</p>
    
    <div class="grid">
        <?php
        $res = pg_query($db, "SELECT * FROM produtos ORDER BY id DESC");
        if (pg_num_rows($res) == 0) { echo "<p>Nenhum produto cadastrado no momento.</p>"; }
        while ($prod = pg_fetch_assoc($res)):
        ?>
        <div class="card">
            <img src="<?php echo htmlspecialchars($prod['url_imagem']); ?>" alt="<?php echo htmlspecialchars($prod['nome']); ?>">
            <h4><?php echo htmlspecialchars($prod['nome']); ?></h4>
            <p>R$ <?php echo number_format($prod['preco'], 2, ',', '.'); ?></p><br>
            <a href="produto.php?id=<?php echo $prod['id']; ?>" class="btn btn-primary">Ver Detalhes</a>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>