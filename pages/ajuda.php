!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-ajuda.css">
    <title>Minha Página</title>
</head>

<body>
    <?php require '../includes/header.php'; ?>
    <h1> Como podemos ajudar? </h1>

    <div class="container">
        <ul>
            <li class="lista" onclick="toggleResposta('resposta1')">Qual é o tempo de validade da senha?</li>
            <div id="resposta1" class="resposta">
                <p>O tempo de validade da senha é de 15 dias.</p>
            </div>

            <li class="lista" onclick="toggleResposta('resposta2')">Tirei senha, mas as vagas disponíveis já se encerraram, o que faço agora?</li>
            <div id="resposta2" class="resposta">
                <p>Você pode acompanhar o status da sua inscrição pela fila de espera, onde a mesma
                    irá disponibiliziar posição, validade da senha e status  da inscrição.</p>
            </div>

            <li class="lista" onclick="toggleResposta('resposta3')">Tirei senha, mas as vagas disponíveis já se encerraram, o que faço agora?</li>
            <div id="resposta3" class="resposta">
                <p></p>
            </div>
        </ul>
    </div>

    <script>
        function toggleResposta(id) {
            var resposta = document.getElementById(id);
            resposta.style.display = resposta.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>

</html>
