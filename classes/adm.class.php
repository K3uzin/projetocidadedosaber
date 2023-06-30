<?php

class Adm extends user{
    
    private $access_level; /* nivel de acesso do adm, a qual sera dividido em 3 niveis, sende referenciado  de 1 a 3, sendo o 1 o mais baixo e 3 o mais alto*/
    private $senha;
    private $email;
    /* classe criada para validar as inscriçoes de usuarios */
    public function set_access_level(/*restrição de classe de adm*/$Adm,$nivel){
        if($Adm->access_level == 3){
            $Adm->access_level = $nivel;
            $stmt = $conexao->prepare("INSERT $Adm->access_level INTO nivel_de_acesso FROM adiminstrador WHERE nome=$adm");
            $stmt->bind_param("i",$Adm->access_level);
         }
    }
    public function validate(/*restrição de classe de user*/$user){
    
        if($this->access_level >= 1){
            
            $user->status = true;
            $user->get_attbs();
            $stmt = $conexao->prepare("UPDATE inscricao SET stat = $user->stutus WHERE cod_inscricao=$user->id");
            $stmt->bind_param("b",$user->status);
            $stmt->execute();

    }

    //public function invalidate(/*restrição de classe de user*/$user){

        if($this->access_level >= 2){

            $user->status = false;
            $user->get_attbs();
            $stmt = $conexao->prepare("UPDATE inscricao SET stat = $user->stutus WHERE cod_inscricao=$user->id");
            $stmt->bind_param("b",$user->status);
            $stmt->execute();
        }
    }
    /* função irá requerer reavaliação*/
    public function anular_inscriçao(/*restrição de classe user*/$user,$id_inscriçao){
      
        if($this->access_level >= 2){

            $user->inscricao[$curso_inscrito] = null;
            $user->get_attbs();
            $stmt = $conexao->prepare("UPDATE inscricao SET validacao = $use $user->stutus WHERE cod_inscricao=$user->id");
        } 
    }
    //função responsavel por restringir o acesso de um adm ao sistema
    public function restric_access(/*restriçao de classe adm*/$Adm,$nome){

        $Adm->get_Adm_id($Adm,$nome);
        $stmt = $conexao->prepare("SELECT nivel_de_acesso FROM  Adm WHERE cod_administrador = $Adm->id");
        $stmt->execute();
        
        if($this->access_level > $stmt->get_result()){
            $restrict = 0
            $stmt->prepare("UPDATE adminsitrador SET nivel_de_acesso = $restrict WHERE cod_administrador = $Adm->id");
            $Stmt->bind_param("i",$restrict);
            $stmt->execute();
        }
    }
    //função responsavel por mudar a disponibilidade de iscriçoes de uma determinada turma
    public function switch_turma(/*restrição de classe turma*/$turma,$turma_nome){


        if($this->access_level == 3){
            
            $turma->get_turma_id($turma_nome);    
            if(!isset($turma->status)){
                
                $turma->set_turma_status($turma->id,true);
            }else{

                if($turma->status == true){

                    $turma->set_turma_status($turma->id,false);
                }
                if($turma->status == false){

                    $turma->set_turma_status($turma->id,true);
                }
            }
            $turma->set_turma_status($turma->id,false);
           
        }
    }
    //função responsavel por acessar o id do adm  
    public function get_adm_id(/*restricão de classe adm*/$Adm,$nome){

        if(!isset($Adm->id)){
            $stmt = $conexao->prepare("SELECT cod_adiministrador FROM administrador WHERE nome = $nome");
            $stmt->execute();
            if($stmt->get_result() == null){
                exit("adm inválido");
            
            }else{
                $Adm->id = $stmt->get_result();
                return $Adm->id;
            }
        }
    }
    //função reponsavel por acessar todos os atributos da classe adm
    public function get_Adm_att(/*restrição de classe adm*/ $Adm){
        
        $stmt = $conexao->prepare("SELECT nome from Adminstrador WHERE cod_adminstrador=$Adm->id");
        $stmt->excecute();
        $Adm->nome = $stmt->get_result();
         
        $stmt = $conexao->prepare("SELECT email from Adminstrador WHERE cod_adminstrador=$Adm->id");
        $stmt->excecute();
        $Adm->email = $stmt->get_result();
        
        $stmt = $conexao->prepare("SELECT nivel_de_acesso from Administrador WHERE cod_adminstrador=$Adm->id");
        $stmt->excecute();
        $Adm->access_level = $stmt->get_result();
    }
    // função reponsavel cadastrar novos adm 
    public function set_new_Adm(/*restrição de classe adm*/$Adm,$nome,$nomeB,$email,$senha,$nivel){

        if($Adm->access_level == 3){

            $nome = new Adm;
            $nome->nome = $nomeB;
            $nome->email = $email;
            $nome->senha = $senha;
            $nome->access_level = $nivel_de_acesso;
            
            $stmt->prepare("SELECT email FROM adminstrador WHERE email = $nome->email");
            $stmt->execute();
            $result = $stmt->get_result();
            if($result =! null){
                exit("email ja extiste");
            }
            $stmt = $conexao->prepare("INSERT $nome->nome,$nome->email,$nome->senha,$nome->access_level into Adminstrador");
            $stmt->bind_param("s,s,i,i"$nome->nome,$nome->email,$nome->senha,$nome->access_level);
            $stmt->execute();
        }
    }
    

    


    
}



