<?php

include '../conexao.php';
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$sql = "UPDATE clientes
SET
nome='$nome',
email='$email',
telefone='$telefone',
endereco='$endereco'
WHERE id=$id";

if ($conexao->query($sql) === TRUE) {
header('Location: index.php');
} else {
echo "Erro ao atualizar";
}
?>
