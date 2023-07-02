<?php 

    require_once("../Database/conexao");

    $sql_get_inscricao = ("SELECT cod_inscricao FROM inscricao WHERE cod_senha = null AND situacao = 'apto'");
    $sql_insert_in_fila = ("INSERT INTO fila(cod_inscricao) VALUES ($inscricao)");
   
    while($incricao = mysqli_fatch_assoc($sql_get_inscricao)){
        
        $conexao->query($sql_insert_in_fila)
    }