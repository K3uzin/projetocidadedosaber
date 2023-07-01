<?php

   class Turma{
        
    
        private $nome;
        private $id_turma;
        private $senhas_disponoveis;
        private $status;
        
        public function set_turma_status($id_turma,$status){

            if($status == true){
                $this->status = true;
                $stmt = $conexao->prepare("UPDATE turma SET turma_avability = $this->status WHERE cod_turma=$id_turma");
                $stmt->bind_param("b", $this->status);
                $stmt->execute();
            }
            if($status == false){
                $this->status = false;
                $stmt = $conexao->prepare("UPDATE turma SET turma_avability = $this->status WHERE cod_turma=$id_turma");
                $stmt->bind_param("b", $this->status);
                $stmt->execute();
            }
        }
        public function get_turma_id(/*restrição de classe turma*/$turma,$turma_nome){

            if(!isset($turma->id_turma)){
                
                $stmt = $conexao->prepare("SELECT cod_turma FROM turma WHERE nome_turma = $turma_nome");
                $stmt->execute();
                if($stmt->get_result() == null){
                     exit("turma invalido");
                    
                }else{
                    $turma->id_turma = $stmt->get_result();
                    return $turma->id_turma;
                }
            }
        }
   }
   
   
