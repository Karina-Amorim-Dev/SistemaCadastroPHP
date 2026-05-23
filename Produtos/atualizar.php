<?php

include 'conexao.php';
$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];
$categoria = $_POST['categoria'];
$sql = "UPDATE produtos
SET
nome='$nome',
preco='$preco',
quantidade='$quantidade',
categoria='$categoria'
WHERE id=$id";

if ($conexao->query($sql) === TRUE) {
header('Location: index.php');
} else {
echo "Erro ao atualizar";
}
?>
