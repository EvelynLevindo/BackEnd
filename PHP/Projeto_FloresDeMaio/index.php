<?php 
require_once 'config/db.php'; 
require_once 'includes/header.php'; 
?>

<section class="container" style="text-align: center; padding: 60px 20px;">
    <h2>Nossa História</h2>
    <p style="max-width: 600px; margin: 0 auto; font-style: italic;">
        Cultivando Memórias em Cada Pétala. Uma curadoria botânica inspiradora, onde cada pétala conta uma história de afeto.
    </p>
    <br>
    <a href="catalogo.php" class="btn btn-primary">Comece pelo Catálogo →</a>
</section>

<section class="container">
    <h3>Destaques do Jardim</h3>
    <div class="grid">
        <?php
        $res = pg_query($db, "SELECT * FROM produtos LIMIT 4");
        while ($prod = pg_fetch_assoc($res)):
        ?>
        <div class="card">
            <img src="<?php echo htmlspecialchars($prod['url_imagem']); ?>" alt="<?php echo htmlspecialchars($prod['nome']); ?>">
            <h4><?php echo htmlspecialchars($prod['nome']); ?></h4>
            <p>R$ <?php echo number_format($prod['preco'], 2, ',', '.'); ?></p><br>
            <a href="produto.php?id=<?php echo $prod['id']; ?>" class="btn btn-secondary">Ver Detalhes</a>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<section style="background-color: var(--secondary); color: var(--neutral); padding: 60px 0;">
    <div class="container" style="text-align: center;">
        <h3>Veja o que nossos clientes mais recentes comentam...</h3><br>
        <div style="display:flex; gap:20px; justify-content:center; flex-wrap:wrap;">
            <?php
            $res_av = pg_query($db, "SELECT * FROM avaliacoes ORDER BY data_envio DESC LIMIT 3");
            while ($av = pg_fetch_assoc($res_av)):
            ?>
            <div style="background: rgba(255,255,255,0.1); padding: 20px; width: 300px; border-radius:4px;">
                <p>"<?php echo htmlspecialchars($av['comentario']); ?>"</p>
                <small>— <strong><?php echo htmlspecialchars($av['nome']); ?></strong> (Nota: <?php echo $av['nota']; ?>/5)</small>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>