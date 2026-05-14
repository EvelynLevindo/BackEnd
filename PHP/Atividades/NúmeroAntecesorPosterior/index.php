<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antecessor e Posterior</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="tela">
        <!-- Estrutura do formulário -->
    <h3>Antecessor e Posterior</h3>
        <div class="form">
            <form method="post">
                <input type="number" name="numero" id="numero" placeholder=" " class="input">
                <label for="numero" class="input-label">Digite um número...</label>
                <input type="submit" value="Enviar" class="button">
            </form>
        </div>
    </div>
    <?php 
        // Vai verificar se a variável está nula, e depois fazer o cálculo do número antecessor e posterior
        if (isset($_POST["numero"])) {
            $numero = $_POST["numero"];
            $antecessor = $numero - 1;
            $posterior = $numero + 1;

            // Tabela de exibição dos valores
            echo "<table>";
            echo "<tr>";
            echo "<th>Antecessor</th>";
            echo "<th>Número</th>";
            echo "<th>Posterior</th>";
            echo "</tr>";
            echo "<tr>";
            echo "<td> $antecessor </td>";
            echo "<td> $numero </td>";
            echo "<td> $posterior </td>";
            echo "</tr>";
            echo "</table>";
        }
    ?>
</body>
</html>

<!-- Anotações
    - O usuário vai fornecer o número ou selecionar (^)
    - O programa vai somar mais um e diminuir um
    - Os números vão aparecer Grande na tela
-->