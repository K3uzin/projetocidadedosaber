<?php
session_start();

require("../database/conexao.php");
require("../classes/adm.class.php");
$Adm = $_SESSION['Adm']
if(!isset($_POST)){
    header("../pages/cadAdmin.php");
}else{
   
    $nome = $_POST['nome'];
    $nomeb = $_POST['nome']
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $access_level = $_POST['level'];

    if($nome == null){
      exit("nome vazio");
    }
    if(strlen($nome) <= 2)
    {
      exit("nome curto");
    }
    if(strlen($nome) >= 45){
      exit("nome longo");
    }
    $name_test = test_input($nome);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name_test)){
        exit("caracteres especiais não são permitidos");
    }
    if($email == null){
      exit ("campo de email vazo");
    }
    $email_test = test_input($email);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        exit("email invalido")
    }
    if($senha == null){
      exit("senha");
    }
    if(strlen($senha) <= 6){
      exit("senha curto");
    }
    if(strlen($senha) >= 20){
      exit("senha longo");
    }

    $Adm->set_new_Adm($Adm,$nome,$nomeb,$email,$senha,$access_level);


}




