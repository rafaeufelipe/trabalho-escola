<?php
require_once("conexao.php");

$nome = $_POST['nome'];
$id_turma = $_POST['id_turma'];

$nome_arquivo = $_FILES['foto']['name'];

$caminho_temporario = $_FILES['foto']['tmp_name'];

$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

$novo_nome = uniqid() . "." . $extensao;

$caminho_destino = "imagem_usuario/" . $novo_nome;

move_uploaded_file($caminho_temporario, $caminho_destino);

$sql ="INSERT INTO tb_aluno (nome,id_turma,foto) VALUES (?,?,?)";

$comando = mysqli_prepare($conexao,$sql);
 mysqli_stmt_bind_param($comando, "sis", $nome, $id_turma,$novo_nome);

 mysqli_stmt_execute($comando);
 $usuarios = mysqli_stmt_get_result($comando);

header("location:form_aluno.php");

?>