<?php

include '../conexao.php';
$isbn_id_liv = $_POST['isbn_id_liv'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$formato = $_POST['formato'];
$editora = $_POST['editora'];
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];
$sql = "UPDATE livros
SET
isbn_id_liv='$isbn_id_liv',
titulo='$titulo',
autor='$autor',
formato='$formato',
editora='$editora',
categoria='$categoria',
preco='$preco'
WHERE isbn=$isbn_id_liv";

if ($conexao->query($sql) === TRUE) {

header('Location: index.php');
} else {
echo "Erro ao atualizar";
}
?>
