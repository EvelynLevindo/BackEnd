<?php 
require_once 'config/db.php'; 
require_once 'includes/header.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $nota = (int)$_POST['nota'];
    $comentario = $_POST['comentario'];
    
    $ins = pg_query_params($db, "INSERT INTO avaliacoes (nome, nota, comentario) VALUES ($1, $2, $3)", array($nome, $nota, $comentario));
    if ($ins) { $msg = "Obrigado pelo seu feedback poético!"; }
}
?>

<div class="container" style="max-width: 600px;">
    <h2>Contato & Avaliações</h2><br>
    <p><strong>Email:</strong> poesiaviva@flordemaio.com</p>
    <p><strong>Redes Sociais:</strong> @flordemaio_poesia</p>
    <br><hr><br>
    
    <h3>Envie seu Feedback</h3><br>
    <?php if (isset($msg)) echo "<p style='color:green;'>$msg</p><br>"; ?>
    
    <form method="POST">
        <div class="form-group">
            <label>Seu Nome</label>
            <input type="text" name="nome" required>
        </div>
        <div class="form-group">
            <label>Nota (1 a 5)</label>
            <select name="nota" required>
                <option value="5">5 - Excelente</option>
                <option value="4">4 - Muito Bom</option>
                <option value="3">3 - Regular</option>
                <option value="2">2 - Ruim</option>
                <option value="1">1 - Péssimo</option>
            </select>
        </div>
        <div class="form-group">
            <label>Comentário</label>
            <textarea name="comentario" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gravar Avaliação</button>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>