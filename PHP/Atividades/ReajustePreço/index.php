<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reajuste de Preço</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <label>Informe o Preço do Produto:</label>
        <input type="number" name="preco" step="0.01" required>

        <label>Reajuste do Preço (%):</label>
        <input type="number" name="porcentagem" id="porcentagem" min="0" max="100" placeholder="0" step="1" required>

        <input type="submit" value="Reajustar">
    </form>

    <?php 
        // Verificação dos valores na variável e se são números válidos
        if (isset($_POST["preco"], $_POST["porcentagem"]) && is_numeric($_POST["preco"]) && is_numeric($_POST["porcentagem"])) {
            $preco = $_POST["preco"];
            $porcentagem = $_POST["porcentagem"];

            $reajuste = ($preco * $porcentagem) / 100 + $preco; // Cálculo do reajuste de preço

            // Ajuste de ponto, vírgula e números decimais
            echo "<div class='resultado'>Novo Preço: R$ " . number_format($reajuste, 2, ',', '.') . "</div>";
        }
    ?>
</body>
</html>

<!-- Anotações
    - Montar formulário
    - Calcular o rejuste
-->