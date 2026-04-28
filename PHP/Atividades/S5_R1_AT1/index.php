<?php
    $precisaFuncionarios = 100; //Quantidade de funcionários para a empresa funcionar
    $temFuncionarios = 87; // Quantidade atual de funcionários

    // Para a empresa funcionar ela precisa de 100 funcionários
    if ($temFuncionarios < $precisaFuncionarios) { // Verifica se tem poucos funcionários
        echo "A empresa precisa de mais funcionários...";
    } 
    elseif ($temFuncionarios = $precisaFuncionarios) { // Se tem a quantidade necessária de funcionários
        echo "Temos funcionários suficientes!";
    }
    else { // Se tem funcionários sobrando
        echo "Temos muitos funcionários, talves seja necessário demitir alguns...";
    }
?>