<?php include 'Header.php'; ?>

<h2>Adicionar Produto</h2>

<div class="form-container">
    <form action="#" method="POST">
        <div class="form-group">
            <label>Nome do Produto:</label>
            <input type="text" name="nome" required placeholder="Ex: Buquê de Rosas Vermelhas">
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
            <input type="number" step="0.01" name="preco" required placeholder="00.00">
        </div>
        
        <div class="form-group">
            <label>Descrição:</label>
            <textarea name="descricao" rows="4" placeholder="Detalhes do produto..."></textarea>
        </div>
        
        <button type="submit" class="btn-add" style="width: 100%;">Salvar Produto</button>
    </form>
</div>

<?php include 'Footer.php'; ?>