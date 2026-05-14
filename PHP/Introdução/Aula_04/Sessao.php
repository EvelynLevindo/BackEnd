<?php 
    session_start(); // Inicia a sessão para que os dados não se percam quando a página é recarregada
    $_SESSION["usuario"] = "Jorge"; // $_SESSION --> usado para armazenar e acessar as variáveis de sessões 

    echo "Usuário armazenado na sessão <br><pre>"; // <pre> </pre> --> preserva a informação como ela veio, sem retirar espaços ou quebra de linhas
    var_dump($_SESSION); // var_dump --> mostra infrmações mais detalhadas sobre a variável
    echo "</pre>";
?>