<?php
include '../conexao.php';

$id = $_GET['isbn_id_liv'];

$sql = "DELETE FROM livros WHERE isbn = $id";

if ($conexao->query($sql) === TRUE) {
    header('Location: index.php');
} else {
echo "Erro ao excluir";
}
?>