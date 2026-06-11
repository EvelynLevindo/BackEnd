<?php 
require_once 'auth_check.php';
require_once '../Projeto_FloresDeMaio/config/db.php'; 

// Processamento de Exclusão
if (isset($_GET['delete'])) {
    pg_query_params($db, "DELETE FROM produtos WHERE id = $1", array((int)$_GET['delete']));
    header("Location: catalogo.php");
    exit;
}

// Processamento de Inserção / Edição
if (isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $preco = (float)$_POST['preco'];
    $desc = $_POST['descricao'];
    $cat = $_POST['categoria'];
    $url = $_POST['url_imagem'];
    
    if (!empty($_POST['id'])) {
        // Editar existente
        pg_query_params($db, "UPDATE produtos SET nome=$1, preco=$2, descricao=$3, categoria=$4, url_imagem=$5 WHERE id=$6", array($nome, $preco, $desc, $cat, $url, (int)$_POST['id']));
    } else {
        // Adicionar novo
        pg_query_params($db, "INSERT INTO produtos (nome, preco, descricao, categoria, url_imagem) VALUES ($1, $2, $3, $4, $5)", array($nome, $preco, $desc, $cat, $url));
    }
    header("Location: catalogo.php");
    exit;
}

// Preparação para Edição
$edit_prod = null;
if (isset($_GET['edit'])) {
    $res_edit = pg_query_params($db, "SELECT * FROM produtos WHERE id = $1", array((int)$_GET['edit']));
    $edit_prod = pg_fetch_assoc($res_edit);
}

require_once '../includes/header.php';
?>

<div class="container">
    <h2>Gestão do Catálogo (CRUD)</h2><br>
    
    <div style="background: #fff; padding: 25px; border: 1px solid #ddd; margin-bottom: 40px;">
        <h3><?php echo $edit_prod ? "Editar Produto" : "Adicionar Novo Produto"; ?></h3><br>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $edit_prod ? $edit_prod['id'] : ''; ?>">
            <div class="form-group">
                <label>Nome do Produto</label>
                <input type="text" name="nome" value="<?php echo $edit_prod ? htmlspecialchars($edit_prod['nome']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label>Preço (Ex: 120.50)</label>
                <input type="number" step="0.01" name="preco" value="<?php echo $edit_prod ? $edit_prod['preco'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label>Categoria</label>
                <input type="text" name="categoria" value="<?php echo $edit_prod ? htmlspecialchars($edit_prod['categoria']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label>URL da Imagem</label>
                <input type="url" name="url_imagem" value="<?php echo $edit_prod ? htmlspecialchars($edit_prod['url_imagem']) : ''; ?>" placeholder="https://exemplo.com/imagem.jpg" required>
            </div>
            <div class="form-group">
                <label>Descrição</label>
                <textarea name="descricao" rows="3" required><?php echo $edit_prod ? htmlspecialchars($edit_prod['descricao']) : ''; ?></textarea>
            </div>
            <button type="submit" name="salvar" class="btn btn-primary">Salvar Produto</button>
            <?php if ($edit_prod): ?> <a href="catalogo.php" class="btn btn-secondary">Cancelar</a> <?php endif; ?>
        </form>
    </div>

    <h3>Produtos Cadastrados</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $res = pg_query($db, "SELECT * FROM produtos ORDER BY id DESC");
            while ($prod = pg_fetch_assoc($res)):
            ?>
            <tr>
                <td><?php echo $prod['id']; ?></td>
                <td><?php echo htmlspecialchars($prod['nome']); ?></td>
                <td>R$ <?php echo number_format($prod['preco'], 2, ',', '.'); ?></td>
                <td><?php echo htmlspecialchars($prod['categoria']); ?></td>
                <td>
                    <a href="catalogo.php?edit=<?php echo $prod['id']; ?>" class="btn btn-secondary" style="padding:4px 10px;">Editar</a>
                    <a href="catalogo.php?delete=<?php echo $prod['id']; ?>" class="btn btn-danger" style="padding:4px 10px;" onclick="return confirm('Deseja mesmo excluir?')">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php require_once '../includes/footer.php'; ?>