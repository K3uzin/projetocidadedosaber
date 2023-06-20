<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    <link rel="stylesheet" href="../css/style-login.css">  -->
    <title>Login</title>
    <style>
        .show-password-label {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-family: Verdana, sans-serif;
            font-size: 12px;
        }

        .show-password-label input {
            margin-right: 5px;
        }

        .checkbox-container {
            position: relative;
            top: -3px;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <?php
        // Verifique se os valores de ID e senha foram enviados
        if (isset($_POST['id']) && isset($_POST['password'])) {
            // Exiba o ID e a senha (código HTML)
            echo '<div class="admin-details">
                <label>ID:</label>
                <p>' . $_POST['id'] . '</p>

                <label>Senha:</label>
                <p>' . $_POST['password'] . '</p>
            </div>';

            // Redirecione para cadAdmin.php após 5 segundos
            header("refresh:5;url=cadAdmin.php");
            exit(); // Certifique-se de sair do script após o redirecionamento
        }
        ?>

        <form action="../backend_pages/AdminB.php" method="POST">
            <!-- Formulário -->
            <label for="nome">ID:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome">

            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" placeholder="Digite sua senha">

            <div class="show-password-label">
                <span class="checkbox-container">
                    <input type="checkbox" id="show-password">
                </span>
                <label for="show-password">Mostrar senha</label>
            </div>

            <button type="submit">Entrar</button>
        </form>

        <p>
            Não tem uma conta? <a href="cadAdmin.php">Cadastrar Administrador</a>
        </p>
    </div>

    <script>
        const showPasswordCheckbox = document.getElementById('show-password');
        const passwordInput = document.getElementById('password');

        showPasswordCheckbox.addEventListener('change', function () {
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
</body>

</html>
