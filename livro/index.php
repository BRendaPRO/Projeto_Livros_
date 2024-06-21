<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Livros</title>
    <!-- Adicionando Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">CRUD de Livros</h1>
        <br>
        <a href="cadastro.php" class="btn btn-primary mb-3">Adicionar livro</a><br>
        <a href="buscasem.php" class="btn btn-secondary mb-3">Buscar sem botão</a><br>
        <a href="buscacom.php" class="btn btn-secondary mb-3">Buscar com botão</a><br>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Código do livro</th>
                    <th scope="col">Nome do livro</th>
                    <th scope="col">Ano de lançamento do livro</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('conn.php');
                $stmt = $pdo->query('SELECT * FROM tbLivro');
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>{$row['codLivro']}</td>";
                    echo "<td>{$row['nomeLivro']}</td>";
                    echo "<td>{$row['anoLancamento']}</td>";
                    echo "<td>
                              <a href='editar.php?id={$row['codLivro']}' class='btn btn-sm btn-primary'>Editar</a> 
                              <a href='excluir.php?id={$row['codLivro']}' class='btn btn-sm btn-danger'>Excluir</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="../index.php" class="btn btn-secondary">Voltar</a>
    </div>
    <!-- Adicionando Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
