<?php
require_once "conexao.php";

$nome = $_POST["nome"];

$sql ="INSERT INTO tb_turma (nome) VALUES ('$nome')";
    $comando = mysqli_prepare($conexao, $sql);
        
        mysqli_stmt_execute($comando); 

        $resultado = mysqli_stmt_get_result($comando);

header("location:form_turma.php");

?>