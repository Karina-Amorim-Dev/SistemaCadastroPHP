<?php
include '../conexao.php';
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$cargo = $_POST['cargo'];
$salario = $_POST['salario'];
$data_admissao = $_POST['data_admissao'];
$sql = "INSERT INTO funcionarios(nome, cpf, email, telefone, endereco, cargo, salario, data_admissao)
VALUES ('$nome', '$cpf', '$email', '$telefone', '$endereco', '$cargo', '$salario', '$data_admissao')";
if ($conexao->query($sql) === TRUE) {
header('Location: index.php');
} else {
echo "Erro ao cadastrar";

}
?>