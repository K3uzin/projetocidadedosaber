<?php
    require_once("Database/conexao.php")
    function data_expire_check($data_de_inscricao,$dias){

        $data_atual = strtotime('now');
        $expiracao = strtotime("+{$prazo} days", strtotime($data_de_inscricao));

        if($expiracao > $data_atual){
           
            return true

        }else{
           
            return false
        }
    }

    $sql_check_senha_validation_by_data = ("SELECT cod_senha from senha where validade < NOW()");
    $sql_erese_fila = ("DELETE * FROM fila WHERE situacao = 'invalida'");
    $sql_update_senha = ("UPDATE senha set situacao = 'vencida' WHERE cod_senha = $senha");  
    $sql_retrive_senha = ("UPDATE incricao and senha 
    SET inscricao.cod_senha = null AND senha.situaco = disponivel 
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
        $email = $reuslt['email']
        $incricao = $result['cod_senha'];
        $data = $result['data_inscricao'];
        if(function data_expire_check($data,15)){
            
            $mensage = "olá $nome, infelimente a prazo de incrição da sua senha expirou, logo a sua senha retirada no site do cidade do 
            cidade saber no dia $data não é mais valida! se ainda tiver interese na vaga porvafor retire outa senha."
            $assunto = "expiração da senha";
            $remetente = "cidadedosaber@gmail.com";
            mail($email,$assunto,$mensagen,$rementente);
            $conexao->query($sql_expirate_inscricao);  
        }
    }

    
?>