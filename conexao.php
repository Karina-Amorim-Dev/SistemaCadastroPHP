<?php

// Carrega erros em ambiente de desenvolvimento
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Atenção: não coloque credenciais reais no código versionado.
// Use um arquivo .env local (NÃO comitar) ou variáveis de ambiente no servidor.

$servidor = getenv('DB_HOST') ?: '127.0.0.1';
$usuario  = getenv('DB_USER') ?: 'root';
$senha    = getenv('DB_PASS') ?: '';          // <-- senha agora vem de variável de ambiente
$banco    = getenv('DB_NAME') ?: 'sistema_cadastros';
$porta    = getenv('DB_PORT') ?: 3306;

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
