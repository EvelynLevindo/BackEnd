<?php 
    function calcularTempoEmpresa($anoAtual, $anoFundacao) {
        $tempo = $anoAtual - $anoFundacao;
        echo "Tempo Empresa: $tempo anos";
    }

    calcularTempoEmpresa(2026, 2016);
?>