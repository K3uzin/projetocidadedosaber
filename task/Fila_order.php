<?php  
    require_once("Database/conexao.php");
    
    $sql_promove = ("UPDATE inscricao and fila
    SET inscricao.sitiuaco = 'apto' and fila.situacao = 'sorteado' and fila.posicao_fila = null 
    FROM inscricao 
    INNER JOIN FILA ON inscricao.cod_inscricao = fila.cod_inscricao 
    WHERE 'posicao_fila' = MIN(posicao_fila) AND fila.situacao = espera LIMIT 1");
    $sql_give_senha = ("UPDATE inscricao SET cod_senha = $senha WHERE cod_senha = null AND situacao = 'apto'LIMIT 1");
    $sql_senha = ("SELECT cod_senha FROM senha WHERE situacao = 'disponivel' LIMIT 1");
    $sql_senha_turnoff = ("UPDATE senha 
    SET senha.situacao = 'indisponivel'
    FROM senha INNER JOIN inscricao ON inscricao.cod_senha = senha.cod_senha");
    $sql_senha_check = ("SELECT cod_senha  FROM senha WHERE situacao = 'disponivel'");
    $sql_notificao = ("SELECT nome AND email FROM inscricao WHERE notificao = 'N'")

    while($result = mysqli_fetch_assoc($sql_senha_check)){

        $senha = $sql_senha;
        $conexao->query($sql_promove);
        $conexao->query($give_senha);
        $conexao->query($sql_senha_turnoff);
    }
    while($result = mysqli_fetch_assoc($sql_notificao)){

        $nome = $result['nome'];
        $email = $result['email'];
        $assunto = "Parabéns, $nome! Sua senha foi disponibilizada";
        $mensagem = "Prezado(a) $nome,
        <br>Gostaríamos de parabenizá-lo(a) por ter conseguido uma senha após ter aguardado na nossa fila de espera.</br>
            Sabemos que sua dedicação e paciência valeram a pena! Agora, você está um passo mais próximo de garantir sua vaga no curso desejado.
        <br>É importante lembrar que você tem um prazo de 15 dias para realizar sua inscrição.</br>
            Após esse período, sua senha expirará e será liberada para outros estudantes. 
            Portanto, recomendamos que você acesse nosso portal o mais breve possível e conclua sua inscrição.
        <br>Caso tenha alguma dúvida ou precise de qualquer assistência adicional, nossa equipe estará disponível para ajudá-lo(a). Não hesite em entrar em contato conosco.</br>
        <br>Agradecemos pela sua confiança em nossa instituição e desejamos sucesso em sua inscrição.</br>
        <br>Atenciosamente, Cidade do Saber";
        $remetente = "siscon@siscon-ba.com.br";
        mail($email,$assunto,$mensagem,$remetente);
    }
