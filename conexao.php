<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servidor = "127.0.0.1";
$usuario = "root";
$senha = "12345678";
$banco = "Produtos";
$porta = 3306;

$conexao = mysqli_connect(
    $servidor,
    $usuario,
    $senha,
    $banco,
    $porta
);

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}

?>