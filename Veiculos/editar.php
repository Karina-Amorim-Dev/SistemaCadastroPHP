<?php
include '../conexao.php';
$id = $_GET['id'];
$sql = "SELECT * FROM veiculos WHERE id = $id";
$resultado = $conexao->query($sql);
$dados = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Editar</title>
<link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container">
<h1>Editar Veículo</h1>
<form action="atualizar.php" method="POST">
<input type="hidden" name="id" value="<?= $dados['id'] ?>">
<input type="text" name="marca" value="<?= $dados['marca'] ?>">
<input type="text" name="modelo" value="<?= $dados['modelo'] ?>">
<input type="text" name="ano" value="<?= $dados['ano'] ?>">
<input type="text" name="cor" value="<?= $dados['cor'] ?>">
<input type="text" name="placa" value="<?= $dados['placa'] ?>">
<input type="text" name="combustivel" value="<?= $dados['combustivel'] ?>">
<input type="text" name="valor" value="<?= $dados['valor'] ?>">
<button type="submit">Atualizar</button>
</form>
</div>
</body>
</html>
