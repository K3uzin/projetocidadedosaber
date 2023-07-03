<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style-inscricao.css">
    <title>Inscrição</title>
</head>
    
<body>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="container">
        <h2>Formulário De Inscrição</h2>

        <label for="nome_responsavel">Nome do Responsável:</label><br>
        <input type="text" id="nome_responsavel" name="nome_responsavel" required><br> 

        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br> 

        <label for="rg">RG:</label><br>
        <input type="text" id="rg" name="rg" required><br> 

        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf" required><br> 

        <label for="data_nascimento">Data de Nascimento: </label><br> 
        <input type="date" id="data_nascimento" name="data_nascimento" required><br> 

        <label for="email">E-mail:</label> <br>
        <input type="email" id="email" name="email" required>   <br> 

        <input type="submit" value="Enviar"> <br> <br> 

    </div>
    </form>

    <?php
    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Captura os dados do formulário
        $nomeResponsavel = $_POST["nome_responsavel"];
        $nome = $_POST["nome"];
        $rg = $_POST["rg"];
        $cpf = $_POST["cpf"];
        $dataNascimento = $_POST["data_nascimento"];
        $email = $_POST["email"];

        // Validação dos dados
        $errors = array();

        if (empty($nomeResponsavel)) {
            $errors[] = "O campo Nome do Responsável é obrigatório.";
        }

        if (empty($nome)) {
            $errors[] = "O campo Nome é obrigatório.";
        }

        if (empty($rg)) {
            $errors[] = "O campo RG é obrigatório.";
        }

        if (empty($cpf)) {
            $errors[] = "O campo CPF é obrigatório.";
        }

        if (empty($dataNascimento)) {
            $errors[] = "O campo Data de Nascimento é obrigatório.";
        }

        if (empty($email)) {
            $errors[] = "O campo E-mail é obrigatório.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "E-mail inválido.";
        }

        // Verifica se há erros
        if (count($errors) > 0) {
            // Exibe os erros
            echo "<div class='error-message'>";
            echo "<p>Por favor, corrija os seguintes erros:</p>";
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
            echo "</div>";
        } else {
            // Processamento dos dados (por exemplo, salvar no banco de dados)
            // ...

            // Exibição de uma mensagem de sucesso
            echo "<div class='success-message'>";
            echo "<p>Inscrição realizada com sucesso!</p>";
            echo "<p>Nome do Responsável: $nomeResponsavel</p>";
            echo "<p>Nome: $nome</p>";
            echo "<p>RG: $rg</p>";
            echo "<p>CPF: $cpf</p>";
            echo "<p>Data de Nascimento: $dataNascimento</p>";
            echo "<p>E-mail: $email</p>";
            echo "</div>";
        }
    }
    ?>
</body>
</html>
