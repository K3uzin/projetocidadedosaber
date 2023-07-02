<?php

    require_once("../Database/conexao.php");
    require_once("../classes/user.class.php");
    function validarCPF($cpf) {
        // Remove caracteres não numéricos
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        
        // Verifica se o CPF possui 11 dígitos
        if (strlen($cpf) !== 11) {
            return false;
        }
        
        // Verifica se todos os dígitos são iguais, o que torna o CPF inválido
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        
        // Calcula o primeiro dígito verificador
        $soma = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma += intval($cpf[$i]) * (10 - $i);
        }
        $resto = $soma % 11;
        $digito1 = ($resto < 2) ? 0 : 11 - $resto;
        
        // Calcula o segundo dígito verificador
        $soma = 0;
        for ($i = 0; $i < 10; $i++) {
            $soma += intval($cpf[$i]) * (11 - $i);
        }
        $resto = $soma % 11;
        $digito2 = ($resto < 2) ? 0 : 11 - $resto;
        
        // Verifica se os dígitos calculados são iguais aos dígitos informados
        if ($cpf[9] != $digito1 || $cpf[10] != $digito2) {
            return false;
        }
        
        return true;
    }
    if(!isset($_POST)){
        
        header("../pages/incricao")

    }else{
        
        $turma = $_POST["cod_turma"]
        $nome_reponsavel = $_POST['nome_reponsavel'];
        $nome = $_POST['nome']
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $email = $_POST['email'];
        $data_nascimento = $_POST['dataN']
        $idade_maxima = $_POST['idade_maxima']
        $idade_minima = $_POST['idade_minima']
        $data_incricao = getdata();

        if($nome_responsavel == null){
            echo "<script>
                    window.onload = function() {
                        alert('Nome vazio');
                    };
                </script>";
            exit();
        }
        if(strlen($nome_responsavel) <= 2){
            echo "<script>
                    window.onload = function() {
                        alert('Nome curto');
                    };
                </script>";
            exit();
        }
        if(strlen($nome_reponsavel) > 90){
            echo "<script>
                    window.onload = function() {
                        alert('Nome longo');
                    };
                </script>";
            exit();
        }
        $name_test = test_input($nome_responsavel);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name_test)){
        echo "<script>
                window.onload = function() {
                    alert('Caracteres especiais não são permitidos');
                };
            </script>";
        exit();
        }
        if($nome == null){
            echo "<script>
                    window.onload = function() {
                        alert('Nome vazio');
                    };
                </script>";
            exit();
        }
        if(strlen($nome) <= 2){
            echo "<script>
                    window.onload = function() {
                        alert('Nome curto');
                    };
                </script>";
            exit();
        }
        if(strlen($nome) > 90){
            echo "<script>
                    window.onload = function() {
                        alert('Nome longo');
                    };
                </script>";
            exit();
        }
        $name_test = test_input($nome);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name_test)){
        echo "<script>
                window.onload = function() {
                    alert('Caracteres especiais não são permitidos');
                };
            </script>";
        exit();
        }
        if(starlen($email) > 90){
            "mensagen de email muito comprido"
        }
        if($email == null){
            echo "<script>
                    window.onload = function() {
                        alert('Campo de e-mail vazio');
                    };
                </script>";
            exit();
        }
        $email_test = test_input($email);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<script>
                    window.onload = function() {
                        alert('E-mail inválido');
                    };
                </script>";
            exit();
        }
        if($cpf == null){
            //mensagen se campo de cpf vazio
        }
        if(!ValidarCPF($cpf)){
            //mensagen de cpf invalido
        }
        if($rg == null){
            // mensagen de rg vazio
        }
        if{}//verivicação de rg
        $idade = getdata() - $data_nascimento;
        if($idade > $idade_maxima){
            //mensagen de fora da faixa etaria
        }
        if($idade < $idade_minima){
            //mensagen de fora da faixa etaria
        }
        $user = $nome;
        $user = new User;
        $user->inscrever($nome_reponsavel,$nome,$cpf,$rg,$email,$data,$turma);
        if($senha == true){
            $mensagem = "parabens $nome,(mensagen de que se increveu com sucesso é recebeu a senha)";
            $assunto = "inscrição";
            $remetente = "(email do cidade do saber)";
            mail($email,$assunto,$mensagen,$remetente);
        }
        if($senha == false){
            $mensagem = "parabens $nome,(mensagen de que se increveu com sucesso porem explica que não tem senha diponivel e que sera necessario expertaar na fila)";
            $assunto = "inscrição";
            $remetente = "(email do cidade do saber)";
            mail($email,$assunto,$mensagen,$remetente);

        }


    }