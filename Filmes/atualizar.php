<?php

include '../conexao.php';
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$genero = $_POST['genero'];
$diretor = $_POST['diretor'];
$duracao = $_POST['duracao'];
$classificacao = $_POST['classificacao'];
$ano_lancamento = $_POST['ano_lancamento'];
$sql = "UPDATE filmes
SET
titulo='$titulo',
genero='$genero',
diretor='$diretor',
duracao='$duracao',
classificacao='$classificacao',
ano_lancamento='$ano_lancamento'
WHERE id=$id";

if ($conexao->query($sql) === TRUE) {

header('Location: index.php');
} else {
echo "Erro ao atualizar";
}
?>
