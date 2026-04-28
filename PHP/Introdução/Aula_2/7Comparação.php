<?php 
    $funcionarios = 40;
    $mediaEmpresa = $funcionarios >= 39;

    // echo "Empresa de Médio Porte?";
    // echo $mediaEmpresa;

    echo "A empresa é de: " . ($mediaEmpresa ? "Médio Porte" : "Pequeno Porte");
?>