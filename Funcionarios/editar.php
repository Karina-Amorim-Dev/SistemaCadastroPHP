<?php
include '../conexao.php';
$id = $_GET['id'];
$sql = "SELECT * FROM funcionarios WHERE id = $id";
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
<h1>Editar Funcionário</h1>
<form action="atualizar.php" method="POST">
<input type="hidden" name="id" value="<?= $dados['id'] ?>">
<input type="text" name="nome" value="<?= $dados['nome'] ?>">
<input type="email" name="email" value="<?= $dados['email'] ?>">
<input type="text" name="telefone" value="<?= $dados['telefone'] ?>">
<input type="text" name="cpf" value="<?= $dados['cpf'] ?>">
<input type="text" name="cargo" value="<?= $dados['cargo'] ?>">
<input type="text" name="salario" value="<?= $dados['salario'] ?>">
<input type="text" name="data_admissao" value="<?= $dados['data_admissao'] ?>">
<button type="submit">Atualizar</button>
</form>
</div>
</body>
</html>
