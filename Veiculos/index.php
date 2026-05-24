<?php include '../conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CRUD Veiculos</title>
    <link rel="stylesheet" href="../estilo.css">
</head>

<body>

<div class="container">

    <h1>Cadastro de Veículos</h1>

    <a href="../index.php" class="voltar">
    ← Voltar ao Menu Principal
    </a>

    <form action="cadastrar.php" method="POST">

        <input type="text" name="marca" placeholder="Marca" required>

        <input type="text" name="modelo" placeholder="Modelo" required>

        <input type="text" name="ano" placeholder="Ano" required>

        <input type="text" name="cor" placeholder="Cor" required>

        <input type="text" name="placa" placeholder="Placa" required>

        <input type="text" name="combustivel" placeholder="Combustível" required>

        <input type="text" name="valor" placeholder="Valor" required>

        <button type="submit">Cadastrar</button>

    </form>

    <h2>Lista de Veículos</h2>

    <form method="GET" action="">
        <input type="text" name="busca" placeholder="Buscar veículo">

        <button type="submit">Pesquisar</button>
    </form>

    <table>

        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>Cor</th>
            <th>Placa</th>
            <th>Combustível</th>
            <th>Valor</th>
            <th>Ações</th>
        </tr>

<?php

    $busca = isset($_GET['busca']) ? $_GET['busca'] : '';

    $sql = "SELECT * FROM veiculos
    WHERE marca LIKE '%$busca%' OR modelo LIKE '%$busca%'";
    $resultado = $conexao->query($sql);

    while($dados = $resultado->fetch_assoc()) {

        echo "
            <tr>

                <td>{$dados['id']}</td>
                <td>{$dados['marca']}</td>
                <td>{$dados['modelo']}</td>
                <td>{$dados['ano']}</td>
                <td>{$dados['cor']}</td>
                <td>{$dados['placa']}</td>
                <td>{$dados['combustivel']}</td>
                <td>{$dados['valor']}</td>

                <td>

                    <a href='editar.php?id={$dados['id']}'>
                        Editar
                    </a>

                    <a href='excluir.php?id={$dados['id']}'
                    onclick=\"return confirm('Deseja excluir este veículo?')\">

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