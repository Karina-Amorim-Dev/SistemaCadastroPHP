<?php include '../conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CRUD Filmes</title>
    <link rel="stylesheet" href="../estilo.css">
</head>

<body>

<div class="container">

    <h1>Cadastro de Filmes</h1>

    <a href="../index.php" class="voltar">
    ← Voltar ao Menu Principal
    </a>

    <form action="cadastrar.php" method="POST">

        <input type="text" name="titulo" placeholder="Título do Filme" required>

        <input type="text" name="genero" placeholder="Gênero" required>

        <input type="text" name="diretor" placeholder="Diretor" required>

        <input type="text" name="duracao" placeholder="Duração" required>

        <input type="text" name="classificacao" placeholder="Classificação" required>

        <input type="text" name="ano_lancamento" placeholder="Ano de Lançamento" required>

        <button type="submit">Cadastrar</button>

    </form>

    <h2>Lista de Filmes</h2>

    <form method="GET" action="">
        <input type="text" name="busca" placeholder="Buscar filme">

        <button type="submit">Pesquisar</button>
    </form>

    <table>

        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Gênero</th>
            <th>Diretor</th>
            <th>Duração</th>
            <th>Classificação</th>
            <th>Ano de Lançamento</th>
            <th>Ações</th>
        </tr>

<?php

    $busca = isset($_GET['busca']) ? $_GET['busca'] : '';

    $sql = "SELECT * FROM filmes
    WHERE titulo LIKE '%$busca%'";

    $resultado = $conexao->query($sql);

    while($dados = $resultado->fetch_assoc()) {

        echo "
            <tr>

                <td>{$dados['id']}</td>
                <td>{$dados['titulo']}</td>
                <td>{$dados['genero']}</td>
                <td>{$dados['diretor']}</td>
                <td>{$dados['duracao']}</td>
                <td>{$dados['classificacao']}</td>
                <td>{$dados['ano_lancamento']}</td>

                <td>

                    <a href='editar.php?id={$dados['id']}'>
                        Editar
                    </a>

                    <a href='excluir.php?id={$dados['id']}'
                    onclick=\"return confirm('Deseja excluir este filme?')\">

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