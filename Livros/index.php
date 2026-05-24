<?php include '../conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CRUD Livros</title>
    <link rel="stylesheet" href="../estilo.css">
</head>

<body>

<div class="container">

    <h1>Cadastro de Livros</h1>

    <form action="cadastrar.php" method="POST">

        <input type="text" name="titulo" placeholder="Título do Livro" required>

        <input type="text" name="autor" placeholder="Autor" required>

        <input type="text" name="formato" placeholder="Formato" required>

        <input type="text" name="editora" placeholder="Editora" required>

        <input type="text" name="categoria" placeholder="Categoria" required>

        <input type="text" name="preco" placeholder="Preço" required>

        <button type="submit">Cadastrar</button>

    </form>

    <h2>Lista de Livros</h2>

    <form method="GET" action="">
        <input type="text" name="busca" placeholder="Buscar livro">

        <button type="submit">Pesquisar</button>
    </form>

    <table>

        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Formato</th>
            <th>Editora</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>

<?php

    $busca = isset($_GET['busca']) ? $_GET['busca'] : '';

    $sql = "SELECT * FROM livros
    WHERE titulo LIKE '%$busca%'";

    $resultado = $conexao->query($sql);

    while($dados = $resultado->fetch_assoc()) {

        echo "
            <tr>

                <td>{$dados['id']}</td>
                <td>{$dados['titulo']}</td>
                <td>{$dados['autor']}</td>
                <td>{$dados['formato']}</td>
                <td>{$dados['editora']}</td>
                <td>{$dados['categoria']}</td>
                <td>{$dados['preco']}</td>

                <td>

                    <a href='editar.php?id={$dados['id']}'>
                        Editar
                    </a>

                    <a href='excluir.php?id={$dados['id']}'
                    onclick=\"return confirm('Deseja excluir este livro?')\">

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