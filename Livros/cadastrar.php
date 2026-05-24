<?php
include '../conexao.php';
$isbn_id_liv = $_POST['isbn_id_liv'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$formato = $_POST['formato'];
$editora = $_POST['editora'];
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];
$sql = "INSERT INTO livros(isbn, titulo, autor, formato, editora, categoria, preco)
VALUES ('$isbn_id_liv', '$titulo', '$autor', '$formato', '$editora', '$categoria', '$preco')";
if ($conexao->query($sql) === TRUE) {
header('Location: index.php');
} else {
echo "Erro ao cadastrar";

}
?>