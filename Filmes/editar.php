<?php
include '../conexao.php';
$id = $_GET['id'];
$sql = "SELECT * FROM filmes WHERE id = $id";
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
<h1>Editar Filme</h1>
<form action="atualizar.php" method="POST">
<input type="hidden" name="id" value="<?= $dados['id'] ?>">
<input type="text" name="titulo" value="<?= $dados['titulo'] ?>">
<input type="text" name="genero" value="<?= $dados['genero'] ?>">
<input type="text" name="diretor" value="<?= $dados['diretor'] ?>">
<input type="text" name="duracao" value="<?= $dados['duracao'] ?>">
<input type="text" name="classificacao" value="<?= $dados['classificacao'] ?>">
<input type="text" name="ano_lancamento" value="<?= $dados['ano_lancamento'] ?>">
<button type="submit">Atualizar</button>
</form>
</div>
</body>
</html>
