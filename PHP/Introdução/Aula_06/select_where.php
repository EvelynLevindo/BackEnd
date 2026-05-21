<?php 

    require_once 'connect_postgres.php';

    $id = 2;
    $sql = "SELECT * FROM alunos WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();

    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "Aluno: {$aluno['nome']} {$aluno['sobrenome']} <br>
    Data de Nascimento: {$aluno['data_nascimento']} <br>
    Turma: {$aluno['turma']}<br>";
    echo "Ativo: " . ($aluno['ativo'] ? "Ativo" : "Inativo");
    
?>