<?php
include 'conexao.php';
$id = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE id = $id";
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
<h1>Editar Produto</h1>
<form action="atualizar.php" method="POST">
<input type="hidden" name="id" value="<?= $dados['id'] ?>">
<input type="text" name="nome" value="<?= $dados['nome'] ?>">
<input type="number" step="0.01" name="preco" value="<?= $dados['preco'] ?>">
<input type="number" name="quantidade" value="<?= $dados['quantidade'] ?>">
<input type="text" name="categoria" value="<?= $dados['categoria'] ?>">
<button type="submit">Atualizar</button>
</form>
</div>
</body>
</html>
