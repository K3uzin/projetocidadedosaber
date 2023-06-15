<?php

class Adm extends user{
    
    private $access_level; /* nivel de acesso do adm, a qual sera dividido em 3 niveis, sende referenciado  de 1 a 3, sendo o 1 o mais baixo e 3 o mais alto*/

    /* classe criada para validar as inscriçoes de usuarios */
    public function set_access_level(/*restrição de classe de adm*/$Adm,$nivel){
        if($Adm->access_level == 3){
            $Adm->access_level = $nivel;
            $stmt = $conexao->prepare("INSERT $Adm->access_level INTO nivel_de_acesso FROM user WHERE nome=$adm");
            $stmt->bind_param("i",$Adm->access_level);
         }
    }
    public function validate(/*restrição de classe de user*/$user){
    
        if($this->access_level >= 1){
            
            $user->status = true;
            $user->get_attbs();
            $stmt = $conexao->prepare("UPDATE inscricao SET stat = $user->stutus WHERE cod_inscricao=$user->id");
            $stmt->bind_param("b",$user->status);
            $stmt->execute()

    }

    public function invalidate(/*restrição de classe de user*/$user){

        if($this->access_level >= 2){

            $user->status = false;
            $user->get_attbs();
            $stmt = $conexao->prepare("UPDATE inscricao SET stat = $user->stutus WHERE cod_inscricao=$user->id");
            $stmt->bind_param("b",$user->status);
            $stmt->execute();
        }
    }
    /* funçaira requerer reavaliação*/
    public function anular_inscriçao(/*restrição de classe user*/$user,$id_inscriçao){
      
        if($this->access_level >= 2){

            $user->inscricao[$curso_inscrito] = null;
            $user->get_attbs();
            $stmt = $conexao->prepare("UPDATE inscricao SET validacao = $use $user->stutus WHERE cod_inscricao=$user->id");
        } 
    }
    public function access_restrict(/*restriçao de classe adm*/$Adm,$nome){

        $Adm->get_Adm_id($Adm,$nome);
        $stmt = $conexao->prepare("SELECT nivel_de_acesso FROM usuario WHERE cod_usuario = $Adm->id");
        $stmt->execute();
        
        if($this->access_level > $stmt->get_result();){
            $restrict = 0
            $stmt->prepare("UPDATE usuario SET nivel_de_acesso = $restrict WHERE cod_usuario = $Adm->id");
            $Stmt->bind_param("i",$restrict)
            $stmt->execute()
        }
    }
    public function close_turma(/*restrição de classe turma*/ $Turma){


        if($this->access_level == 3){
            

            $turma->set_turma_status()

        }
    }
    public function get_adm_id(/*restricão de classe adm*/$Adm,$nome){

        if(!isset($Adm->id)){
            $stmt = $conexao->prepare("SELECT cod_usuario FROM usuario WHERE nome_usuario = $nome");
            $stmt->execute();
            if($stmt->get_result() == null){
                exit(echo"adm invalido");
            
            }else{
                $Adm->id = $stmt->get_result();
                return $Adm->id;
            }

        }
    }

    


    
}
}


