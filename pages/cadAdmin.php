    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style-login.css">
        <link rel="stylesheet" href="../css/style-cadAdmin.css">
        <title>Login</title>
    </head>

    <body>
        <div class="login-container">
            <div class="admin-details">
                <label>ID:</label>
                <p><?php echo isset($_POST['id']) ? $_POST['id'] : ''; ?></p>
                <label>Senha:</label>
                <p><?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?></p>
            </div>


            <div class="login-box">
                <form action="../backend_pages/cadAdminB.php" method="POST">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" placeholder="Digite seu nome">

                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" placeholder="Digite seu email">

                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" placeholder="Digite sua senha">

                    <label for="phone">Telefone:</label>
                    <input type="text" id="phone" name="phone" placeholder="Digite seu telefone">

                    <label for="level">Nível:</label>
                    <select id="level" name="level">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>

                    <button type="submit">Cadastrar Administrador</button>
                </form>
