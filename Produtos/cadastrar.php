<?php
include 'conexao.php';
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];
$categoria = $_POST['categoria'];
$sql = "INSERT INTO produtos(nome, preco, quantidade, categoria)
VALUES ('$nome', '$preco', '$quantidade', '$categoria')";
if ($conexao->query($sql) === TRUE) {
header('Location: index.php');
} else {
echo "Erro ao cadastrar";

}
?>

