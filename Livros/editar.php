<?php
include '../conexao.php';
$id = $_GET['id'];
$sql = "SELECT * FROM livros WHERE isbn = $id";
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
<h1>Editar Livro</h1>
<form action="atualizar.php" method="POST">
<input type="hidden" name="isbn" value="<?= $dados['isbn'] ?>">
<input type="text" name="titulo" value="<?= $dados['titulo'] ?>">
<input type="text" name="autor" value="<?= $dados['autor'] ?>">
<input type="text" name="formato" value="<?= $dados['formato'] ?>">
<input type="text" name="editora" value="<?= $dados['editora'] ?>">
<input type="text" name="categoria" value="<?= $dados['categoria'] ?>">
<input type="text" name="preco" value="<?= $dados['preco'] ?>">
<button type="submit">Atualizar</button>
</form>
</div>
</body>
</html>
