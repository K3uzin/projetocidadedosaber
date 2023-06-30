<?php 
    //require_once("Database/conexao.php");
    $role = "adm";
    
    if($role == "adm"){

        $sql = mysqli_query($conexao, "SELECT 'nome','cpf','data_inscricao','posicao_fila','data_validade','validade_validacao'
            FROM inscricao INNER JOIN fila on inscricao.senha_cod_senha = fila.cod_senha"); 
        echo "<table>
            <tr>
                <td> nome </td>
                <td> cpf </td>
                <td> data de inscrição </td>
                <td> data de expiração </td>
                <td> validade de inscrição  </td>
                <td> posição </td>
            </tr>";
        while($result = mysqli_fetch_assoc($sql)){
            echo "<tr>
                <td>".$result['nome']."</td>
                <td>".$result['cpf']."</td>
                <td>".$result['data_inscricao']."</td>
                <td>".$result['data_validade']."</td>
                <td>".$result['validade_validacao']."</td>
                <td>".$result['posicao_fila']."</td>
            </tr>";
        }
        echo "</table>";
    }
    if($role == "usuario"){
        $sql = mysqli_query($conexao, "SELECT 'turma_nome','turma_status','status_fila'
            FROM turma INNER JOIN fila on incricao.senha_cod_senha = fila.cod_senha"); 
    }
    if($role == "curso"){
        $sql = mysqli_query($conexao, "SELECT 
            'cod_turma',
            'nome_turma',
            'faixa_etaria_inicial',
            'faixa_etaria_final',
            'dia_de_aula',
            'hora_de_inicio',
            'hora_de_termino',
            'situacao'
            FROM turma WHERE 'situacao' = 'vagas_abertas'");
        echo "<html>
            <body>   
                <table>
                    <tr>
                        <td>nome da turma</td>
                        <td>faixa etaria</td>
                        <td>dias de aula</td>
                        <td>horario de aula</td>
                        <td>senha disponiveis</td>
                        <td>iscrições</td>
                    </tr>";
        while($result = mysqli_fetch_assoc($sql)){
    
            $N_senha = mysqli_query($conexao, "SELECT count(cod_turma) 
                from senha  where ".$result['cod_turma']." = 'cod_turma'");
            $N_senha = mysqli_fetch_assoc($N_senha);
            echo "<tr>
                <td>".$result['nome_turma']."</td>
                <td>".$result['faixa_etaria_inicial']." - ".$result['faixa_etaria_final']."</td> 
                <td>".$result['dia_de_aula']."</td> 
                <td>".$result['hora_de_inicio']." - ".$result['hora_de_termino']."</td> 
                <td>".$N_senha['count(cod_turma)']."</td> 
                <td>".$result['situacao']."</td>  
            </tr>";
        }
        echo "</table></body></html>";
    }
?>
