<?php
include '../conexao.php';
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$sql = "INSERT INTO clientes(nome, email, telefone, endereco)
VALUES ('$nome', '$email', '$telefone', '$endereco')";
if ($conexao->query($sql) === TRUE) {
header('Location: index.php');
} else {
echo "Erro ao cadastrar";

}
?>