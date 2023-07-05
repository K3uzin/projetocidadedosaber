<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-table.css">
    <title>Minha Página</title>
</head>

<body>
    <?php require '../includes/header.php'; ?>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>DATA ENTRADA NA FILA</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once("../Database/conexao.php");

            // Consulta ao banco de dados para obter os dados de inscrição dos usuários
            $query = "SELECT id, nome, data_entrada, status FROM inscricoes";
            $result = mysqli_query($conexao, $query);

            // Itera sobre os resultados e cria as linhas da tabela
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['data_entrada'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- O restante do conteúdo da página -->

</body>

</html>
