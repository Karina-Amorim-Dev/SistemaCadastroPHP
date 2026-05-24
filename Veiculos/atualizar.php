<?php

include '../conexao.php';
$id = $_POST['id'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$cor = $_POST['cor'];
$placa = $_POST['placa'];
$combustivel = $_POST['combustivel'];
$valor = $_POST['valor'];
$sql = "UPDATE veiculos
SET
marca='$marca',
modelo='$modelo',
ano='$ano',
cor='$cor',
placa='$placa',
combustivel='$combustivel',
valor='$valor'
WHERE id=$id";

if ($conexao->query($sql) === TRUE) {

header('Location: index.php');
} else {
echo "Erro ao atualizar";
}
?>
