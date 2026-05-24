<?php include '../conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CRUD Funcionários</title>
    <link rel="stylesheet" href="../estilo.css">
</head>

<body>

<div class="container">

    <h1>Cadastro de Funcionários</h1>

    <form action="cadastrar.php" method="POST">

        <input type="text" name="nome" placeholder="Nome do Funcionário" required>

        <input type="text" name="cpf" placeholder="CPF" required>

        <input type="email" name="email" placeholder="Email" required>

        <input type="text" name="telefone" placeholder="Telefone" required>

        <input type="text" name="endereco" placeholder="Endereço" required>

        <input type="text" name="cargo" placeholder="Cargo" required>

        <input type="text" name="salario" placeholder="Salário" required>

        <input type="text" name="data_admissao" placeholder="Data de Admissão" required>




        <button type="submit">Cadastrar</button>

    </form>

    <h2>Lista de Funcionários</h2>

    <form method="GET" action="">
        <input type="text" name="busca" placeholder="Buscar funcionário">

        <button type="submit">Pesquisar</button>
    </form>

    <table>

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Cargo</th>
            <th>Salário</th>
            <th>Data de Admissão</th>
            <th>Ações</th>
        </tr>

<?php

    $busca = isset($_GET['busca']) ? $_GET['busca'] : '';

    $sql = "SELECT * FROM funcionarios
    WHERE nome LIKE '%$busca%'";

    $resultado = $conexao->query($sql);

    while($dados = $resultado->fetch_assoc()) {

        echo "
            <tr>

                <td>{$dados['id']}</td>
                <td>{$dados['nome']}</td>
                <td>{$dados['cpf']}</td>
                <td>{$dados['email']}</td>
                <td>{$dados['telefone']}</td>
                <td>{$dados['endereco']}</td>
                <td>{$dados['cargo']}</td>
                <td>{$dados['salario']}</td>
                <td>{$dados['data_admissao']}</td>

                <td>

                    <a href='editar.php?id={$dados['id']}'>
                        Editar
                    </a>

                    <a href='excluir.php?id={$dados['id']}'
                    onclick=\"return confirm('Deseja excluir este funcionário?')\">

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