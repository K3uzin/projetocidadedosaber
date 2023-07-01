<?php
    require_once("Database/conexao.php");
    function data_expire_check($data_de_inscricao,$dias){

        $data_atual = strtotime('now');
        $expiracao = strtotime("+{$prazo} days", strtotime($data_de_inscricao));

        if($expiracao > $data_atual){
           
            return true;

        }else{
           
            return false;
        }
    }

    $sql_check_senha_validation_by_data = ("SELECT cod_senha from senha where validade < NOW()");
    $sql_erese_fila = ("DELETE * FROM fila WHERE situacao = 'invalida'");
    $sql_update_senha = ("UPDATE senha set situacao = 'vencida' WHERE cod_senha = $senha");  
    $sql_retrive_senha = ("UPDATE inscricao and senha 
    SET inscricao.cod_senha = null AND senha.situacao = disponivel 
    FROM incricao INNER JOIN senha ON incricao.cod_senha = senha.cod_senha 
    WHERE situacao = 'expirado'"); 
    $sql_check_incricao("SELECT data_incricao and cod_inscricao AND email and nome FROM inscricao")
    $sql_expirate_inscricao("UPDATE incricao set situacao = 'expirado' WHERE cod_inscricao =  $inscricao")
   
    while($result = mysqli_fatch_assoc($sql_check_senha_validation_by_data)){
        
        $senha = $result;
        $conexao->query($sql_update_senha);
    }
   
    $conexao->query($sql_erese_fila);
    
    while($result = mysqli_fatch_assoc($sql_check_incricao)){
        
        $nome = $result['nome']
        $email = $result['email']
        $incricao = $result['cod_senha'];
        $data = $result['data_inscricao'];
        if(function data_expire_check($data,15)){
            
            $mensagem = "Prezado(a) $nome,
            <br>Gostaríamos de informar que a senha que você havia obtido anteriormente na fila de espera expirou. 
                Caso você ainda tenha interesse em participar do nosso curso, será necessário realizar a inscrição novamente e aguardar na fila de espera.
                Sabemos que o processo de espera pode ser desafiador, mas estamos empenhados em oferecer uma oportunidade igualitária para todos os estudantes. 
                Agradecemos sua compreensão e paciência.
                <br>Para realizar uma nova inscrição, acesse nosso portal e siga as instruções fornecidas. Assim que você concluir o processo, sua senha será gerada e você será incluído novamente na fila de espera.
                Lembramos que, devido à alta demanda, não podemos garantir um prazo exato para o recebimento da senha. No entanto, estamos trabalhando para agilizar o processo e oferecer a todos os alunos uma experiência de qualidade.
                Fique atento(a) às atualizações em nosso portal, onde você encontrará informações sobre sua posição atual na fila de espera e outras novidades relacionadas ao curso.
                <br>Agradecemos pelo seu interesse em nossa instituição e esperamos que em breve possamos lhe proporcionar a oportunidade de participar do nosso curso</br>
                <br>Atenciosamente, Cidade do saber.</br>";
            $assunto = "expiração da senha";
            $remetente = "cidadedosaber@gmail.com";
            mail($email,$assunto,$mensagem,$remetente);
            $conexao->query($sql_expirate_inscricao);  
        }
    }

    
?>
