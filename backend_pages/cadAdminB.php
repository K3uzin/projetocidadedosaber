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
        echo "<script>alert('Nome vazio');</script>";
        exit();
    }
    if(strlen($nome) <= 2){
        echo "<script>alert('Nome curto');</script>";
        exit();
    }
    if(strlen($nome) >= 45){
        echo "<script>alert('Nome longo');</script>";
        exit();
    }
    $name_test = test_input($nome);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name_test)){
        echo "<script>alert('Caracteres especiais não são permitidos');</script>";
        exit();
    }
    if($email == null){
        echo "<script>alert('Campo de e-mail vazio');</script>";
        exit();
    }
    $email_test = test_input($email);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('E-mail inválido');</script>";
        exit();
    }
    if($senha == null){
        echo "<script>alert('Senha vazia');</script>";
        exit();
    }
    if(strlen($senha) <= 6){
        echo "<script>alert('Senha curta');</script>";
        exit();
    }
    if(strlen($senha) >= 20){
        echo "<script>alert('Senha longa');</script>";
        exit();
    }

    $Adm->set_new_Adm($Adm, $nome, $nomeb, $email, $senha, $access_level);
}
?>
