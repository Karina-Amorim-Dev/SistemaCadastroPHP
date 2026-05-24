<?php

include '../conexao.php';
$id = $_POST['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$cargo = $_POST['cargo'];
$salario = $_POST['salario'];
$data_admissao = $_POST['data_admissao'];
$sql = "UPDATE funcionarios
SET
nome='$nome',
cpf='$cpf',
email='$email',
telefone='$telefone',
endereco='$endereco',
cargo='$cargo',
salario='$salario',
data_admissao='$data_admissao'
WHERE id=$id";

if ($conexao->query($sql) === TRUE) {
header('Location: index.php');
} else {
echo "Erro ao atualizar";
}
?>
