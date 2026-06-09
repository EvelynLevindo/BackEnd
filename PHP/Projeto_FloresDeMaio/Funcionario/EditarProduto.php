<?php include 'Header.php'; ?>

<div style="max-width: 500px; margin: 0 auto;">
    <a href="GestaoCatalogo.php" class="btn-back">← Voltar para o Catálogo</a>
    <h2>Editar Produto</h2>
</div>

<div class="form-container">
    <?php
        // Estrutura de captura de ID para integração
        $id_produto = isset($_GET['id']) ? $_GET['id'] : null;
        
        // Aqui você fará a query: "SELECT * FROM produtos WHERE id = $id_produto"
        // E preencherá os atributos 'value' dos campos abaixo com as variáveis geradas.
    ?>
    
    <form action="processar_edicao.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id_produto); ?>">

        <div class="form-group">
            <label>Nome do Produto:</label>
            <input type="text" name="nome" required value="" placeholder="Nome atual do banco">
        </div>
        
        <div class="form-group">
            <label>Tipo:</label>
            <select name="tipo">
                <option value="buque">Buquê</option>
                <option value="kit">Kit Presente</option>
                <option value="avulsa">Flor Avulsa</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Preço (R$):</label>
            <input type="number" step="0.01" name="preco" required value="" placeholder="0.00">
        </div>
        
        <div class="form-group">
            <label>Descrição:</label>
            <textarea name="descricao" rows="4" placeholder="Descrição atual do banco..."></textarea>
        </div>
        
        <button type="submit" class="btn-submit" style="width: 100%;">Salvar Alterações</button>
    </form>
</div>

<?php include 'Footer.php'; ?>