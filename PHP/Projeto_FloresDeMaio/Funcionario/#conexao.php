<?php
    $host = 'localhost';
    $db   = 'flormaio';
    $user = 'postgres';
    $pass = 'postgres';
    $port = '5432';

    try {
        $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
        // Ativa o modo de erros para facilitar o debug
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro ao conectar ao banco de dados: " . $e->getMessage());
    }
?>