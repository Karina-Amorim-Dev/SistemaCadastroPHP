<?php
include '../conexao.php';
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$cor = $_POST['cor'];
$placa = $_POST['placa'];
$combustivel = $_POST['combustivel'];
$valor = $_POST['valor'];

$sql = "INSERT INTO veiculos(marca, modelo, ano, cor, placa, combustivel, valor)
VALUES ('$marca', '$modelo', '$ano', '$cor', '$placa', '$combustivel', '$valor')";
if ($conexao->query($sql) === TRUE) {
header('Location: index.php');
} else {
echo "Erro ao cadastrar";

}
?>