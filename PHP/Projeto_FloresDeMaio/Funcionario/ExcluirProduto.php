<?php include 'Header.php'; ?>

<div style="max-width: 500px; margin: 0 auto;">
    <a href="GestaoCatalogo.php" class="btn-back">← Cancelar e Voltar</a>
</div>

<div class="form-container" style="text-align: center;">
    <h2>Confirmar Exclusão</h2>
    
    <?php $id_produto = isset($_GET['id']) ? $_GET['id'] : null; ?>
    
    <p style="margin-bottom: 25px; line-height: 1.5;">
        Você tem certeza que deseja excluir permanentemente o produto <strong>[Nome do Produto via DB]</strong> (ID: <?php echo htmlspecialchars($id_produto); ?>) do banco de dados?
    </p>
    
    <form action="processar_exclusao.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id_produto); ?>">
        
        <div style="display: flex; gap: 15px;">
            <a href="catalogo.php" class="btn-add" style="background-color: #ccc; color: #333; text-align: center; flex: 1;">Não, Cancelar</a>
            <button type="submit" class="btn-submit btn-danger" style="flex: 1;">Sim, Excluir</button>
        </div>
    </form>
</div>

<?php include 'Footer.php'; ?>