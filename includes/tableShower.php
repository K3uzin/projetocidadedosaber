<?php 
    require_once("Databese/conexao.php");

    if($role == "adm"){


        $sql = mysqli_query($conexao, "SELECT 'nome','cpf','data_iscricao','posicao_fila','data_validade','validade_validacao',
        FROM inscicao INNER JOIN fila on incricao.senha_cod_senha = fila.cod_senha"); 
        <table>
            <tr>
                <td> nome </td>
                <td> cpf </td>
                <td> data de incrição </td>
                <td> data de expiração </td>
                <td> validade de incrição  </td>
                <td> posição </td>
            <tr>
        while($result = mysqli_fetch_assoc($sql)){
            <tr>
                <td> <?php $result['nome']; ?> </td>
                <td> <?php $result['cpf']; ?> </td>
                <td> <?php $result['data_iscricao']; ?> </td>
                <td> <?php $result['data_validade']; ?> </td>
                <td> <?php $result['validade_validacao']; ?> </td>
                <td> <?php $result['posicao_fila']; ?> </td>
                
        }
    }
    if($role == "usuario"){
        $sql = mysqli_query($conexao, "SELECT 'turma_nome','turma_status','status_fila',
        FROM turma INNER JOIN fila on incricao.senha_cod_senha = fila.cod_senha"); 
    }
    if($role == "curso")
        $sql = mysqli_query($conexao,"SELECT 
        'cod_turma'
        'nome_turma',
        'faixa_etaria_inicial',
        'faixa_etaria_final',
        'dia_de_aula',
        'hora_de_inicio',
        'hora_de_termino',
        'situacao',
        FROM turma where 'situacao' = vagas_abertas");
        <html>
            <body>   
                <table>
                    <tr>
                        <td>nome da turma</td>
                        <td>faixa etaria</td>
                        <td>dias de aula</td>
                        <td>horario de aula</td>
                        <td>senha disponiveis</td>
                        <td>iscrições</td>
                    </tr>
            </body>   
        </html>        
        while($result = mysqli_fatch_assoc($Sql)){
    
            $N_senha = mysqli_query($conexao,"SELECT count(cod_turma) 
            from senha  where $result['cod_turma'] = 'cod_turma'");
            <html>
                <body>
                    <tr>
                        <td><?php $result['nome_turma'];?></td>
                        <td><?php $result['faixa_etaria_inicial']. $result['faixa_etaria_final'];?></td> 
                        <td><?php $result['dia_de_aula'];?></td> 
                        <td><?php $result['hora_de_inicio']. $result['hora_de_termino'];?></td> 
                        <td><?php $N_senha;?></td> 
                        <td><?php $result['situacao'];?></td>  
                </body>
            </html>
    }
     
?>
