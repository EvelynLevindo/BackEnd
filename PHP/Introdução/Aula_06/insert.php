<?php 

    require_once 'connect_postgres.php';

    $sql = "INSERT INTO alunos (
        nome, sobrenome, data_nascimento, turma
    )
    VALUES (
        :nome, :sobrenome, :data_nascimento, :turma
    )";

    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":nome", "Davi");
    $stmt->bindValue(":sobrenome", "Martins");
    $stmt->bindValue(":data_nascimento", "2008-07-30");
    $stmt->bindValue(":turma", "I2D35");

    $stmt->execute();

    echo "O aluno foi inserido com sucesso!"

?>