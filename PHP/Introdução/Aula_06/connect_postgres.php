<?php 
    $host = "localhost";
    $dbnome = "escola";
    $usuario = "postgres";
    $senha = "postgres";

    try {
        $conexao = new PDO ( // Instânciando a variável
            "pgsql:host=$host;dbname=$dbnome",
            $usuario,
            $senha
        );
        echo "Conexão com o Postgres, ok!<br>";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }

    
?>