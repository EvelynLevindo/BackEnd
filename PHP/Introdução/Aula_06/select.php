<?php 

    require_once 'connect_postgres.php'; // Chama o arquivo que está fazendo a conexão do banco de dados

    $sql = "SELECT * FROM alunos";

    // stmt --> statement refere-se a um objeto PDOStatement no contexto do PDO
    $stmt = $conexao->prepare($sql); // Serve como segurança
    $stmt->execute(); // Executa o SQL

    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Pega as informações do banco de dados e armazena em um array

    foreach ($alunos as $aluno) { // Lista as informações no banco de dados
        echo "ID: {$aluno['id']}<br>";
        echo "Nome: {$aluno['nome']} {$aluno['sobrenome']}<br>";
        echo "Data de Nascimento: {$aluno['data_nascimento']}<br>";
        echo "Turma: {$aluno['turma']}<br>";
        echo "Ativo: " . ($aluno['ativo'] ? "Ativo" : "Inativo");
    }

?>