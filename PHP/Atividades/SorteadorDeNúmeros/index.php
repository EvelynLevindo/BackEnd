<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteador de Números</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Sorteador de Números</h1>
        <div class="sorteador">
            <?php
                $numeros = []; // Array que vai guardar os números sorteados
                for ($i = 0; $i < 6; $i++) { // Vai contolar a quantidade de números sorteados
                    $numero = rand(1, 60); // Vai sortear números aleatórios de 1 a 60
                    while (in_array($numero, $numeros)) { // Enquanto o último número sorteado for igual a um número dentro do array ele ficará em looping
                        $numero = rand(1, 60);
                    }
                    $numeros [] = $numero; // Armazenando o número sortado no array
                }
                sort($numeros); // Organiza os número em ordem crescente

                // Formata para ter sempre 2 dígitos
                foreach ($numeros as $num) {
                    $exibir = str_pad($num, 2, "0", STR_PAD_LEFT);
                    echo "<div class='numeros'>$exibir</div>";
                }
            ?>
        </div>
        <a href="?" class="button-sortear">SORTEAR NOVAMENTE</a>
    </div>
</body>
</html>

<!-- Anotações
    - Vai ter a função que vai sortear
    - Fazer um for que passará 6 vezes
    - Ao finaizar o looping, terá 6 número em um array
    - OBS: Não posso deixar números repetidos!
-->