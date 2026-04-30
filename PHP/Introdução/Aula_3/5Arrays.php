<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Funcionários</title>
    <style>
        table {
            border-collapse: collapse;
            width: 30%;
            margin: 20px 0;
        }
        th, td {
            border: 2px solid lightblue;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: aliceblue;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Salário</th>
        </tr>
    <?php 
        $funcionarios = [
            ["nome" => "Ana", "cargo" => "Analista", "salario" => 4000],
            ["nome" => "Carlos", "cargo" => "Desenvolvedor", "salario" => 2500],
            ["nome" => "Mariana", "cargo" => "Gerente", "salario" => 10000],
            ["nome" => "João", "cargo" => "Desenvolvedor", "salario" => 2500]
        ];
        foreach ($funcionarios as $f) {
            echo "<tr> <td>" . $f["nome"] . "</td> <td>" . $f["cargo"] . "</td> <td>" . $f["salario"] . "</td> </tr>";
        }
    ?>
    </table>
</body>
</html>