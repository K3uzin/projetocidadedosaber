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
        echo "<script>
            window.onload = function() {
                alert('CPF Inválido');
                window.location.href = '../pages/inscricao.php';
            };
        </script>";
        return false;
        exit(); // opcionalmente, você pode manter o exit() aqui
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

if (!isset($_POST)) {
    header("Location:../pages/inscricao.php");

    }else{
        
        //$turma = $_POST['cod_turma'];
        $nome_responsavel = $_POST['nome_responsavel'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $email = $_POST['email'];


        //$data_nascimento = $_POST['dataN'];
        //$idade_maxima = $_POST['idade_maxima'];
       // $idade_minima = $_POST['idade_minima'];
        //$data_inscricao = "07/07/2023";

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
        if(strlen($nome_responsavel) > 90){
            echo "<script>
                    window.onload = function() {
                        alert('Nome longo');
                    };
                </script>";
            exit();
        }
        //$name_test = test_input($nome_responsavel);
       // if (!preg_match("/^[a-zA-Z-' ]*$/",$name_test)){
       // echo "<script>
         //       window.onload = function() {
           //           alert('Caracteres especiais não são permitidos');
             //   };
           // </script>";
        //exit();
        //}
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
       /* $name_test = test_input($nome);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name_test)){
        echo "<script>
                window.onload = function() {
                    alert('Caracteres especiais não são permitidos');
                };
            </script>";
        exit();
        }*/
        if(strlen($email) > 90){
            echo "<script>
                window.onload = function() {
                    alert('Mensagem muito longa');
                    history.back(); 
                };
            </script>";
        exit();
        }
        if($email == null){
            echo "<script>
                    window.onload = function() {
                        alert('Campo de e-mail vazio');
                    };
                </script>";
            exit();
        }
        /*$email_test = test_input($email);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<script>
                    window.onload = function() {
                        alert('E-mail inválido');
                    };
                </script>";
            exit();
        }*/
        if($cpf == null){
            echo "<script>
                    window.onload = function() {
                        alert('Este campo não pode ficar vazio');
                    };
                </script>";
            exit();
        }
        if(!validarCPF($cpf)){
           echo "<script>
                    window.onload = function() {
                        alert('CPF Inválido');
                    };
                </script>";
            exit();
        }
        if($rg == null){
            echo "<script>
                    window.onload = function() {
                        alert('Este campo não pode ficar vazio');
                    };
                </script>";
            exit();
        }
        
        //$idade = getdata() - $data_nascimento;
        /*if($idade > $idade_maxima){
            echo "<script>
                    window.onload = function() {
                        alert('Desculpe, você excedeu a idade máxima permitida');
                    };
                </script>";
            exit();*/
        }
        /*if($idade < $idade_minima){
            echo "<script>
                    window.onload = function() {
                        alert('Desculpe, você não atingiu a idade mínima necessária');
                    };
                </script>";
            exit();
        }*/
        
        $user = $nome;
        $user = new User;
        $user->inscrever($nome_responsavel,$nome,$cpf,$rg,$email,$conexao, $data_entrada);
        
        /*if($senha == true){
            $mensagem = "É com grande satisfação que informamos que sua senha para o curso desejado foi retirada com sucesso.
                        Parabéns pela inscrição!
                    <br>Agora você está oficialmente registrado(a) para participar do curso [Nome do Curso].
                        Aproveitamos para reforçar algumas informações importantes:</br>
                    <br><p style='font-weight: bold;'>1</p> - Prazo de Inscrição: Você tem um prazo de 15 dias para realizar a sua inscrição definitiva no curso.
                        É essencial que você siga todas as orientações fornecidas para garantir sua participação.
                        Caso não efetue a inscrição dentro desse prazo, infelizmente sua vaga será perdida.</br>
                    <br><p style='font-weight: bold;'>2</p>Informações Adicionais: Fique atento(a) às comunicações e atualizações sobre o curso.
                        Verifique regularmente o sistema de retirada de senhas e suas notificações para obter
                        informações sobre datas, horários, locais e quaisquer requisitos específicos relacionados ao curso.
                    <br><p style='font-weight: bold;''>3</p>Cancelamento da Inscrição: Caso, por algum motivo, você decida não participar do curso,
                         é fundamental que você cancele sua inscrição o mais rápido possível. Dessa forma, poderemos oferecer a vaga a outro aluno em espera.</br>
                     <br>Estamos ansiosos para tê-lo(a) conosco no curso e proporcionar uma experiência enriquecedora. Se surgirem dúvidas ou se precisar de assistência adicional,
                        não hesite em entrar em contato conosco através do suporte técnico disponibilizado no sistema.
                        Parabéns mais uma vez e desejamos muito sucesso em sua jornada educacional!</br>
                        <br>Atenciosamente,
                        <br>Cidade do Saber.";
            $assunto = "Confirmação de Retirada de Senha - Inscrição Aceita";
            $remetente = "(email do cidade do saber)";
            mail($email,$assunto,$mensagem,$remetente);
        }*/
        /*if($senha == false){
            $mensagem = "Prezado(a) $nome,
            <br>Agradecemos por se inscrever no nosso sistema de retirada de senhas para o curso desejado.
            Estamos entrando em contato para confirmar que sua inscrição foi realizada com sucesso.</br>
        <br>No entanto, informamos que, no momento, todas as vagas para o curso escolhido já foram preenchidas.
            Como resultado, você será colocado(a) na fila de espera para aguardar a desistência de outros alunos ou a abertura de novas vagas.</br>
        <br>A fila de espera é organizada de acordo com a ordem de chegada, dando prioridade aos alunos que estão esperando há mais tempo. 
            Assim que uma vaga se tornar disponível, ela será oferecida ao próximo aluno na fila de espera. 
            É importante ressaltar que não há um prazo exato para o avanço na fila, pois depende das circunstâncias individuais.</br>
        <br>Enquanto aguarda, recomendamos que você esteja atento(a) ao sistema de retirada de senhas, pois, caso uma vaga seja liberada,
            você será notificado(a) e terá a oportunidade de aceitá-la ou recusá-la.
            Lembre-se de que é necessário responder dentro do prazo estabelecido para garantir a sua vaga.</br>
        <br>Continuaremos trabalhando diligentemente para oferecer vagas adicionais e possibilitar sua participação no curso escolhido. 
            Caso você tenha interesse em outros cursos disponíveis, pode aproveitar a oportunidade para retirar senhas para eles enquanto aguarda na fila de espera.</br>
        <br>Agradecemos pela sua compreensão e paciência durante esse processo. 
            Estamos empenhados em fornecer a melhor experiência educacional possível para todos os alunos.</br>
        <br>Caso você tenha alguma dúvida ou precise de mais informações, não hesite em entrar em 
            contato conosco através do suporte técnico disponibilizado no sistema.</br>
        <br>Atenciosamente,
        <br>Cidade do Saber";
            $assunto = "Confirmação de Inscrição e Informação sobre Fila de Espera";
            $remetente = "(email do cidade do saber)";
            mail($email,$assunto,$mensagem,$remetente);*/

        //}


    
