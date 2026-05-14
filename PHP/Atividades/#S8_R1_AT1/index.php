<?php 
    function infoEmpresa($empresa, $abc) {
        echo "Bem-Vindo(a) ao Site da Empresa $empresa!<br>";
        echo "Aqui trabalhamos com $abc!<br>";
    }

    function quantFuncionarios($setor1, $setor2) {
        echo "Nossa empresa tem $setor1 funcionários no setor de desenvolvimento.";
        echo " E $setor2 funcionários no setor de análise.<br>";
        echo "TotalFuncionários: " ;
        return $setor1 + $setor2;
    }

    infoEmpresa("Renner", "Roupas e Acessórios Variados");
    echo quantFuncionarios(10, 14) . "<br>";
?>