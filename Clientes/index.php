<?php include '../conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CRUD Clientes</title>
    <link rel="stylesheet" href="../estilo.css">
</head>

<body>

<div class="container">

    <h1>Cadastro de Clientes</h1>

    <form action="cadastrar.php" method="POST">

        <input type="text" name="nome" placeholder="Nome do Cliente" required>

        <input type="email" name="email" placeholder="Email" required>

        <input type="text" name="telefone" placeholder="Telefone" required>

        <input type="text" name="endereco" placeholder="Endereço" required>

        <button type="submit">Cadastrar</button>

    </form>

    <h2>Lista de Clientes</h2>

    <form method="GET" action="">
        <input type="text" name="busca" placeholder="Buscar cliente">

        <button type="submit">Pesquisar</button>
    </form>

    <table>

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>

<?php

    $busca = isset($_GET['busca']) ? $_GET['busca'] : '';

    $sql = "SELECT * FROM clientes
    WHERE nome LIKE '%$busca%'";

    $resultado = $conexao->query($sql);

    while($dados = $resultado->fetch_assoc()) {

        echo "
            <tr>

                <td>{$dados['id']}</td>
                <td>{$dados['nome']}</td>
                <td>{$dados['email']}</td>
                <td>{$dados['telefone']}</td>
                <td>{$dados['endereco']}</td>

                <td>

                    <a href='editar.php?id={$dados['id']}'>
                        Editar
                    </a>

                    <a href='excluir.php?id={$dados['id']}'
                    onclick=\"return confirm('Deseja excluir este cliente?')\">

                        Excluir

                    </a>

                </td>

            </tr>
        ";
    }

?>

    </table>

</div>

</body>
</html>