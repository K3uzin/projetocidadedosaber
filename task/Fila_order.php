<?php  
    require_once("Database/conexao.php");
    
    $sql_promove = ("UPDATE inscricao and fila
    SET inscricao.sitiuaco = 'apto' and fila.situacao = 'sorteado' and fila.posicao_fila = null 
    FROM inscricao 
    INNER JOIN FILA ON inscricao.cod_inscricao = fila.cod_inscricao 
    WHERE 'posicao_fila' = MIN(posicao_fila) AND fila.situacao = espera LIMIT 1");
    $sql_give_senha = ("UPDATE incricao SET cod_senha = $senha WHERE cod_senha = null AND situacao = 'apto'LIMIT 1");
    $sql_senha = ("SELECT cod_senha FROM senha WHERE situcao = diponivel LIMIT 1");
    $sql_senha_turnoff = ("UPDATE senha 
    SET senha.situacao = 'indisponivel'
    FROM senha INNER JOIN incricao ON inscricao.cod_senha = senha.cod_senha");
    $sql_senha_check = ("SELECT cod_senha  FROM senha wHERE situacao = 'disponivel'");
    $sql_notificao = ("SELECT nome AND email FROM inscricao WHERE notificao = 'N'")

    while($result = mysqli_fatch_assoc($sql_senha_check)){

        $senha = $sql_senha
        $conexao->query($sql_promove);
        $conexao->query($give_senha);
        $conexao->query($sql_senha_turnoff);
    }
    while($result = mysqli_fatch_assoc($sql_notificao)){

        $nome = $result['nome'];
        $email = $result['email'];
        $assunto = "senha";
        $mensage = "parabens $nome! (mensagem de que foi aceito na fila)";
        $remetente = "cidadedosaber@gmail.com";
        mail($email,$senha,$menssagen,$remetente);
    }
