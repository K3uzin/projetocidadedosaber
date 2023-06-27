<?php
require_once("../Database/conexao.php");
require_once("../classes/adm.class.php");

if (!isset($_POST)) {
    header("../pages/admin.php");
} else {
    $Adm = $_POST["nome"];
    $Adm_nome = $_POST["nome"];
    $Adm_senha = $_POST["senha"];

    $query = "SELECT nome, senha FROM adm WHERE nome = '$Adm_nome';";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_fetch_assoc($result);
    $rows_num = mysqli_num_rows($result);

    if ($rows_num == 0) {
        // exibe mensagem de erro
        echo "<script>
                window.onload = function() {
                    alert('Nome de usuário incorreto');
                    history.back();
                };
            </script>";
        exit();
    } else {
        $veri_senha = password_verify($Adm_senha, $row["senha"]);
        if (!$veri_senha) {
             // exibe mensagem de erro
            echo "<script>
                window.onload = function() {
                    alert('Senha incorreta');
                      history.back(); 
                };
            </script>";
            exit();
        } else {
            $Adm = new Adm;
            $Adm->get_Adm_id($Adm, $Adm_nome);
            $Adm->get_Adm_att($Adm);
            session_start();
            $_SESSION["Adm"] = $Adm;
            header(/*header para a home da Adm*/);
        }
    }
}
?>
