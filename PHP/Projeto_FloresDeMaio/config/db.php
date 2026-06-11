<?php
$host = "localhost";
$port = "5432";
$dbname = "flormaio";
$user = "postgres";
$password = "postgres";

$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password}";
$db = pg_connect($connection_string);

if (!$db) {
    die("Erro na conexão com o banco de dados.");
}
?>