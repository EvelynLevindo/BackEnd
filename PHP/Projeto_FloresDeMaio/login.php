<?php 
require_once 'config/db.php'; 
require_once 'includes/header.php'; 

$erro = "";

// Ação de Cadastrar
if (isset($_POST['registrar'])) {
    $nome = $_POST['r_nome'];
    $email = $_POST['r_email'];
    $senha = password_hash($_POST['r_senha'], PASSWORD_DEFAULT);
    $tipo = $_POST['r_tipo']; // 'cliente' ou 'admin' para fins acadêmicos
    
    $res = pg_query_params($db, "INSERT INTO usuarios (nome, email, senha, tipo_usuario) VALUES ($1, $2, $3, $4)", array($nome, $email, $senha, $tipo));
    if ($res) { $sucesso = "Cadastro efetuado! Pode fazer o login."; } 
    else { $erro = "E-mail já cadastrado."; }
}

// Ação de Logar
if (isset($_POST['logar'])) {
    $email = $_POST['l_email'];
    $senha = $_POST['l_senha'];
    
    $res = pg_query_params($db, "SELECT * FROM usuarios WHERE email = $1", array($email));
    if ($user = pg_fetch_assoc($res)) {
        if (password_verify($senha, $user['senha'])) {
            $_SESSION['id_usuario'] = $user['id'];
            $_SESSION['nome_usuario'] = $user['nome'];
            $_SESSION['tipo_usuario'] = $user['tipo_usuario'];
            
            if ($user['tipo_usuario'] == 'admin') {
                header("Location: admin/dashboard.php");
            } else {
                header("Location: index.php");
            }
            exit;
        }
    }
    $erro = "E-mail ou senha inválidos.";
}
?>

<div class="container" style="display: flex; gap: 50px; flex-wrap: wrap;">
    <?php if (!empty($erro)) echo "<div style='width:100%; color:red;'>$erro</div>"; ?>
    <?php if (isset($sucesso)) echo "<div style='width:100%; color:green;'>$sucesso</div>"; ?>
    <?php if (isset($_GET['msg'])) echo "<div style='width:100%; color:orange;'>{$_GET['msg']}</div>"; ?>

    <div style="flex: 1; min-width: 280px;">
        <h3>Login</h3><br>
        <form method="POST">
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" name="l_email" required>
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="l_senha" required>
            </div>
            <button type="submit" name="logar" class="btn btn-primary">Entrar</button>
        </form>
    </div>

    <div style="flex: 1; min-width: 280px;">
        <h3>Cadastro Básico</h3><br>
        <form method="POST">
            <div class="form-group">
                <label>Nome Completo</label>
                <input type="text" name="r_nome" required>
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input type="email" name="r_email" required>
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="r_senha" required>
            </div>
            <div class="form-group">
                <label>Perfil (Fins Acadêmicos)</label>
                <select name="r_tipo">
                    <option value="cliente">Cliente</option>
                    <option value="admin">Funcionário (Admin)</option>
                </select>
            </div>
            <button type="submit" name="registrar" class="btn btn-secondary">Cadastrar</button>
        </form>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>