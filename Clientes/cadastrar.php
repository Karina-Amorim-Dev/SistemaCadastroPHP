<?php
include '../conexao.php';

$nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$telefone = isset($_POST['telefone']) ? trim($_POST['telefone']) : '';
$endereco = isset($_POST['endereco']) ? trim($_POST['endereco']) : '';

$stmt = $conexao->prepare("INSERT INTO clientes (nome, email, telefone, endereco) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    die('Erro na preparação: ' . $conexao->error);
}
$stmt->bind_param('ssss', $nome, $email, $telefone, $endereco);

if ($stmt->execute()) {
    header('Location: index.php');
    exit;
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}

?>
