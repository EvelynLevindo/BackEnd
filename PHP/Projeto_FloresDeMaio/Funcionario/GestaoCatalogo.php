<?php include 'Header.php'; ?>

<div class="actions-bar">
    <input type="text" class="search-bar" placeholder="Pesquisar flor, buquê, kit presente...">
    <a href="AdicionarProduto.php" class="btn-add">+ Adicionar Novo Produto</a>
</div>

<div style="text-align: center; margin-bottom: 40px;">
    <h2>Nosso Jardim (Painel de Controle)</h2>
</div>

<div class="catalog-section">
    <h3>Mais Vendidos</h3>
    <div class="product-row">
        <?php 
        // Exemplo de como ficará a lógica de integração:
        // if (pg_num_rows($result_mais_vendidos) > 0) { ... loop ... } else {
        ?>
        <p class="empty-msg">Nenhum produto cadastrado nesta categoria no banco de dados.</p>
        <?php // } ?>
    </div>
</div>

<div class="catalog-section">
    <h3>Buquês Temáticos</h3>
    <div class="product-row">
        <p class="empty-msg">Nenhum produto cadastrado nesta categoria no banco de dados.</p>
    </div>
</div>

<div class="catalog-section">
    <h3>Kits Presentes</h3>
    <div class="product-row">
        <p class="empty-msg">Nenhum produto cadastrado nesta categoria no banco de dados.</p>
    </div>
</div>

<?php include 'Footer.php'; ?>