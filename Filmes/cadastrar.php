<?php
include '../conexao.php';
$titulo = $_POST['titulo'];
$genero = $_POST['genero'];
$diretor = $_POST['diretor'];
$duracao = $_POST['duracao'];
$classificacao = $_POST['classificacao'];
$ano_lancamento = $_POST['ano_lancamento'];
$sql = "INSERT INTO filmes(titulo, genero, diretor, duracao, classificacao, ano_lancamento)
VALUES ('$titulo', '$genero', '$diretor', '$duracao', '$classificacao', '$ano_lancamento')";
if ($conexao->query($sql) === TRUE) {
header('Location: index.php');
} else {
echo "Erro ao cadastrar";

}
?>