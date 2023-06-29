<!DOCTYPE html>
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
            <li class="lista" onclick="toggleResposta('resposta1')" class="seta">Qual é o tempo de validade da senha?<img src="../img/seta.svg">
            <div id="resposta1" class="resposta">
                <p>O tempo de validade da senha é de 15 dias.</p>
            </div>
            </li>
            <li class="lista" onclick="toggleResposta('resposta2')" class="seta">Tirei senha, mas a vagas disponíveis já se encerraram o que faço agora ?<img src="../img/seta.svg">
            <div id="resposta2" class="resposta">
                <p>Você pode acompanhar o status da sua inscrição pela fila de espera, onde a mesma irá disponibilizar posição,</p>
                <p>validade da senha e status  da inscrição.</p>
            </div>
            </li>
            <li class="lista" onclick="toggleResposta('resposta3')" class="seta">Quais cursos estão disponíveis para retirada de senhas?<img src="../img/seta.svg">
            <div id="resposta3" class="resposta">
                <p>O sistema permite a retirada de senhas para diversos cursos oferecidos pela Secretaria de Educação de Camaçari. 
                 <p>Ao acessar o sistema, você verá a lista completa de cursos disponíveis para seleção.</p>
            </div>
            </li>
            <li class="lista" onclick="toggleResposta('resposta4')" class="seta">O que acontece se todas as vagas para o curso escolhido já estiverem encerradas?<img src="../img/seta.svg">
            <div id="resposta4" class="resposta">
                <p>Se todas as vagas para o curso escolhido já estiverem encerradas, você poderá retirar uma senha de espera.
                <p>Nesse caso, você será colocado em uma fila de espera e poderá aguardar a abertura de novas vagas ou a desistência
                <p>de outros alunos.</p>
            </div>
            </li>
            <li class="lista" onclick="toggleResposta('resposta5')" class="seta">Quanto tempo tenho para realizar a inscrição após retirar a senha?<img src="../img/seta.svg">
            <div id="resposta5" class="resposta">
                <p>Após retirar a senha, você tem um prazo de 15 dias para realizar a inscrição no curso desejado. É importante
                <p>ficar atento(a) ao prazo e realizar a inscrição dentro desse período.</p>
            </div>
            </li>
            <li class="lista" onclick="toggleResposta('resposta6')" class="seta">O que acontece se eu não realizar a inscrição dentro do prazo de 15 dias?<img src="../img/seta.svg">
            <div id="resposta6" class="resposta">
                <p>Se você não realizar a inscrição dentro do prazo de 15 dias, sua senha será invalidada e você perderá a sua vez. 
                <p>Nesse caso, será necessário retirar uma nova senha quando desejar se inscrever novamente.</p>
            </div>
            </li>
            <li class="lista" onclick="toggleResposta('resposta7')" class="seta">Como posso verificar se há vagas disponíveis em um curso antes de retirar a senha?<img src="../img/seta.svg">
            <div id="resposta7" class="resposta">
                <p>O sistema de retirada de senhas não permite verificar a disponibilidade de vagas antes de retirar a senha. Ao acessar
                <p> o sistema, você poderá ver apenas as informações dos cursos e, optar para a retirada de senhas, e caso não haja
                <p> mais vagas disponíveis, você irá ser colocado numa fila de espera caso haja desistência ou abertura de novas
                <p> turmas.</p>
            </div>
            </li>
            <li class="lista" onclick="toggleResposta('resposta8')" class="seta">Posso retirar senhas para mais de um curso ao mesmo tempo?<img src="../img/seta.svg">
            <div id="resposta8" class="resposta">
                <p>Sim, é possível retirar senhas para mais de um curso ao mesmo tempo. Você pode selecionar os cursos desejados e 
                <p>retirar as senhas individualmente. No entanto, lembre-se de que você terá um prazo de 15 dias para cada curso para 
                <p>realizar as inscrições correspondentes.</p>
            </div>
            </li>
            <li class="lista" onclick="toggleResposta('resposta9')" class="seta">Como funciona a fila de espera?<img src="../img/seta.svg">
            <div id="resposta9" class="resposta">
                <p>A fila de espera é uma lista ordenada dos alunos que não conseguiram retirar uma senha para um curso específico  
                <P>devidoà falta de vagas. Os alunos que não conseguiram uma senha serão automaticamente adicionados à fila  
                <p>e a prioridade será determinada pela ordem de chegada. Quando uma vaga se torna disponível, ela é oferecida
                <p>de espera, ao próximo aluno na fila de espera.</p>
            </div>
            </li>
            <li class="lista" onclick="toggleResposta('resposta10')" class="seta">Como posso acompanhar minha posição na fila de espera?<img src="../img/seta.svg">
            <div id="resposta10" class="resposta">
                <p>Você pode acompanhar sua posição na fila de espera ao acessar o sistema de retirada de senhas. Geralmente, o 
                <p>sistema exibirá informações sobre a sua posição atual na fila e o número de alunos que estão à sua frente. Verifique   
                <p> regularmente essa informação para monitorar o seu progresso.</p>
            </div>
            </li>
            <li class="lista" onclick="toggleResposta('resposta11')" class="seta">Existe um prazo para ser chamado(a) da fila de espera?<img src="../img/seta.svg">
            <div id="resposta11" class="resposta">
                <p>Não há um prazo fixo para ser chamado(a) da fila de espera. O tempo necessário para ser chamado(a) depende da 
                <p>disponibilidade de vagas e do número de alunos na fila. A Secretaria de Educação de Camaçari faz o possível para  
                <p>oferecer vagas adicionais conforme necessário. Recomenda-se que você verifique sua posição na fila e aguarde a
                <p>sua vez.</p>
            </div>
            </li>
            <li class="lista" onclick="toggleResposta('resposta12')" class="seta">Posso retirar uma senha para outro curso enquanto aguardo na fila de espera?<img src="../img/seta.svg">
            <div id="resposta12" class="resposta">
                <p>Sim, você pode retirar senhas para outros cursos disponíveis enquanto aguarda na fila de espera. Isso permite
                <p>que você tenha a chance de se inscrever em um curso alternativo, caso surjam vagas. Lembre-se de que, se você for
                <p>chamado(a) da fila de espera para o curso original, precisará cancelar a senha do curso alternativo para aceitar a
                <p>vaga oferecida.</p>
            </div>
            </li>
            <li class="lista" onclick="toggleResposta('resposta13')" class="seta">O que acontece se eu desistir de aguardar na fila de espera?<img src="../img/seta.svg">
            <div id="resposta13" class="resposta">
                <p>Se você decidir desistir de aguardar na fila de espera, sua posição será removida e você precisará retirar uma nova
                <p>senha quando desejar tentar novamente. Desistir da fila de espera não afetará suas chances futuras de obter uma senha 
                <p>para o curso desejado. Lembre-se de que ao desistir, você abrirá espaço para outros alunos na fila.</p>
            </div>
            </li>
            <li class="lista" onclick="toggleResposta('resposta14')" class="seta">Existe alguma forma de acelerar minha posição na fila de espera?<img src="../img/seta.svg">
            <div id="resposta14" class="resposta">
                <p>Não é possível acelerar diretamente sua posição na fila de espera. A ordem de chamada é determinada pela chegada dos 
                <p>alunos à fila. No entanto, caso você esteja na fila de espera há muito tempo e haja uma desistência de um aluno que
                <p>estava na frente, você pode ser chamado(a) antecipadamente, avançando na fila.</p>
            </div>
            </li>
            <li class="lista" onclick="toggleResposta('resposta15')" class="seta">O sistema de retirada de senhas notifica os alunos quando uma vaga é
            <br>disponibilizada na fila de espera?<img src="../img/seta.svg">
            <div id="resposta15" class="resposta">
                <p>Geralmente, o sistema de retirada de senhas não envia notificações automáticas sobre a disponibilidade de vagas na fila
                <p>de espera. É responsabilidade do aluno verificar regularmente o sistema ou entrar em contato com a Secretaria de 
                <p>Educação de Camaçari para obter informações sobre a sua posição e possíveis vagas disponíveis.<p>
            </div>
            </li>
        </ul>
    </div>
    <tr>
        <td> 1 </td>
    </tr>
    <script>
        function toggleResposta(id) {
            var resposta = document.getElementById(id);
            resposta.style.display = resposta.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>

</html>
