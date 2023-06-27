<?php
session_start();

require("../database/conexao.php");
require("../classes/adm.class.php");
$Adm = $_SESSION['Adm'];

if(!isset($_POST)){
    header("../pages/cadAdmin.php");
} else {
    $nome = $_POST['nome'];
    $nomeb = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $access_level = $_POST['level'];

    if($nome == null){
        // exibe mensagem de erro em pagina
        echo "<script>
                window.onload = function() {
                    alert('Nome vazio');
                    history.back(); //retorna a pagina anterior
                };
            </script>";
        exit();
    }
    if(strlen($nome) <= 2){
          // exibe mensagem de erro em pagina
        echo "<script>
                window.onload = function() {
                    alert('Nome curto');
                    history.back(); //retorna a pagina anterior
                };
            </script>";
        exit();
    }
    if(strlen($nome) >= 45){
         // exibe a mensagem de erro 
        echo "<script>
                window.onload = function() {
                    alert('Nome longo');
                    history.back(); //retorna a pagina anterior
                };
            </script>";
        exit();
    }
    $name_test = test_input($nome);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name_test)){
        // exibe a mensagem de erro 
        echo "<script>
                window.onload = function() {
                    alert('Caracteres especiais não são permitidos');
                    history.back(); //retorna a pagina anterior
                };
            </script>";
        exit();
    }
    if($email == null){
         // exibe a mensagem de erro 
        echo "<script>
                window.onload = function() {
                    alert('Campo de e-mail vazio');
                    history.back(); //retorna a pagina anterior
                };
            </script>";
        exit();
    }
    $email_test = test_input($email);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          // exibe a mensagem de erro 
        echo "<script>
                window.onload = function() {
                    alert('E-mail inválido');
                    history.back(); //retorna a pagina anterior
                };
            </script>";
        exit();
    }
    if($senha == null){
        // exibe a mensagem de erro 
        echo "<script>
                window.onload = function() {
                    alert('Senha vazia');
                    history.back(); //retorna a pagina anterior
                };
            </script>";
        exit();
    }
    if(strlen($senha) <= 6){
        // exibe a mensagem de erro 
        echo "<script>
                window.onload = function() {
                    alert('Senha curta');
                    history.back(); //retorna a pagina anterior 
                };
            </script>";
        exit();
    }
    if(strlen($senha) >= 20){
        // exibe a mensagem de erro 
        echo "<script>
                window.onload = function() {
                    alert('Senha longa');
                    history.back(); //retorna a pagina anterior
                };
            </script>";
        exit();
    }

    $Adm->set_new_Adm($Adm, $nome, $nomeb, $email, $senha, $access_level);
}
?>
