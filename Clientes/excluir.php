<?php
include '../conexao.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    header('Location: index.php');
    exit;
}

$stmt = $conexao->prepare("DELETE FROM clientes WHERE id = ?");
if (!$stmt) {
    die('Erro na preparação: ' . $conexao->error);
}
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    header('Location: index.php');
    exit;
} else {
    echo "Erro ao excluir: " . $stmt->error;
}

?>
