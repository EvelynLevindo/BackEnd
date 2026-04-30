<?php 
    $funcionarios = ["Ana", "Bárbara", "Davi", "Evelyn", "Gabriela"]; // Array com o nome dos funcionários

    echo "<h3>FUNCIONÁRIOS</h3>"; // Título

    // Repetição para que todos os funcionários sejam listados
    for ($i = 0; $i < count($funcionarios); $i++) {
        echo $funcionarios[$i] . "<br>";
    }
?>