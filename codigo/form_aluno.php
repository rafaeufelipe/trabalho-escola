<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO DE ALUNO</title>
</head>
<body>
 <form action="salvar_aluno.php" method="POST" enctype="multipart/form-data">
        <h1>CADASTRE ALUNOS</h1>
    NOME DO ALUNO
    <input type="text" name="nome"> <br><br>
    TURMA
        <select name="id_turma">
        <?php
        require_once "conexao.php";

        $sql = "SELECT * FROM tb_turma";

        $comando = mysqli_prepare($conexao, $sql);
        
        mysqli_stmt_execute($comando); 

        $resultado = mysqli_stmt_get_result($comando);

        while ($linha = mysqli_fetch_array($resultado)) {
            $id = $linha['id_turma'];
            $nome = $linha['nome'];

            echo "<option value='$id'>$nome</option>";
        }
        ?>
        </select> <br><br>
    <b>INSIRA A FOTO DO ALUNO</b>
    <input type="file" name="foto"> <br><br>

     <input type="submit" value="SALVAR"> <br><br>

    <a href="index.php">VOLTAR</a>


 </form>
</body>
</html>