<?php 
    setcookie("empresa", "XPTO123", time() + 3600);
    echo "Cookie Criado <br>";

    var_dump($_COOKIE); // $_COOKIE --> armazena os valores de cookies que foram armazenados no navegador do usuário e envia de volta ao servidor 
?>