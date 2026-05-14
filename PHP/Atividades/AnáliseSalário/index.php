<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análise de Salário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <!-- Estruturação do formulário para receber as informações sobre o salário -->
        <h2>Análise Salarial</h2>
        <form method="post">
            <label for="salario">Seu Salário (R$):</label>
            <input type="number" name="salario" id="salario" placeholder="Ex: 2500.00" required>
            <p>Salário mínimo: <strong>R$ 1.621,00</strong></p>
            <input type="submit" value="Analisar Salário">
        </form>

        <?php
            // 
            if (isset($_POST["salario"])) {
                $minimo = 1621.00;
                $salario = (float) $_POST["salario"];

                // Verifica se o salário informado é maior ou menor que o salário minímo
                if ($salario < $minimo) {
                    echo "<div class='resultado'>";
                    echo "<p class='aviso'>Atenção: O valor informado é inferior ao salário mínimo de R$ 1.621,00.</p>";
                    echo "</div>";
                } else { // Faz os calculos para saber a quantidade salários minimos e quanto vai sobrar
                    $quantidadeMinimos = floor($salario / $minimo);
                    $resto = $salario - ($quantidadeMinimos * $minimo);
                    
                    // Faz as alterações necessárias para ficar com postos e vírgulas nos lugares certos
                    $salarioFormatado = number_format($salario, 2, ",", ".");
                    $restoFormatado = number_format($resto, 2, ",", ".");

                    // Montagem da tabela de análise
                    echo "<section class='resultado'>";
                    echo "<h3>Resultado</h3>";
                    echo "<p>Para um salário de <strong>R$ $salarioFormatado</strong>:</p>";
                    echo "<ul>
                            <li>Você recebe <strong>$quantidadeMinimos</strong> salário(s) mínimo(s).</li>
                            <li>A sobra é de <strong>R$ $restoFormatado</strong>.</li>
                          </ul>";
                    echo "</section>";
                }
            }
        ?>
    </main>
</body>
</html>

<!-- Anotações
    - O usuário deve informar seu salário
    - O programa vai calcular quantos salários minímos o usuário tem e sua sobra
    - OBS: Se o salário for menor que o de um salário minímo deve exibir uma mensagem na tela
-->