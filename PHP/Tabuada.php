<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABUADA</title>
    <style>
        table {
            border-collapse: collapse;
            width: 200px;
            margin-top: 20px;
        }
        th, td {
            border: 2px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: lightblue;
        }
    </style>
</head>
<body>
    <?php
        echo "<table>";
        for ($i = 1; $i <= 10; $i++) {
            echo "<tr>
                <th>Multiplicação</th>
                <th>Resultado</th>
                </tr>";
            for ($j = 1; $j <= 10; $j++){
                $multi = $i * $j;
                echo "<tr>
                <td>$i x $j</td>
                <td>$multi</td>
                </tr>";
            }
        }
        echo "</table>";
    ?>
</body>
</html>