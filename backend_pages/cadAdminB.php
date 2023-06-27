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
        echo "<script>
                window.onload = function() {
                    alert('Nome vazio');
                    history.back(); //retorna a pagina anterior
                };
            </script>";
        exit();
    }
    if(strlen($nome) <= 2){
        echo "<script>
                window.onload = function() {
                    alert('Nome curto');
                    history.back(); //retorna a pagina anterior
                };
            </script>";
        exit();
    }
    if(strlen($nome) >= 45){
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
        echo "<script>
                window.onload = function() {
                    alert('Caracteres especiais não são permitidos');
                    history.back(); //retorna a pagina anterior
                };
            </script>";
        exit();
    }
    if($email == null){
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
        echo "<script>
                window.onload = function() {
                    alert('E-mail inválido');
                    history.back(); //retorna a pagina anterior
                };
            </script>";
        exit();
    }
    if($senha == null){
        echo "<script>
                window.onload = function() {
                    alert('Senha vazia');
                    history.back(); //retorna a pagina anterior
                };
            </script>";
        exit();
    }
    if(strlen($senha) <= 6){
        echo "<script>
                window.onload = function() {
                    alert('Senha curta');
                    history.back(); //retorna a pagina anterior 
                };
            </script>";
        exit();
    }
    if(strlen($senha) >= 20){
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
