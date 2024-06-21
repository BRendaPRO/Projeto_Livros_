<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Livros</title>
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">CRUD de Livros</h1>
        <br>
        <!-- Formulário de busca por código de livro -->
        <form method="GET">
            <div class="form-group">
                <label for="busca">Buscar livro por código:</label>
                <div class="input-group">
                    <input type="text" id="busca" name="codigo_livro" class="form-control">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <a href="cadastro.php" class="btn btn-success">Adicionar livro</a><br><br>
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

                // Verifica se a busca foi realizada
                if(isset($_GET['codigo_livro']) && !empty($_GET['codigo_livro'])) {
                    $codigo_livro = $_GET['codigo_livro'];
                    $stmt = $pdo->prepare('SELECT * FROM tbLivro WHERE codLivro = :codigo');
                    $stmt->bindParam(':codigo', $codigo_livro);
                    $stmt->execute();
                } else {
                    $stmt = $pdo->query('SELECT * FROM tbLivro');
                }

                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>{$row['codLivro']}</td>";
                    echo "<td>{$row['nomeLivro']}</td>";
                    echo "<td>{$row['anoLancamento']}</td>";
                    echo "<td>
                              <a href='editar.php?id={$row['codLivro']}' class='btn btn-info'>Editar</a> 
                              <a href='excluir.php?id={$row['codLivro']}' class='btn btn-danger'>Excluir</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </div>
    <!-- Adicionando script do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
