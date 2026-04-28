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

        echo "Número 1: " . $num1;
        echo "<br>";
        echo "Número 2: " . $num2;
        echo "<br>";

        $soma = $num1 + $num2;
        echo "Soma: " . $soma;
        echo "<br>";

        $subtracao = $num1 + $num2;
        echo "Subtração: " . $subtracao;
        echo "<br>";

        echo "Qual dos resultados é MAIOR que 5?" . ($subtracao >= 5 ? " Soma: " . $soma : " Subtração: " . $subtracao);
        echo "<br>";
    ?>
</body>
</html>