<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livro</title>
    <!-- Adicionando Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Adicionar Livro</h2>
        <form method="POST">
            <div class="form-group">
                <label for="codLivro">Código do livro:</label>
                <input type="text" name="codLivro" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nomeLivro">Nome do livro:</label>
                <input type="text" name="nomeLivro" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="anoLancamento">Ano de lançamento:</label>
                <input type="text" name="anoLancamento" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
        <?php
        include('conn.php');
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $codLivro = $_POST['codLivro'];
            $nomeLivro = $_POST['nomeLivro'];
            $anoLancamento = $_POST['anoLancamento'];
         
            $stmt = $pdo->prepare('INSERT INTO tbLivro(codLivro, nomeLivro, anoLancamento) VALUES (?, ?, ?)');
            $stmt->execute([$codLivro, $nomeLivro, $anoLancamento]);

            echo "<div class='alert alert-success mt-3' role='alert'>Livro adicionado com sucesso!</div>";
        }
        ?>
    </div>
    <!-- Adicionando script do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
