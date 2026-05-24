<?php include '../conexao.php'; ?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>CRUD PHP</title>
        <link rel="stylesheet" href="../estilo.css">
    </head>

    <body>
        <div class="container">
            <h1>Cadastro de Produtos</h1>

            <a href="../index.php" class="voltar">
            ← Voltar ao Menu Principal
            </a>
        
        <form action="cadastrar.php" method="POST">
            <input type="text" name="nome" placeholder="Nome do Produto" required>

            <input type="number" step="0.01"
            name="preco" placeholder="Preço" required>

            <input type="number"
            name="quantidade" placeholder="Quantidade" required>

            <input type="text"
            name="categoria" placeholder="Categoria" required>
            <button type="submit">Cadastrar</button>
        </form>
        
        <h2>Lista de Produtos</h2>
        <form method="GET" action="">
            <input type="text" name="busca" placeholder="Buscar produto">
                <button type="submit">Pesquisar</button>
        </form>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>   
    <?php

        $busca = isset($_GET['busca']) ? $_GET['busca'] : '';

        $sql = "SELECT * FROM produtos 
        WHERE nome LIKE '%$busca%'";
        $resultado = $conexao->query($sql);
        while($dados = $resultado->fetch_assoc()) {

            echo "
                <tr>
                    <td>{$dados['id']}</td>
                    <td>{$dados['nome']}</td>
                    <td>{$dados['preco']}</td>
                    <td>{$dados['quantidade']}</td>
                    <td>{$dados['categoria']}</td>
                    <td>
                        <a href='editar.php?id={$dados['id']}'>Editar</a>
                        <a href='excluir.php?id={$dados['id']}'
                            onclick=\"return confirm('Tem certeza que deseja excluir este produto?')\">
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
