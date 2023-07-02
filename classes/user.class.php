<?php 

Class User{
    protected $name;
    protected $id;
    protected $cpf;
    protected $rg;
    private $age; /* idade */
    protected $phone;
    /**
     * todos os atributos abaixos são consideradados atributos especiais,
     * pois tem interaçoes especificas com o banco de dados e a classe adm.
     */
    private $status; /* status de analise de aprovação */
    private $queue; /* atributo que definira o status na fila */
    private $cursos_inscrito[]; /* atributo que e feito especificamenente para ser um vetor, e deve conter todos os cursos ao quais o usuario se increveu */

    /* função criada para dar set em todos os atributo basicos da classe user */
    public function set_attbs($name,$cpf,$rg,$age,$phone){

        $this->name = $name;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->age = $age;
        $this->phone = $phone;
    }
    
    /* função criada para dar get em todos os atributos basicos da classe user */
    public function get_attbs($name,$cpf,$rg,$age,$phone){
      
        $base_attbs = array();
        if(!$this->name){
            $base_attbs = $this->name;
        }
        if(!$this->cpf){
            $base_attbs = $this->cpf;
        }
        if(!$this->rg){
            $base_attbs = $this->rg;
        }
        if(!$this->age){
            $base_attbs = $this->age;
        }
        if(!$this->phone){
            $base_attbs = $this->phone;
        }

        /*verificar se é dessa forma:
                if(!$this->phone){
            $base_attbs[] = $this->phone;
            COM CHAVES
        }
        */

        return $base_attbs;
    }
      public function inscrever($nome_reponsavel,$nome,$cpf,$rg,$email,$data,$turma){
        
        $result = $conexao->query("SELECT cod_inscricao FROM inscricao 
        WHERE nome = $nome AND cpf = $cpf AND rg = $rg AND email = $email AND cod_turma = $turma");

        if($result != null){
         
           (/*mensagen que a inscricao ja exite*/)
        }else{

            $senha = $conexao->query("SELECT cod_senha FROM senha WHERE cod_turma = $turma AND situacao = 'diponivel' LIMIT 1");
            if($rusult == null){
                
                $conexao->prepare("INSERT INTO inscriacao(nome_reponsavel,nome,cpf,rg,email,data_inscricao VALUES (?,?,?,?,?,?)");
                $conexao->bind_param("s,s,i,i,,s,d"$nome_responsavel,$nome,$cpf,$rg,$email,$data);
                $conexao->execute()
                return $senha = false
            }
            $senha = $result
            $conexao->prepare("INSERT INTO inscriacao(cod_senha,nome_reponsavel,nome,cpf,rg,email,data_inscricao VALUES (?,?,?,?,?,?,?)")
            $conexao->bind_param("i,s,s,i,i,s,d"$senha,$nome_responsavel,$nome,$cpf,$rg,$email,$data )
            $conexao->execute()
            return $senha = true
        }
    }
}


