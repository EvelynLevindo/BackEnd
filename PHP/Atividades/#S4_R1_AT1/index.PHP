<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🦜</title>
</head>
<body>
    <?php
        $num1 = 3; // Número 1
        $num2 = 7; // Número 2

        // Exibição dos valores
        echo "Funcionários Empresa XPTO123: " . $num1;
        echo "<br>";
        echo "Funcionários Empresa HVTE098: " . $num2;
        echo "<br>";

        // Junção dos funcionários
        $soma = $num1 + $num2;
        echo "Soma de Funcionários: " . $soma;
        echo "<br>";

        // Subtração dos funcionários
        $subtracao = $num1 + $num2;
        echo "Subtração de Funcionários: " . $subtracao;
        echo "<br>";

        // Comparação
        echo "Qual dos resultados é MAIOR que 5?" . ($subtracao >= 5 ? " Soma: " . $soma : " Subtração: " . $subtracao); // Ternário
        echo "<br>";
    ?>
</body>
</html>