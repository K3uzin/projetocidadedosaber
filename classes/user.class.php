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
    private $cursos_inscrito; /* atributo que e feito especificamenente para ser um vetor, e deve conter todos os cursos ao quais o usuario se increveu */

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

    public function inscrever($nome_responsavel, $nome, $cpf, $rg, $email, $data_entrada){
        $conexao = new mysqli("localhost","root","","cds");
        if ($conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
        }
        
        $result = $conexao->query("SELECT cod_turma FROM turma 
            WHERE nome = '$nome' AND cpf = '$cpf' AND rg = '$rg' AND email = '$email' AND '$data_entrada'");
    
        if($result->num_rows > 0){
            // Dados já existem
        } else {
            $stmt = $conexao->prepare("INSERT INTO turma (nome_responsavel, nome, cpf, rg, email, data_entrada) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssisss", $nome_responsavel, $nome, $cpf, $rg, $email, $data_entrada);
            $stmt->execute();
    
            if ($stmt->affected_rows > 0) {
                // Inserção bem-sucedida
                return $senha = false;
            } else {
                // Erro ao inserir os dados
                echo "Erro ao inserir os dados: " . $conexao->error;
                return $senha = false;
            }
        }

        header("location:../pages/inscricao.php");
        $conexao->close();
       
    }
}


